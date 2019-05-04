<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\HallUser;

/**
 * 
 */
class HallUserAuthController extends Controller
{
	/*public function __construct()
	{
		$this->middleware('guest')->except('logout');
		$this->middleware('guest:HallUser')->except('logout');
	}*/

	public function showLoginForm()
	{
		return view('auth.login');
	}
	
	public function showRegisterForm()
	{
		return view('auth.register');
	}

	protected function HallUserLogin()
	{
		return 'Logged in';
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
				'hall_user_name'=>$request['name'],
				'hall_user_email'=>$request['email'],
				'hall_user_phone'=>$request['phone'],
				'hall_user_password'=>Hash::make($request['password']),
			]);

			return redirect()->intended('/login/hall-user');
		}
	}
}
