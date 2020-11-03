<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function App() {
        return view('welcome');
    }
}
