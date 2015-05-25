<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class InterestsController extends AppController {

    /**
	 * Voeg een project toe aan het portfolio
	 * @param int admin ID
	 */
	public function add($admin_id) {
		$interest = $this->Interests->newEntity();
        if ($this->request->is('post')) {
            $interest = $this->Interests->patchEntity($interest, $this->request->data);
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__('The interest has been saved.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'admin', $admin_id]);
            }
            $this->Flash->error(__('Unable to add the interest.'));
        }
        $this->set('admin', $admin_id);
        $this->set('interest', $interest);
	}
	
	/**
	 * Bewerk een project
	 * @param int ID - project id
	 */
	public function edit($id = null) {
		$interest = $this->Interests->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Interests->patchEntity($interest, $this->request->data);
			if ($this->Interests->save($interest)) {
				$this->Flash->success(__('Your interest has been updated.'));
				return $this->redirect(['controller' => 'users','action' => 'admin', $this->Auth->user('id')]);
			}
			$this->Flash->error(__('Unable to update your interest.'));
		}
		
		$this->set('interest', $interest);
	}
	
	/**
	 * Delete Interest
	 */
	public function delete($id) {
		$this->request->allowMethod(['post', 'delete']);
		
		$interest = $this->Interests->get($id);
		if ($this->Interests->delete($interest)) {
			$this->Flash->success(__('The interest has been deleted.'));
			return $this->redirect(['controller' => 'users', 'action' => 'admin', $this->Auth->user('id')]);
		}
	}
}
?>