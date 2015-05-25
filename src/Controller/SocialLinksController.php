<?php
	namespace App\Controller;
	
	use App\Controller\AppController;
	use Cake\Event\Event;
	use Cake\Network\Exception\NotFoundException;
	
	class SocialLinksController extends AppController {
	
	    /**
	     * Add Social links
	     * @param int admin ID
	     */
	    public function add($admin_id) {
	        $social = $this->SocialLinks->newEntity();
	        if ($this->request->is('post')) {
	            $social = $this->SocialLinks->patchEntity($social, $this->request->data);
	            if ($this->SocialLinks->save($social)) {
	                $this->Flash->success(__('The social link has been saved.'));
	                return $this->redirect(['controller' => 'users','action' => 'admin', $admin_id]);
	            }
	            $this->Flash->error(__('Unable to add the social link.'));
	        }
	        $this->set('admin', $admin_id);
	        $this->set('social', $social);
	    }
	    
	    /**
		 * Bewerk een project
		 * @param int ID - project id
		 */
		public function edit($id = null) {
			if (empty($id)) {
	            throw new NotFoundException;
	        }
	
	        $social = $this->SocialLinks->get($id);
	        if ($this->request->is('post')) {
	            $social = $this->SocialLinks->patchEntity($social, $this->request->data);
	            if ($this->SocialLinks->save($social)) {
	                $this->Flash->success(__('Social link has been updated.'));
	                return $this->redirect(['controller' => 'users', 'action' => 'index']);
	            }
	            $this->Flash->error(__('Unable to update social link.'));
	        }
	        $this->set('social', $social);
		}
	}
?>