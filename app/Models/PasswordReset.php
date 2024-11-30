<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    public $timestamps = false;
    
    protected $fillable = [
        'email',
        'token',
        'created_at',
        'expires_at'
    ];

    protected $dates = [
        'created_at',
        'expires_at'
    ];
}