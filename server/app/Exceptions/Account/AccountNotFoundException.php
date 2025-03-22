<?php

namespace App\Exceptions\Account;
use App\Core\ExceptionType;
use Exception;

class AccountNotFoundException extends ApplicationException
{
    public function __construct($message = "", ?Exception $exception = null)
    {
        parent::__construct($message, 400, ExceptionType::AccountNotFound, $exception);
    }
}
