<?php
	namespace App\Model\Table;
	
	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	
	class UsersTable extends Table {
		
	    public function validationDefault(Validator $validator) {
	        return $validator
	            ->notEmpty('firstname', 'A first name is required')
	            ->notEmpty('lastname', 'A last name is required')
	            ->notEmpty('username', 'A username is required')
                    ->notEmpty('username', 'A username is required');
	    }
	
	}
?>