<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\NPCRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetAllNpcCase
{
    public function __construct(private readonly NPCRepositoryInterface $npcRepository)
    {
    }

    public function execute(): ?Collection
    {
        return $this->npcRepository->fetch();
    }
}
