<?php

namespace App\Exceptions\NPC;

use App\Core\ExceptionType;
use App\Exceptions\Account\ApplicationException;

class NPCAlreadyExistsException extends ApplicationException
{
    public function __construct(string $message = "", int $httpStatus = 400, ?\Exception $exception = null)
    {
        parent::__construct($message, $httpStatus, ExceptionType::NPCAlreadyExists, $exception);
    }
}
