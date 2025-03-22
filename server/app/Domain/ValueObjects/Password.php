<?php

namespace App\Domain\ValueObjects;

use App\Exceptions\Account\InvalidPasswordException;

class Password
{
    private string $password;
    private string $rawPassword;

    public function __construct(string $password)
    {
        $this->validatePassword($password);
        $this->encrypt($password);
    }

    private function validatePassword($password)
    {
        if (strlen($password) < 8) {
            throw new InvalidPasswordException("A senha deve ter no mínimo 8 caracteres");
        }
        $this->rawPassword = $password;
    }

    private function encrypt($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verify($password)
    {
        return password_verify($this->rawPassword, $password);
    }

    public function __toString()
    {
        return $this->password;
    }
}
