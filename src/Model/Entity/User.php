<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity {

    protected $_accessible = ['*' => true];

    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }

    public $hasMany = array(
        'Interest' => array(
            'className' => 'Interest',
            'foreignKey' => 'userID' ///check
        ),
        'Skill' => array(
            'className' => 'Skill',
            'foreignKey' => 'userID',
        ),
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'userID',
        ),
        'SocialLink' => array(
            'className' => 'SocialLink',
            'foreignKey' => 'userID',
        )
    );
}
?>