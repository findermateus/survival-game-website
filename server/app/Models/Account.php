<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $hidden = [
        'password'
    ];
    
    protected $fillable = [
        'account_name',
        'email',
        'federal_id'
    ];
}
