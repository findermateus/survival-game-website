<?php

namespace App\Domain\Repositories;

use App\Models\NonPlayableCharacter;

interface NPCRepositoryInterface
{
    public function find(?int $accountId = null): ?array;

    public function create(array $payload, int $accountId);

    public function updateNpc(NonPlayableCharacter $npc, $name, $gender, $skinColor, $hairColor): bool;

    public function approve($npcId): void;

    public function reprove($npcId, $reason): void;

    public function addNpcToValidationQueue(NonPlayableCharacter $npc);

}
