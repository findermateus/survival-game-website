<?php

namespace App\Exceptions\Account;

use App\Core\ExceptionType;
use Exception;

class InvalidFederalIdException extends ApplicationException
{
    public function __construct(string $message = "", ?Exception $previous = null)
    {
        parent::__construct($message, 400, ExceptionType::Domain , $previous);
    }
}
