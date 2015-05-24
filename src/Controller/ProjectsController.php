<?php
	namespace App\Controller;
	
	use App\Controller\AppController;
	use Cake\Event\Event;
	use Cake\Network\Exception\NotFoundException;
	
	class ProjectsController extends AppController {
	
		/**
		 * Voeg een project toe aan het portfolio
		 */
		public function add($admin_id) {
			$project = $this->Projects->newEntity();
	        if ($this->request->is('post')) {
	            $project = $this->Projects->patchEntity($project, $this->request->data);
	            if ($this->Projects->save($project)) {
	                $this->Flash->success(__('The project has been saved.'));
	                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
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
			if (empty($id)) {
	            throw new NotFoundException;
	        }
	
	        $project = $this->Projects->get($id);
	        if ($this->request->is('post')) {
	            $project = $this->Projects->patchEntity($project, $this->request->data);
	            if ($this->Projects->save($project)) {
	                $this->Flash->success(__('Project has been updated.'));
	                return $this->redirect(['controller' => 'users', 'action' => 'index']);
	            }
	            $this->Flash->error(__('Unable to update project.'));
	        }
	        $this->set('project', $project);
		}
	}
?>