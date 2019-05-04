<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;

use App\Models\HallOwner;
use App\Models\HallUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:HallOwner')->except('logout');
        $this->middleware('guest:HallUser')->except('logout');
    }

    public function showHallOwnerLoginForm(){
        return view('auth.login', ['url'=>'HallOwner']);
    }

    public function HallOwnerLogin(Request $Request){
        $this->validate($request, [
            'hall_owner_email'=>'required|email',
            'hall_owner_phone'=>'required',
            'hall_owner_password'=>'required|min:6'
        ]);

        if(Auth::guard('HallOwner')->attempt(['hall_owner_email'=>$request->email,'hall_owner_phone'=>$request->phone,'hall_owner_password'=>$request->password], $request->get('remember'))){
            return redirect()->intended('/hall-owner');
        }

        return back()->withInput($request->only('hall_owner_email','hall_owner_phone','remember'));
    }

    public function showHallUserLoginForm(){
        return view('auth.login', ['url'=>'HallUser']);
    }

    public function HallUserLogin(Request $request){
        $this->validate($request, [
            'hall_user_email'=>'required|email',
            'hall_user_phone'=>'required',
            'hall_user_password'=>'required|min:6'
        ]);

        if(Auth::guard('HallUser')->attempt(['hall_user_email'=>$request->email,'hall_user_phone'=>$request->phone,'hall_user_password'=>$request->password], $request->get('remember'))){
            return redirect()->intended('/hall-user');
        }

        return back()->withInput($request->only('hall_userr_email','hall_user_phone','remember'));

    }
}
