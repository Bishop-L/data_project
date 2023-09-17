<?php
// src/Model/Table/KitsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class KitsTable extends Table
{
    
	public function initialize(array $config): void
    {
        parent::initialize($config);
		
		$this->setTable('kits');
		$this->setDisplayField('kit_id');
		$this->setPrimaryKey('id');
		
		$this->addBehavior('Timestamp');
		
		$this->hasOne('Customers', [
            'className' => 'App\Model\Table\CustomersTable',
            'foreignKey' => 'kit_id', 
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('kit_id', 'Kit ID cannot be empty.');

        return $validator;
    }
}