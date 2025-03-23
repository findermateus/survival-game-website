<?php

namespace App\Domain\Repositories;

use App\Models\Account;

interface AccountRepositoryInterface
{
    public function find($email = null, $federalId = null);

    public function create($payload): ?Account;
}
