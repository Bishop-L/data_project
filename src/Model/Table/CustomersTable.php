<?php
// src/Model/Table/CustomersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CustomersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
		
		$this->addBehavior('Timestamp');
		
		$this->setTable('customers');
		$this->setDisplayField('customer_name');
		$this->setPrimaryKey('id');
		
		$this->belongsTo('Kits', [
            'className' => 'App\Model\Table\KitsTable',
            'foreignKey' => 'kit_id', 
        ]);
		
		$this->hasMany('Descriptions', [
            'className' => 'App\Model\Table\DescriptionsTable',
            'foreignKey' => 'customer_id', 
        ]);
			
	
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('customer_name', 'Customer name cannot be empty.')
            ->notEmptyString('kit_id', 'Kit ID cannot be empty.')
            ->numeric('kit_id', 'Kit ID must be a number.');

        return $validator;
    }
}