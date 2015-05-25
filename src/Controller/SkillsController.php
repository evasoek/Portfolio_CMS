<?php
	namespace App\Controller;
	
	use App\Controller\AppController;
	use Cake\Event\Event;
	use Cake\Network\Exception\NotFoundException;
	
	class SkillsController extends AppController {
		
		/**
		 * Voeg een project toe aan het portfolio
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
		 * Bewerk een project
		 * @param int ID - project id
		 */
		public function edit($id = null) {
			if (empty($id)) {
	            throw new NotFoundException;
	        }
	
	        $skill = $this->Skills->get($id);
	        if ($this->request->is('post')) {
	            $skill = $this->Skills->patchEntity($skill, $this->request->data);
	            if ($this->Skills->save($skill)) {
	                $this->Flash->success(__('Skill has been updated.'));
	                return $this->redirect(['controller' => 'users', 'action' => 'index']);
	            }
	            $this->Flash->error(__('Unable to update the skill.'));
	        }
	        $this->set('skill', $skill);
		}
	}
?>