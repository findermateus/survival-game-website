<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NpcValidationQueue extends Model
{
    protected $fillable = [
        'npc_id',
        'last_checked_at'
    ];
}
