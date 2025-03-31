<?php

namespace App\Infrastructure\Repositories\Eloquent;

use App\Core\NpcStatus;
use App\Domain\Repositories\NPCRepositoryInterface;
use App\Models\NonPlayableCharacter;
use App\Models\NpcRejection;
use App\Models\NpcValidationQueue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class NPCRepository implements NPCRepositoryInterface
{
    public function find(?int $accountId = null): ?array
    {
        $npc = NonPlayableCharacter::where('account_id', '=', $accountId)->first();
        if (empty($npc)){
            return null;
        }
        $npcRejections = NpcRejection::where('non_playable_character_id', '=', $npc->id);
        return [
            'npc' => $npc,
            'rejections' => $npcRejections->get()
        ];
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

    public function updateNpc(NonPlayableCharacter $npc, $name, $gender, $skinColor, $hairColor): bool
    {
        $npc->update([
            'name' => $name,
            'gender_id' => $gender,
            'skin_color_id' => $skinColor,
            'hair_color' => $hairColor
        ]);
        return $npc->save();
    }

    public function addNpcToValidationQueue(NonPlayableCharacter $npc){

        DB::beginTransaction();
        try{
            $npc->approval_status = NpcStatus::Pending->name;
            $npc->approved_at = null;
            $npc->save();
            $npcQueueItem = NpcValidationQueue::where('npc_id', '=', $npc->id)->first();
            if (empty($npcQueueItem)){
                NpcValidationQueue::insert([
                    'npc_id' => $npc->id,
                    'last_checked_at' => Carbon::now()
                ]);
                DB::commit();
                return;
            }
            $npcQueueItem->last_checked_at = Carbon::now();
            $npcQueueItem->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function approve($npcId): void
    {
        DB::beginTransaction();
        try{

            NonPlayableCharacter::where('id', '=', $npcId)->update([
                'approval_status' => NpcStatus::Approved->name,
                'approved_at' => Carbon::now()
            ]);

            NpcValidationQueue::where('npc_id', '=', $npcId)->delete();

            DB::commit();

        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }

    }

    public function reprove($npcId, $reason): void
    {
        DB::beginTransaction();
        try{

            NpcValidationQueue::where('npc_id', '=', $npcId)->delete();

            NpcRejection::insert([
                'non_playable_character_id' => $npcId,
                'reason' => $reason,
                'rejected_at' => Carbon::now(),
            ]);

            NonPlayableCharacter::where('id', '=', $npcId)->update([
                'approval_status' => NpcStatus::Rejected->name,
                'approved_at' => null
            ]);
            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public function fetch(): ?Collection
    {
        return NonPlayableCharacter::get();
    }
}
