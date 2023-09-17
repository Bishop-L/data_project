<?php
// src/Model/Entity/Kit.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Kit extends Entity
{
    protected array $_accessible = [
       'id' => true,
	   'kit_id' => true,
    ];
}