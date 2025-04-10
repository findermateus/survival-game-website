<?php

namespace App\Infrastructure\DAO\Eloquent;

use App\Core\NpcStatus;
use App\Domain\DAO\NpcDAOInterface;
use App\Models\NonPlayableCharacter;
use Illuminate\Database\Eloquent\Collection;

class NpcDAO implements NpcDAOInterface
{
    public function findOldestValidatedNpc($limit): ?Collection
    {
        return NonPlayableCharacter::join('npc_validation_queues', 'non_playable_characters.id', '=', 'npc_validation_queues.npc_id')
            ->where('non_playable_characters.approval_status', '=', NpcStatus::Pending->name)
            ->whereNotNull('npc_validation_queues.last_checked_at')
            ->orderBy('npc_validation_queues.last_checked_at', 'asc')
            ->limit($limit)
            ->get(['non_playable_characters.*']);
    }

    public function fetch(): ?Collection
    {
        return NonPlayableCharacter::whereApprovalStatus(NpcStatus::Approved->name)->get();
    }

}
