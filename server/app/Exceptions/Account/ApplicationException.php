<?php

namespace App\Exceptions\Account;

use App\Core\ExceptionType;
use Exception;
use Illuminate\Http\JsonResponse;

class ApplicationException extends Exception
{
    protected int $httpStatus;
    protected ExceptionType $exceptionType;

    public function __construct(string $message = "", $httpStatus = 400, ExceptionType $exceptionType = ExceptionType::Unknown, ?Exception $previous = null)
    {
        $this->exceptionType = $exceptionType;
        $this->httpStatus = $httpStatus;
        parent::__construct($message, 0, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
            'error' => $this->exceptionType->name
        ], $this->httpStatus);
    }
}
