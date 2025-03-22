<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $hair_color
 * @property int $account_id
 * @property int $gender_id
 * @property int $skin_color_id
 * @property int $is_approved
 * @property string|null $approved_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereHairColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereSkinColorId($value)
 * @mixin \Eloquent
 */
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
