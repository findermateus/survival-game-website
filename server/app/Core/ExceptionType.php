<?php

namespace App\Core;

enum ExceptionType
{
    case Domain;
    case Unknown;
    case InvalidEmail;
    case InvalidPassword;
    case AccountAlreadyExists;
    case AccountNotCreated;
    case AccountNotFound;
}
