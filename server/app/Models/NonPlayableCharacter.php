<?php

namespace App\Models;

use App\Core\NpcStatus;
use Illuminate\Database\Eloquent\Model;

class NonPlayableCharacter extends Model implements \JsonSerializable
{
    public $timestamps = false;

    protected $table = 'non_playable_characters';

    protected $fillable = [
        'name',
        'hair_color',
        'account_id',
        'gender_id',
        'skin_color_id',
        'is_approved',
        'approved_at',
    ];

    public function jsonSerialize(): mixed
    {
        $npcStatus = NpcStatus::Approved;
        if (!$this->is_approved){
            $queueItem = NpcValidationQueue::where('npc_id', '=', $this->id)->first();
            $npcStatus = empty($queueItem) ? NpcStatus::Rejected : NpcStatus::Pending;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hairColor' => $this->hair_color,
            'accountId' => $this->account_id,
            'genderId' => $this->gender_id,
            'skinColor' => $this->skin_color_id,
            'status' => $npcStatus->name,
            'approvedAt' => $this->approved_at
        ];
    }
}
