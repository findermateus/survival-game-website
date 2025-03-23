<?php

namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Repositories\NPCRepositoryInterface;
use App\Models\NonPlayableCharacter;
use App\Models\NpcValidationQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NPCRepository implements NPCRepositoryInterface
{
    public function find(?int $accountId = null): ?NonPlayableCharacter
    {
        return NonPlayableCharacter::where('account_id', '=', $accountId)->first();
    }

    public function create(array $payload, int $accountId): void
    {
        DB::beginTransaction();
        try {

            $npc = NonPlayableCharacter::create([
                'name' => $payload['name'],
                'skin_color_id' => $payload['skinColor'],
                'gender_id' => $payload['gender'],
                'hair_color' => $payload['hairColor'],
                'account_id' => $accountId
            ]);
            NpcValidationQueue::insert([
                'npc_id' => $npc->id,
                'last_checked_at' => Carbon::now()
            ]);
            DB::commit();

        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }

    }
}
