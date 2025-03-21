<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $account_id
 * @property int $non_playable_character_id
 * @property string $reason
 * @property string|null $rejected_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereNonPlayableCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereRejectedAt($value)
 * @mixin \Eloquent
 */
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
