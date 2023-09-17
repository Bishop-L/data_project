<?php
// src/Model/Table/DescriptionsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DescriptionsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
		$this->setTable('descriptions');
		$this->setDisplayField('description');
		$this->setPrimaryKey('id');
	
		$this->addBehavior('Timestamp');
		
		
		$this->belongsTo('Customers', [
            'className' => 'App\Model\Table\CustomersTable',
            'foreignKey' => 'customer_id', 
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('description', 'Description cannot be empty.')
            ->notEmptyString('customer_id', 'Customer ID cannot be empty.')
            ->numeric('customer_id', 'Customer ID must be a numeric value.');

        return $validator;
    }
}