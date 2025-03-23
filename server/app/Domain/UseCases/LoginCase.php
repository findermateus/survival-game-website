<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\Services\EmailValidatorService;
use App\Domain\ValueObjects\Password;
use App\Exceptions\Account\AccountNotFoundException;
use App\Exceptions\Account\InvalidEmailException;
use App\Exceptions\Account\InvalidPasswordException;
use App\Models\Account;

class LoginCase
{
    private AccountRepositoryInterface $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function execute($email, $password): ?Account
    {
        return $this->verify($email, $password);
    }

    private function verify($email, $password): ?Account
    {
        $emailValidatorService = new EmailValidatorService();
        if (!$emailValidatorService->validate($email)){
            throw new InvalidEmailException('Email inválido.');
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
