<?php

namespace App\Controller;

use App\Controller\AppController;

class SkillsController extends AppController {

    /**
     * Add a skill to the portfolio
     * @param int admin ID
     */
    public function add($admin_id) {
        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'admin', $admin_id]);
            }
            $this->Flash->error(__('Unable to add the skill.'));
        }
        $this->set('admin', $admin_id);
        $this->set('skill', $skill);
    }

    /**
     * Edit a skill
     * @param int ID - project id
     */
    public function edit($id = null) {
        $skill = $this->Skills->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('Your skill has been updated.'));
                return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('Unable to update your skill.'));
        }

        $this->set('skill', $skill);
    }

    /**
     * Delete a skill
     */
    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $skill = $this->Skills->get($id);
        if ($this->Skills->delete($skill)) {
            $this->Flash->success(__('The skill has been deleted.'));
            return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
        }
    }

}

?>