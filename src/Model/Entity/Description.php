<?php
// src/Model/Entity/Description.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Description extends Entity
{
    protected array $_accessible = [
        'id' => true,
        'customer_id' => true,
        'description' => true,
    ];
}