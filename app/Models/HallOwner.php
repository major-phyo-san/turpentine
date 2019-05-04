<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HallOwner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'hall_owner';

    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    ];

    protected $hidden = [
    	'password',
    	'remember_token',
    ];    
}
