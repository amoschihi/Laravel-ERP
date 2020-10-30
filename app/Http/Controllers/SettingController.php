<?php

namespace App\Http\Controllers;
use App\Icon;
use App\Setting;
use DB;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    //
	public function __construct () 
	{
		$this->middleware('auth:admin');
	}
    function create(Request $request) {
    	$fav ="";
    	$logo="";
    	if ($request->hasFile('logo')) {
	    	$logo = $request->logo->store('public/img');
    	}

    	if($request->hasFile('favicon')) {
    		$fav = $request->favicon->store('public/img');
    	}
    	$logo = str_after($logo,'public/img/');
    	$fav = str_after($fav,'public/img/');

    	$setting = Setting::find(1);
    	if($request->file('logo')==null&&$request->file('favicon')==null) {
	    	$setting->appname = $request->appname;
	    	$setting->save();
    	}elseif ($request->file('favicon')==null) {
    		$setting->appname = $request->appname;
    		$setting->logo = $logo;
    		$setting->save();
    	}else {
    		$setting->appname = $request->appname;
    		$setting->logo = $logo;
    		$setting->favicon = $fav;
    		$setting->save();
    	}
    	return redirect('admin/settings');
    }
    function index() {
    	return view('app.setting');
    }
	public function back () 
	{
		return back();
	}
	public function icons () 
	{
		// $icons = DB::table('icons')->paginate(15);
		$icons = DB::table('icons')->orderBy('icon_name')->get();
		return view('app.icons',compact('icons'));
	}
	public function saveIcon (Request $request) 
	{
		$this->validate($request, [
			'icon_path'=>'required|unique:icons',
			'icon_name'=>'required|unique:icons',
		]);

		Icon::create($request->input());
    	return redirect('admin/settings/icons')->with('info', 'Icon added successfully');
	}

	public function updateNotifications (Request $request) 
	{
		$setting = Setting::find(1);
		$setting->notifications = $request->state;
		$setting->save();
		return 'Done';
	}
}
