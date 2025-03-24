<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends User
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;

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
