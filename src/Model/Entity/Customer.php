<?php
// src/Model/Entity/Customer.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Customer extends Entity
{
    protected array $_accessible = [
      'id' => true,
      'kit_id' => true,
      'customer_name' => true,  
    ];
}