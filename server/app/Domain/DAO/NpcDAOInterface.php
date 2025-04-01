<?php

namespace App\Domain\DAO;

use Illuminate\Database\Eloquent\Collection;

interface NpcDAOInterface
{
    public function findOldestValidatedNpc($limit): ?Collection;

    public function fetch(): ?Collection;

}
