<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\NPCRepositoryInterface;
use App\Exceptions\NPC\NPCNotFoundException;
use App\Models\NonPlayableCharacter;

class GetNPCCase
{
    public function __construct(
        private readonly NPCRepositoryInterface $npcRepository
    )
    {
    }

    public function execute($accountId): ?array
    {
        $npc = $this->npcRepository->find($accountId);
        if (empty($npc)){
            throw new NPCNotFoundException("NPC não encontrado para usuário.");
        }
        return $npc;
    }
}
