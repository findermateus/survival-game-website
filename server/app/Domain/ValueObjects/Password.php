<?php

namespace App\Domain\ValueObjects;

use Exception;

class Password
{
    private $password;

    public function __construct(string $password)
    {
        $this->validatePassword($password);
        $this->encrypt($password);
    }

    private function validatePassword($password)
    {
        if (strlen($password) < 8) {
            throw new Exception("A senha deve ter no mínimo 8 caracteres");
        }
    }

    private function encrypt($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verify($password)
    {
        return password_verify($password, $this->password);
    }

    public function __toString()
    {
        return $this->password;
    }
}
