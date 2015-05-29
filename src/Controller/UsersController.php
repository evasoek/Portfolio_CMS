<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

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
            $image = '';
            if ($user['imageURL']) {
                $image = '<img src="' . $this->webroot . 'img/' . $user['imageURL'] . '" alt="' . $user->name . '">';
            } else {
                $image = '<img src="' . $this->webroot . 'img/user.gif" alt="No project picture set">';
            }

            $list .= '
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						' . $image . '
						<div class="caption">
							<h3>' . $user['firstname'] . ' ' . $user['lastname'] . '</h3>
							<p>' . $user['bio'] . '</p>
							<p><a href="' . $base_url . 'users/view/' . $user['id'] . '" class="btn btn-sm btn-primary" role="button">Bekijk portfolio</a></p>
						</div>
					</div>
				</div>';
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

        $image = '';
        if ($admin->imageURL) {
            $image = '<img src="../../webroot/img/' . $admin->imageURL . '" alt="Profile picture">';
        } else {
            $image = '<img src="../../webroot/img/user.gif" alt="No profile picture set">';
        }

        $this->set(compact('admin'));
        $this->set('image', $image);
    }

    /**
     * editUser view
     * Hierin kan een user zijn of haar gegevens aanpassen
     * @param int ID - de user id
     */
    public function edit($id = null) {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->data);
            $filetype = $this->request->data['upload_an_image']['type'];
            if ($filetype == '' | $filetype == 'image/jpeg' | $filetype == 'image/png' | $filetype == 'image/gif') { // check if filetype is correct
                move_uploaded_file($this->request->data['upload_an_image']['tmp_name'], $this->webroot . 'img/' . $this->request->data['upload_an_image']['name']); // upload the image
                $user['imageURL'] = $this->request->data['upload_an_image']['name']; // save URL reference to database
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('User has been updated.'));
                    return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
                } else {
                    $this->Flash->error(__('Unable to edit user.'));
                }
            } else {
                $this->Flash->error(__('Unable to upload image, please make sure the image is in JPG, PNG or GIF format.'));
            }
        }

        $image = '';
        if ($user->imageURL) {
            $image = '<img src="../../webroot/img/' . $user->imageURL . '" alt="' . $user->name . '">';
        } else {
            $image = '<img src="../../webroot/img/user.gif" alt="No project picture set">';
        }

        $this->set('user', $user);
        $this->set('image', $image);
    }

    /**
     * Delete user
     */
    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        }
        return $this->redirect($this->Auth->logout());
    }

}

?>