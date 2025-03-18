<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonPlayableCharacter extends Model
{
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
}
