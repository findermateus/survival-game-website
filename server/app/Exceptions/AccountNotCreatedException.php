<?php

namespace App\Exceptions;
use App\Core\ExceptionType;
use Exception;
class AccountNotCreatedException extends ApplicationException
{
    public function __construct($message = "", ?Exception $exception = null)
    {
        parent::__construct($message, 400, ExceptionType::AccountNotCreated, $exception);
    }
}
