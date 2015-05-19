<?php
	namespace App\Model\Table;
	
	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	
	class SocialLinksTable extends Table {
		
		/**
		 * Vastleggen van de associaties
		 */
	    public function initialize(array $config) {
		    $this->belongsTo('Users', [
			    'foreignKey' => 'userID'
		    ]);
	    }
	
	}
?>