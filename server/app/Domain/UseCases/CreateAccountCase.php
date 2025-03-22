<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\Services\EmailValidatorService;
use App\Domain\ValueObjects\FederalId;
use App\Domain\ValueObjects\Password;
use App\Exceptions\Account\AccountAlreadyExistsException;
use App\Exceptions\Account\InvalidEmailException;

class CreateAccountCase
{
    public function __construct(private readonly AccountRepositoryInterface $accountRepository)
    {
    }

    public function execute($name, $password, $email, $federalId): void
    {
        $this->validateEmail($email);
        $cleanFederalId = $this->verifyFederalId($federalId);
        $encryptedPassword = $this->buildPassword($password);
        $this->validateAccountDoesntExists($email, $cleanFederalId);
        $this->accountRepository->createAccount([
            'name' => $name,
            'password' => $encryptedPassword,
            'email' => $email,
            'federalId' => $cleanFederalId
        ]);
    }

    private function validateEmail($email): void
    {
        $emailValidator = new EmailValidatorService();
        if (!$emailValidator->validate($email)) {
            throw new InvalidEmailException("Email inválido");
        }
    }

    private function buildPassword($password)
    {
        $password = new Password($password);
        return $password->__toString();
    }

    private function verifyFederalId($federalId): array|string|null
    {
        $federalId = new FederalId($federalId ?? '');
        return $federalId->__toString();
    }

    private function validateAccountDoesntExists($email, $cleanFederalId): void
    {
        $account = $this->accountRepository->findAccount($email, $cleanFederalId);
        if (!empty($account)) {
            throw new AccountAlreadyExistsException("Uma conta já existe com as credênciais informadas!");
        }
    }
}
