<?php

namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Repositories\NPCRepositoryInterface;
use App\Models\NonPlayableCharacter;

class NPCRepository implements NPCRepositoryInterface
{
    public function find(?int $accountId = null): ?NonPlayableCharacter
    {
        return NonPlayableCharacter::where('account_id', '=', $accountId)->first();
    }

    public function create(array $payload, int $accountId): void
    {
        NonPlayableCharacter::insert([
            [
                'name' => $payload['name'],
                'skin_color_id' => $payload['skinColor'],
                'gender_id' => $payload['gender'],
                'hair_color' => $payload['hairColor'],
                'account_id' => $accountId
            ],
        ]);
    }
}
