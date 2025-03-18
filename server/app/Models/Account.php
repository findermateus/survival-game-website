<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $hidden = [
        'password'
    ];
    
    protected $fillable = [
        'account_name',
        'email',
        'federal_id'
    ];
}
