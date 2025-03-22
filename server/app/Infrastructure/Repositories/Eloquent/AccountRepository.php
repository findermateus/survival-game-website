<?php

namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Exceptions\AccountNotCreatedException;
use App\Models\Account;

class AccountRepository implements AccountRepositoryInterface
{
    public function findAccountByEmailAndFederalId($email, $federalId)
    {
        return Account::where('email', '=', $email)
            ->where('federal_id', '=', $federalId)
            ->first();
    }

    public function createAccount($payload): void
    {
        $account = new Account();
        $account->account_name = $payload['name'];
        $account->password = $payload['password'];
        $account->email = $payload['email'];
        $account->federal_id = $payload['federalId'];
        if(!$account->save()) {
            throw new AccountNotCreatedException("Não foi possível criar a conta.");
        }
    }
}
