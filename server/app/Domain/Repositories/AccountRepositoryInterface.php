<?php

namespace App\Domain\Repositories;

interface AccountRepositoryInterface
{
    public function findAccount($email = null, $federalId = null);

    public function createAccount($payload): void;
}
