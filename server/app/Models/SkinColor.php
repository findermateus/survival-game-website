<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $skin_color_name
 * @property string $skin_color_hex
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor whereSkinColorHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor whereSkinColorName($value)
 * @mixin \Eloquent
 */
class SkinColor extends Model
{
    protected $table = 'skin_colors';
    
    protected $fillable = [
        'skin_color_name',
        'skin_color_hex'
    ];
}
