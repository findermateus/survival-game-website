<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\NPCRepositoryInterface;
use App\Exceptions\NPC\NPCAlreadyExistsException;

class CreateNPCCase
{
    public function __construct(
        private readonly NPCRepositoryInterface $npcRepository
    )
    {
    }

    public function execute($accountId, $gender, $name, $skinColor, $hairColor): void
    {
        $this->validateNPCDoesntExists($accountId);
        $payload = [
            'name' => $name,
            'gender' => $gender,
            'skinColor' => $skinColor,
            'hairColor' => $hairColor
        ];
        $this->npcRepository->create($payload);
    }

    private function validateNPCDoesntExists($accountId)
    {
        $npc = $this->npcRepository->find($accountId);
        if (!empty($npc)) {
            throw new NPCAlreadyExistsException('NPC já criado');
        }
    }
}
