<?php

namespace App\Domain\Repositories;

interface AccountRepositoryInterface
{
    public function findAccountByEmailAndFederalId($email, $federalId);

    public function createAccount($payload): void;
}
