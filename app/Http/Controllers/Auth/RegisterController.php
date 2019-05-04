<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Models\HallUser;
use App\Models\HallOwner;

/**
 * 
 */
class RegisterController extends Controller
{
		
	public function showHallUserRegisterForm()
	{
		return view('auth.register');
	}

	public function showHallOwnerRegisterForm()
	{
		return view('auth.register');
	}

	protected function validator(array $data)
	{
		return Validator::make($data,[
			'name'=>['required', 'string', 'max:255'],
			'email'=>['required', 'string', 'email', 'max:255', 'unique:hall_users'],
			'phone'=>['required', 'string','unique:hall_users'],
			'password'=>['required', 'min:8'],
			'password_again'=>['same:password'],
		]);
	}

	protected function HallUserRegister(Request $request)
	{
		if($this->validator($request->all())->validate())
		{
			$hallUser = HallUser::create([
				'name'=>$request['name'],
				'email'=>$request['email'],
				'phone'=>$request['phone'],
				'password'=>Hash::make($request['password']),
			]);

			return redirect()->intended('/login/hall-user');
		}
	}

	protected function HallOwnerRegister(Request $request)
	{
		if($this->validator($request->all())->validate())
		{
			$hallOwner = HallOwner::create([
				'name'=>$request['name'],
				'email'=>$request['email'],
				'phone'=>$request['phone'],
				'password'=>Hash::make($request['password']),
			]);

			return redirect()->intended('/login/hall-owner');
		}

	}


}