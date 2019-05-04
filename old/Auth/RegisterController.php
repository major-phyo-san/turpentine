<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Models\HallOwner;
use App\Models\HallUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:HallOwner');
        $this->middleware('guest:HallUser');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showHallOwnerRegisterForm()
    {
        return view('auth.register',['url'=>'HallOwner']);
    }

    protected function createHallOwner(Request $request)
    {
        $this->validator($request->all())->validate();
        $hallOwner = HallOwner::create([
            'hall_owner_name'=>$request['name'],
            'hall_owner_email'=>$request['email'],
            'hall_owner_phone'=>$request['phone'],
            'hall_owner_password'=>Hash::make($request['password']),
        ]);

        return redirect()->intended('login/hall-owner');
    }

    public function showHallUserRegisterForm()
    {
         return view('auth.register',['url'=>'HallUser']);
    }

    protected function createHallUser(Request $request)
    {
        $this->validator($request->all())->validate();
        $hallUser = HallUser::create([
            'hall_user_name'=>$request['name'],
            'hall_user_email'=>$request['email'],
            'hall_user_phone'=>$request['phone'],
            'hall_user_password'=>Hash::make($request['password']),
        ]);

        return redirect()->intended('login/hall-user');
    }
}
