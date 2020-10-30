<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Applicant;
use App\Menu;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('locked');
        $this->middleware('auth:admin');
        $this->middleware('instructor');
    }
	public function index () 
	{
        return view('dashboard');
	}
    
    public function showStudents () 
    {
        $applicants = Applicant::all()->where('Approved',1);
        return view('admin.index',compact('applicants'));
    }
}
