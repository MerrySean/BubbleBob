<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {
        $logs = new \App\Models\User_Logs;
        $logs->user_id = $user->id;
        $logs->status = 'logged In';
        $logs->user_id = $user->id;
        $logs->save();
    }

    protected function BeforeloggedOut(Request $request, $user)
    {
        $logs = new \App\Models\User_Logs;
        $logs->user_id = $user->id;
        $logs->status = 'logged Out';
        $logs->user_id = $user->id;
        $logs->save();
    }
}
