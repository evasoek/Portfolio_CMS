<?php
	namespace App\Controller;
	
	use App\Controller\AppController;
	use Cake\Event\Event;
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
		    $query = $this->Users->find('list', [
			    'keyField' => 'id',
			    'valueField' => 'username'
		    ]);
		    $data = $query->toArray();
		    
	        $this->set('users', $data);
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
	
	        $user = $this->Users->get($id);
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
	                return $this->redirect(['action' => 'register']);
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
		            return $this->redirect($this->Auth->redirectUrl());
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
	
	        $user = $this->Users->get($id);
	        $this->set(compact('user'));
        }
	}
?>