<?php

namespace App\Http\Controllers;

use App\Role;
use App\Admin;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserManagementController extends Controller
{
    /**
     * constructor
     *
     * @var  string
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Admin::all();
        return view('users.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:admins'
        ]);
        if(!empty($request->password)) {
            $password = trim($request->password);
        }else {
            // set the password automatically
            $length = 10;
            $keyspace = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->save();

        // Send the new password to the user
        
        Mail::to($user->email)->send(new PasswordResetMail($password));

        return redirect('admin/user_management/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Admin::where('id',$id)->with('role')->first();
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Admin::where('id',$id)->with('role')->first();
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:admins,email,'.$id
        ]);
        $password = "";
        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password_options == 'auto') {
            // set the password manually
            $length = 10;
            $keyspace = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
            $user->password = Hash::make($password);
        }elseif($request->password_options == 'manual') {
            $password = $request->password;
            $user->password = Hash::make($password);
        }

        $user->save();
        $user->role()->sync($request->roles);

        // Send the new password to the user
        Mail::to($user->email)->send(new PasswordResetMail($password));

        return redirect('admin/user_management/'.$id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
