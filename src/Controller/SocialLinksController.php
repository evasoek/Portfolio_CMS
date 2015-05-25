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
			$social = $this->SocialLinks->get($id);
			if ($this->request->is(['post', 'put'])) {
				$this->SocialLinks->patchEntity($social, $this->request->data);
				if ($this->SocialLinks->save($social)) {
					$this->Flash->success(__('Your social media has been updated.'));
					return $this->redirect(['controller' => 'users','action' => 'admin', $this->Auth->user('id')]);
				}
				$this->Flash->error(__('Unable to update your social media.'));
			}
			
			$this->set('social', $social);
		}
		
		/**
		 * Delete social link
		 */
		public function delete($id) {
			$this->request->allowMethod(['post', 'delete']);
			
			$social = $this->SocialLinks->get($id);
			if ($this->SocialLinks->delete($social)) {
				$this->Flash->success(__('The social media link has been deleted.'));
				return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
			}
		}
	}
?>