<?php

namespace App\Http\Controllers;

use App\Icon;
use App\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    private $mm;
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        if(isset($_GET['mm'])) $this->mm = $_GET['mm'];
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'create';
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
        if ($request->role=='student' || $request->role=='class rep') {
            $link = Str::lower(Str::slug($request->menu_name,'_'));
        }elseif($request->role=='admin' || $request->role=='instructor' || $request->role=='finance') {
            $link = Str::lower('admin/'.Str::slug($request->menu_name,'_'));
        }elseif($request->role=='agent') {
            $link = Str::lower('agent/'.Str::slug($request->menu_name,'_'));
        }else {
            $link = 'NotFound';
        }
        Submenu::create([
            'menu_id'=>$request->menu_id,
            'menu_name'=>$request->menu_name,
            'position'=>$request->position,
            'visible'=>$request->visible,
            'icon_id'=>$request->icon_id,
            'link'=>$link
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        //
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu, $id)
    {
        //
        $mm = $this->mm;
        $submenus = $submenu->orderBy('position')->get();
        $icons = Icon::orderBy('icon_name')->get();
        $submenu = $submenu->find($id);
        return view('admin.editsubmenu',compact('submenu','submenus','icons','mm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu, $id)
    {
        //
        $submenu = $submenu::find($id);
        $submenu->icon_id = $request->icon;
        $submenu->menu_name = $request->menu_name;
        $submenu->position = $request->position;
        $submenu->visible = $request->visible;
        $submenu->save();

        return redirect('admin/submenu_management/'.$id.'/edit?mm='.$this->mm)->with('info', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu, $id)
    {
        //
        $submenu->destroy($id);
        return redirect('admin/menu_management/'.$this->mm.'/edit');
    }

    public function hideOrUnhide(Request $request)
    {
        if ($request->ajax()) {
            if ($request->visible == 1) {
                $visible = 0;
            }else {
                $visible = 1;
            }
            Submenu::where('id',$request->id)->update(['visible'=>$visible]);
            return response()->json(['success'=>true]);
        }
    }

    public function nestMenu(Request $request) 
    {
        Submenu::where('id',$request->id)->update(['menu_id'=>$request->menu_id]);
        return redirect('admin/menu_management/'.$request->return_id.'/edit')->with('success', 'Sub Menu moved successfully');;
    }
}
