<?php
	namespace App\Controller;
	
	use App\Controller\AppController;
	use Cake\Event\Event;
	use Cake\Network\Exception\NotFoundException;
	
	class ProjectsController extends AppController {
	
		/**
		 * Voeg een project toe aan het portfolio
		 * @param int admin ID
		 */
		public function add($admin_id) {
			$project = $this->Projects->newEntity();
	        if ($this->request->is('post')) {
	            $project = $this->Projects->patchEntity($project, $this->request->data);
	            if ($this->Projects->save($project)) {
	                $this->Flash->success(__('The project has been saved.'));
	                return $this->redirect(['controller' => 'Users', 'action' => 'admin', $admin_id]);
	            }
	            $this->Flash->error(__('Unable to create the project.'));
	        }
	        $this->set('admin', $admin_id);
	        $this->set('project', $project);
		}
		
		/**
		 * Bewerk een project
		 * @param int ID - project id
		 */
		public function edit($id = null) {
			$project = $this->Projects->get($id);
			if ($this->request->is(['post', 'put'])) {
				$this->Projects->patchEntity($project, $this->request->data);
				if ($this->Projects->save($project)) {
					$this->Flash->success(__('Your project has been updated.'));
					return $this->redirect(['controller' => 'users','action' => 'admin', $this->Auth->user('id')]);
				}
				$this->Flash->error(__('Unable to update your project.'));
			}
			
			$this->set('project', $project);
		}
		
		/**
		 * Delete project
		 */
		public function delete($id) {
			$this->request->allowMethod(['post', 'delete']);
			
			$project = $this->Projects->get($id);
			if ($this->Projects->delete($project)) {
				$this->Flash->success(__('The project has been deleted.'));
				return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
			}
		}
	}
?>