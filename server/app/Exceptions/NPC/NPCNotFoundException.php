<?php

namespace App\Exceptions\NPC;

use App\Core\ExceptionType;
use App\Exceptions\Account\ApplicationException;

class NPCNotFoundException extends ApplicationException
{
    public function __construct(string $message = "", int $httpStatus = 400, ?\Exception $exception = null)
    {
        parent::__construct($message, $httpStatus, ExceptionType::NPCNotFound, $exception);
    }
}
