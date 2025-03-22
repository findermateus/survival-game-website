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

    public function create(array $payload): void
    {
        NonPlayableCharacter::insert([
            [
                'name' => $payload['name'],
                'skin_color_id' => $payload['skinColor'],
                'role' => $payload['role'],
                'age' => $payload['age'],
                'description' => $payload['description'],
            ],
        ]);
    }
}
