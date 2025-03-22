<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\ValueObjects\Password;
use App\Exceptions\Account\AccountNotFoundException;
use App\Exceptions\Account\InvalidEmailException;
use App\Exceptions\Account\InvalidPasswordException;
use App\Models\Account;
use Laravel\Sanctum\NewAccessToken;

class LoginCase
{
    private AccountRepositoryInterface $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function execute($email, $password): ?NewAccessToken
    {
        $account = $this->verify($email, $password);
        return $account->createToken('access-token');
    }

    private function verify($email, $password): ?Account
    {
        if (empty($email)){
            throw new InvalidEmailException('Email não enviado.');
        }
        $account = $this->accountRepository->find($email);
        if (!$account instanceof Account){
            throw new AccountNotFoundException('Conta não encontrada com as credenciais selecionadas.');
        }
        $passwordVO = new Password($password);
        if (!$passwordVO->verify($account->password)){
            throw new InvalidPasswordException('Senha inválida');
        }
        return $account;
    }
}
