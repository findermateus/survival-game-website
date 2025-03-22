<?php

namespace App\Domain\Repositories;

interface AccountRepositoryInterface
{
    public function find($email = null, $federalId = null);

    public function create($payload): void;
}
