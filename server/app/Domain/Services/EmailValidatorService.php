<?php

namespace App\Domain\Services;

class EmailValidatorService
{
    public function validate($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
