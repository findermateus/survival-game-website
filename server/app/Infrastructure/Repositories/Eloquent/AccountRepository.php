<?php

namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Exceptions\Account\AccountNotCreatedException;
use App\Models\Account;

class AccountRepository implements AccountRepositoryInterface
{
    public function find($email = null, $federalId = null): ?Account
    {
        return Account::where('email', '=',  $email)
            ->orWhere('federal_id', '=', $federalId)
            ->first();
    }

    public function create($payload): void
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
