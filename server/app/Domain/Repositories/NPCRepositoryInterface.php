<?php

namespace App\Domain\Repositories;

use App\Models\NonPlayableCharacter;

interface NPCRepositoryInterface
{
    public function find(?int $accountId = null): ?NonPlayableCharacter;

    public function create(array $payload, int $accountId);

    public function approve($npcId): void;

    public function reprove($npcId, $reason): void;
}
