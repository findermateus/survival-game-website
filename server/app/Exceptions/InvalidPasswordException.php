<?php

namespace App\Exceptions;

use App\Core\ExceptionType;
use Exception;

class InvalidPasswordException extends ApplicationException
{
    public function __construct(string $message = "", ?Exception $previous = null)
    {
        parent::__construct($message, 400, ExceptionType::InvalidPassword, $previous);
    }
}
