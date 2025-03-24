<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinColor extends Model
{
    protected $table = 'skin_colors';

    protected $fillable = [
        'skin_color_name',
        'skin_color_hex'
    ];
}
