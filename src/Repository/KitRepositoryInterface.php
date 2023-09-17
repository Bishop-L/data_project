<?php
// src/Repository/KitRepositoryInterface.php

namespace App\Repository;

interface KitRepositoryInterface
{
    /**
     * Search for kits based on a search query.
     *
     * @param string $search The search query.
     * @return array An array of kits matching the search.
     */
    public function searchKits(string $search): array;
}