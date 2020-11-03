<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
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

        foreach(Role::all() as $rl) {
            if($role == $rl->name) {
                return \redirect($rl->redirect);
            }
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
     * Show role center form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRoleCenterForm(Admin $user) {
        $roles = $user->role; 
        $name = $user->name;
	    return view('admin.role', compact('roles','name'));
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
