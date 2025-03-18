<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NpcRejection extends Model
{
    protected $table = 'npc_rejections';
    
    protected $fillable = [
        'account_id',
        'npc_id',
        'reason',
        'rejected_at',
    ];
}
