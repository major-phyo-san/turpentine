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
		$this->validate($request, [
			'email'=>'required|email',
			'password'=>'required|min:8'
		]);

		if(Auth::guard('hall_user')->attempt([
			'email'=>$request->email, 
			'password'=>$request->password], 
			$request->get('remember')))
		{
			return redirect()->intended('/hall-user');

		}

		return back()->withInput($request->only('email','remember'))->withErrors(array('Login failed, try again'));
	}

	public function HallOwnerLogin()
	{

	}
}
