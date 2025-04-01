<?php

namespace App\Infrastructure\DAO\Eloquent;

use App\Domain\DAO\GenderDAOInterface;
use App\Models\Gender;

class GenderDAO implements GenderDAOInterface
{
    public function get(): ?array
    {
        return Gender::get()->toArray();
    }
}
