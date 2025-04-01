<?php

namespace App\Infrastructure\DAO\Eloquent;

use App\Domain\DAO\SkinColorDAOInterface;
use App\Models\SkinColor;

class SkinColorDAO implements SkinColorDAOInterface
{
    public function get(): ?array
    {
        return SkinColor::get()->toArray();
    }
}
