<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout','role']);
    }

    /**
     * Validate the user login redirect.
     *
     * @return void
     */
    protected function validateRedirect($role)
    {
        session(['whoIsLoggedIn' => $role]);
        if ($role == 'admin') {
            return redirect('admin/home');
        }elseif ($role == 'instructor') {
            return redirect('admin');
        }elseif($role == 'finance') {
            return redirect('admin/dashboard');
        }
    }
    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $roles = $this->guard()->user()->role;
        
        foreach ($roles as $role) {

            if($roles->count() > 1 ) {
                $user = $this->guard()->user()->id;
                return redirect('admin/'.$user.'/role');
            }

            return $this->validateRedirect($role->name);
        }
    }
    /**
     * Overide login username to use 'name'
     *
     * @return \Illuminate\Http\Response
     */
    public function username() {
        return 'name';
    }
    /**
     * Get the role center form data.
     *
     * @return \Illuminate\Http\Response
     */
    public function role(Request $request) {
        $this->validate($request, [
            'role' => 'required'
        ]);
        return $this->validateRedirect($request->role);
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
