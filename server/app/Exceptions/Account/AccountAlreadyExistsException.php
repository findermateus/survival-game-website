<?php

namespace App\Exceptions\Account;

use App\Core\ExceptionType;
use Exception;

class AccountAlreadyExistsException extends ApplicationException
{
    public function __construct(string $message = "", int $httpStatus = 400, ?Exception $exception = null)
    {
        parent::__construct($message, $httpStatus, ExceptionType::AccountAlreadyExists, $exception);
    }
}
