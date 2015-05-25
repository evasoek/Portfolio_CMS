<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Network\Exception\NotFoundException;

class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'logout']);
    }

    /**
     * Index view.
     * Hierin worden alle gebruikers getoond
     */
    public function index() {
        $users = $this->Users->find('all');
        $list = '';
        $base_url = Router::url('/', true);

        foreach ($users as $user) {
            $list .= '
			    	<li><a href="' . $base_url . 'users/view/' . $user['id'] . '">' . $user['username'] . ' (' . $user['firstname'] . ' ' . $user['lastname'] . ')</a></li>
			    ';
        }

        $this->set('users', $list);
    }

    /**
     * Individuele user view.
     * Hierin wordt het portfolio van een specifieke gebruiker getoond
     * @param int ID - dit is de user ID
     */
    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        // set user
        $user = $this->Users->get($id, ['contain' => ['Interests', 'Skills', 'Projects', 'SocialLinks']]);
        $this->set(compact('user'));
    }

    /**
     * Register view
     * Hierin kan een user zich registreren
     */
    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to register the user.'));
        }
        $this->set('user', $user);
    }

    /**
     * Login view.
     * Hierin kan de gebruiker inloggen
     */
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'admin', $user['id']]);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    /**
     * Logout
     * De functie voor het uitloggen van een gebruiker en de volgende re-direct
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Admin view
     * Hierin wordt de admin view getoond van de ingelogde gebruiker
     * @param int ID - dit is de user ID
     */
    public function admin($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $admin = $this->Users->get($id, ['contain' => ['Interests', 'Skills', 'Projects', 'SocialLinks']]);
        $this->set(compact('admin'));
    }

    /**
     * editUser view
     * Hierin kan een user zijn of haar gegevens aanpassen
     * @param int ID - de user id
     */
    public function edit($id = null) {
        if (empty($id)) {
            throw new NotFoundException;
        }

        $user = $this->Users->get($id);
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Basic user information has been updated.'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('Unable to update basic user information user.'));
        }
        $this->set('user', $user);
    }
    
    /**
	 * Delete user
	 */
	public function delete($id) {
		$this->request->allowMethod(['post', 'delete']);
		
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user has been deleted.'));
			return $this->redirect(['controller' => 'users', 'action' => 'index']);
		}
	}
}
?>