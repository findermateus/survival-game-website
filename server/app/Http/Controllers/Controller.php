<?php

namespace App\Http\Controllers;

use App\Models\Account;

abstract class Controller
{
    public function getTokenFromAccount(Account $account): string
    {
        $token = $account->createToken('access-token')->plainTextToken;
        return explode("|", $token)[1];
    }
}
