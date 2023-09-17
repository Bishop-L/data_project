<?php
// src/Repository/KitRepository.php

namespace App\Repository;

use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

class KitRepository implements KitRepositoryInterface
{
    public function searchKits(string $search): array
    {
        
        if (empty($search)) {
            // If the search string is empty, return an empty array
            return [];
        }
        
        $kitsTable = TableRegistry::getTableLocator()->get('Kits');

        $query = $kitsTable->find('all', [
            'contain' => [
                'Customers' => [
                    'Descriptions',
                ],
            ],
            'conditions' => [
                'OR' => [
                    'Kits.kit_id' => $search, // Search by Kit ID
                    'Customers.customer_name LIKE' => '%' . $search . '%', // Search by Name
                ],
            ],
        ]);

        $kits = $query->toArray(); 

        if (empty($kits)) {
            throw new RecordNotFoundException('No kits found');
        }

        return $kits;

    }
}