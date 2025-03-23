<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreateAccountCase;
use App\Domain\UseCases\LoginCase;
use App\Infrastructure\Repositories\Eloquent\AccountRepository;
use Illuminate\Http\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class AccountController extends Controller
{

    public function login(ServerRequestInterface $request): JsonResponse
    {
        $post = $request->getParsedBody();
        $email = $post['email'] ?? null;
        $password = $post['password'] ?? null;
        $accountRepository = new AccountRepository();
        $logInCase = new LoginCase($accountRepository);
        $account = $logInCase->execute($email, $password);
        $token = $this->getTokenFromAccount($account);
        return response()->json([
            'token' => $token
        ]);
    }

    public function createAccount(ServerRequestInterface $request): JsonResponse
    {
        $post = $request->getParsedBody();
        $accountName = $post['accountName'] ?? null;
        $password = $post['password'] ?? null;
        $email = $post['email'] ?? null;
        $federalId = $post['federalId'] ?? null;
        $accountRepository = new AccountRepository();
        $createAccountCase = new CreateAccountCase($accountRepository);
        $account = $createAccountCase->execute($accountName, $password, $email, $federalId);
        $token = $this->getTokenFromAccount($account);
        return response()->json([
            'token' => $token
        ]);
    }
}
