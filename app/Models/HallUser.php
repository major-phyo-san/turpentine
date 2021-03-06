<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HallUser extends Authenticatable
{
	use Notifiable;

	protected $guard = 'hall_user'; ///guard name from config/auth.php

	protected $fillable = [
		'name',
		'email',
		'phone',
		'password',
	];

	protected $hidden = [		
		'password',
		'remember_token',
	];
}
