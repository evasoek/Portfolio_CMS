<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class InterestsController extends AppController {

    public function viewInterests($userID) {
        if (!$userID) {
            throw new NotFoundException(__('Invalid user'));
        }
        $interests = $this->Interests->find('all', [
            'where' => ['Interests.userID' => $userID]
        ]);
        $this->set('interests', $interests);
    }
}
?>