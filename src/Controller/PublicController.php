<?php
// src/Controller/PublicController.php

namespace App\Controller;

use App\Repository\KitRepositoryInterface;
use Cake\Datasource\Exception\RecordNotFoundException;

class PublicController extends AppController
{
    /**
     * Index method
     */
    public function index(KitRepositoryInterface $kitRepository)
    {
        $kits = [];

        if ($this->request->is('post')) {
            $search = $this->request->getData('search');
            
            try {
                $kits = $kitRepository->searchKits($search);
            } catch (RecordNotFoundException $e) {
                // return empty $kits
            }
        }

        $this->set('kits', $kits);
    }
}