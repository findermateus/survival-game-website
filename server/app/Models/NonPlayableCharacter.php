<?php

namespace App\Models;

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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hairColor' => $this->hair_color,
            'accountId' => $this->account_id,
            'genderId' => $this->gender_id,
            'skinColor' => $this->skin_color_id,
            'isApproved' => $this->is_approved,
            'approvedAt' => $this->approved_at
        ];
    }
}
