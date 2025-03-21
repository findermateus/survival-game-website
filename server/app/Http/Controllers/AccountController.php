<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreateAccountCase;
use App\Infrastructure\Repositories\Eloquent\AccountRepository;
use Exception;
use Psr\Http\Message\ServerRequestInterface;

class AccountController extends Controller
{

    public function createAccount(ServerRequestInterface $request)
    {
        $post = $request->getParsedBody();
        $accountName = $post['accountName'] ?? null;
        $password = $post['password'] ?? null;
        $email = $post['email'] ?? null;
        $federalId = $post['federalId'] ?? null;
        $accountRepository = new AccountRepository();
        $createAccountCase = new CreateAccountCase($accountRepository);
        $createAccountCase->execute($accountName, $password, $email, $federalId);
    }
}
