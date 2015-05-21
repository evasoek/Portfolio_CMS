<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    /**
     * Vastleggen van de associaties
     */
    public function initialize(array $config) {
        $this->hasMany('Interests', [
            'foreignKey' => 'userID'
        ]);

        $this->hasMany('SocialLinks', [
            'foreignKey' => 'userID'
        ]);

        $this->hasMany('Projects', [
            'foreignKey' => 'userID'
        ]);

        $this->hasMany('Skills', [
            'foreignKey' => 'userID'
        ]);
    }

    /**
     * Valideren van velden
     */
    public function validationDefault(Validator $validator) {
        return $validator
                        ->notEmpty('firstname', 'A first name is required')
                        ->notEmpty('lastname', 'A last name is required')
                        ->notEmpty('username', 'A username is required')
                        ->notEmpty('username', 'A username is required');
    }

}
?>