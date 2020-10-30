<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FinanceController extends Controller
{
    //
    public function __construct(){
        $this->middleware('locked');
        $this->middleware('auth:admin');
        $this->middleware('finance');
    }

    public function index() {
        return view('dashboard');
    }
}
