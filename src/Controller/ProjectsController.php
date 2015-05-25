<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

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
                return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('Unable to update your project.'));
        }
        
        $image = '';
        if ($project->imageURL) {
			$image = '<img src="' . $project->imageURL . '" alt="' . $project->name . '">';
        } else {
        	$image = '<img src="../../webroot/img/project.jpg" alt="No project picture set">';
        }

        $this->set('project', $project);
        $this->set('image', $image);
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

	/**
     * Delete project image
     */
    public function delete_image($id) {
	    $projectsTable = TableRegistry::get('projects');
        $project = $projectsTable->get($id);
        
        $project->imageURL = null;
        if ($projectsTable->save($project)) {
	        $this->Flash->success(__('Your project image has been deleted.'));
            return $this->redirect(['controller' => 'projects', 'action' => 'edit', $id]);
        }
        $this->Flash->error(__('Unable to delete your project image.'));
    }
}

?>