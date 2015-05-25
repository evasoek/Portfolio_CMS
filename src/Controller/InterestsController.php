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
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
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
		if (empty($id)) {
            throw new NotFoundException;
        }

        $interest = $this->Interests->get($id);
        if ($this->request->is('post')) {
            $interest = $this->Interests->patchEntity($interest, $this->request->data);
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__('Interest has been updated.'));
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the interest.'));
        }
        $this->set('interest', $interest);
	}
}
?>