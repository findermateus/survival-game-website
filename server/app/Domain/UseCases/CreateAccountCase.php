<?php

namespace App\Domain\UseCases;

use App\Domain\Services\EmailValidatorService;
use App\Domain\ValueObjects\FederalId;
use App\Domain\ValueObjects\Password;
use Exception;

class CreateAccountCase
{
    public function execute($name, $password, $email, $federalId)
    {
        $this->validateEmail($email);
        $cleanPassword = $this->buildPassword($password);
        $cleanFederalId = $this->verifyFederalId($federalId);
        // usar o eloquent pra buscar alguma conta com esse nome ou email, se tiver taca exception
        //(precisa do banco configurado para aparecerem os métodos.)
    }

    private function validateEmail($email)
    {
        $emailValidator = new EmailValidatorService();
        if (!$emailValidator->validate($email)) {
            throw new Exception("Email inválido");
        }
    }

    private function buildPassword($password)
    {
        $password = new Password($password);
        return $password->__toString();
    }

    private function verifyFederalId($federalId)
    {
        $federalId = new FederalId($federalId);
        return $federalId->__toString();
    }
}
