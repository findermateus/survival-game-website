<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreateAccountCase;
use App\Domain\UseCases\LoginCase;
use App\Http\Requests\CreateAccountRequest;
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

    public function createAccount(CreateAccountRequest $request): JsonResponse
    {
        $accountName = $request->input('accountName');
        $password = $request->input('password');
        $email = $request->input('email');
        $federalId = $request->input('federalId');
        $accountRepository = new AccountRepository();
        $createAccountCase = new CreateAccountCase($accountRepository);
        $account = $createAccountCase->execute($accountName, $password, $email, $federalId);
        $token = $this->getTokenFromAccount($account);
        return response()->json([
            'token' => $token
        ]);
    }
}
