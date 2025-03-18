<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreateAccountCase;
use Exception;
use Psr\Http\Message\ServerRequestInterface;

class AccountController extends Controller
{

    public function createAccount(ServerRequestInterface $request)
    {
        try {
            $post = $request->getParsedBody();
            $accountName = $post['accountName'] ?? null;
            $password = $post['password'] ?? null;
            $email = $post['email'] ?? null;
            $federalId = $post['federalId'] ?? null;
            $createAccountCase = new CreateAccountCase();
            return $createAccountCase->execute($accountName, $password, $email, $federalId);
            //to do, trabalhar no retorno
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
