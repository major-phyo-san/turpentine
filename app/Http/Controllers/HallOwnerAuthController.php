<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * 
 */
class HallOwnerAuthController extends Controller
{
	public function showLoginForm()
	{
		return view('auth.login');
	}

	public function showRegisterForm()
	{
		return view('auth.register');
	}

	protected function HallOwnerLogin()
	{
		return 'Logged in Owner';
	}

	protected function HallOwnerRegister()
	{
		return 'Registered Owner';
	}
	
}
