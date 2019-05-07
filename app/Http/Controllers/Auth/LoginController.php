<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

/**
 * 
 */
class LoginController extends Controller
{
	
	public function showHallUserLoginForm()
	{
		return view('auth.login');
	}

	public function showHallOwnerLoginForm()
	{
		return view('auth.login');
	}

	public function HallUserLogin(Request $request)
	{
		if($this->validate($request, ['email'=>'required|email', 'password'=>'required|min:8']))

		{
			$input = $request->all();
			if(Auth::guard('hall_user')->attempt([
				'email'=>$input['email'],
				'password'=>$input['password'],
			]))
			{
				return view('hall-user');
			}

			return back()->withErrors(array('Login failed, the email or password is incorrect'));
		}

		return back()->withInput($request->only('email','remember'))->withErrors(array('Invalid Login credentials, try again'));
	}

	public function HallOwnerLogin(Request $request)
	{
		if($this->validate($request, ['email'=>'required|email', 'password'=>'required|min:8']))

		{
			$input = $request->all();
			if(Auth::guard('hall_owner')->attempt([
				'email'=>$input['email'],
				'password'=>$input['password'],
			]))
			{
				return view('hall-owner');
			}

			return back()->withErrors(array('Login failed, the email or password is incorrect'));
		}

		return back()->withInput($request->only('email','remember'))->withErrors(array('Invalid Login credentials, try again'));
	}
}
