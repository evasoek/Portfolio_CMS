<?php

namespace App\Controller;

use App\Controller\AppController;

class ProjectsController extends AppController {

    /**
     * Add a project to the portfolio
     * @param int admin ID
     */
    public function add($admin_id) {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);

            $filetype = $this->request->data['upload_an_image']['type'];
            if ($filetype == '' | $filetype == 'image/jpeg' | $filetype == 'image/png' | $filetype == 'image/gif') { // check if filetype is correct
                move_uploaded_file($this->request->data['upload_an_image']['tmp_name'], $this->webroot . 'img/' . $this->request->data['upload_an_image']['name']); // upload the image

                $project['imageURL'] = $this->request->data['upload_an_image']['name']; // save URL reference to database

                if ($this->Projects->save($project)) {
                    $this->Flash->success(__('The project has been saved.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'admin', $admin_id]);
                } else {
                    $this->Flash->error(__('Unable to create the project.'));
                }
            } else {
                $this->Flash->error(__('Unable to upload image, please make sure the image is in JPG, PNG or GIF format.'));
            }
        }

        $image = '';
        if ($project->imageURL) {
            $image = '<img src="' . $project->imageURL . '" alt="' . $project->name . '">';
        } else {
            $image = '<img src="../../webroot/img/project.jpg" alt="No project picture set">';
        }

        $this->set('admin', $admin_id);
        $this->set('project', $project);
    }

    /**
     * Edit a project
     * @param int ID - project id
     */
    public function edit($id = null) {
        $project = $this->Projects->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Projects->patchEntity($project, $this->request->data);

            $filetype = $this->request->data['upload_an_image']['type'];
            if ($filetype == '' | $filetype == 'image/jpeg' | $filetype == 'image/png' | $filetype == 'image/gif') { // check if filetype is correct
                move_uploaded_file($this->request->data['upload_an_image']['tmp_name'], $this->webroot . 'img/' . $this->request->data['upload_an_image']['name']); // upload the image

                $project['imageURL'] = $this->request->data['upload_an_image']['name']; // save URL reference to database

                if ($this->Projects->save($project)) {
                    $this->Flash->success(__('Your project has been updated.'));
                    return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
                } else {
                    $this->Flash->error(__('Unable to update your project.'));
                }
            } else {
                $this->Flash->error(__('Unable to upload image, please make sure the image is in JPG, PNG or GIF format.'));
            }
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
     * Delete a project
     */
    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
            return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
        } else {
            $this->Flash->error(__('Unable to delete your project.'));
        }
    }

}

?>