<?php
	namespace App\Model\Table;
	
	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	
	class ProjectsTable extends Table {
		
		/**
		 * Vastleggen van de associaties
		 */
	    public function initialize(array $config) {
		    $this->belongsTo('Users', [
			    'foreignKey' => 'userID'
		    ]);
	    }
	
		/**
	     * Valideren van velden
	     */
	    public function validationDefault(Validator $validator) {
	        return $validator
	                        ->notEmpty('name', 'A name is required')
	                        ->notEmpty('description', 'A description is required');
	    }
	}
?>