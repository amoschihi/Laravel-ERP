<?php

namespace App\Http\Controllers;

use App\Icon;
use App\Menu;
use App\role;
use App\Submenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        $allMenus = Menu::all();
        $icons = Icon::all();
        return view('admin.menu',compact('allMenus','icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = role::all();
        $allMenus = Menu::all();
        $icons = Icon::all();
        return view('admin.newmenu',compact('allMenus','roles','icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'menu_name' => 'required|max:30',
            'priviledges' => 'required',
            'position' => 'required|numeric',
            'visible' => 'required',
        ]);

        $menu = Menu::create([
            'menu_name' => $request->menu_name,
            'position' => $request->position,
            'icon_id' => $request->icon,
            'visible' => $request->visible,
        ]);
        $menu->roles()->sync($request->priviledges);
        return redirect('admin/menu_management/create')->with('info', 'Menu created successfully');
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
        dd('ready to show');
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
        $allMenus = Menu::all();
        $children = Submenu::orderBy('position')->get();
        $icons = Icon::orderBy('icon_name')->get();
        $roles = role::all();
        $menu = Menu::with('roles')->find($id);
        return view('admin.editmenu',compact('allMenus','roles','menu','icons','children'));
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
        $icon = Icon::find($request->icon);
        $menu = Menu::with(['icon','roles'])->find($id);
        $menu->icon()->associate($icon);
        $menu->menu_name = $request->menu_name;
        $menu->position = $request->position;
        $menu->visible = $request->visible;

        $menu->save();
        $menu->roles()->sync($request->priviledges);
        return redirect('admin/menu_management/'.$id.'/edit')->with('info', 'Menu updated successfully');
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
        $menu = Menu::find($id);
        $menu->roles()->detach($id);
        $menu->submenus()->detach($id);
        $menu->delete();
        return redirect('admin/menu_management');
    }

    public function sortMenus(Request $request)
    {
        if ($request->ajax()) {
            $menus = $request->menus;
            $menus = json_decode($menus,true);            
            
            $i = 1;
            foreach($menus[0] as $menu) {
                $id = $menu['id'];
                Submenu::where('id',$id)->update(['position'=>$i]);
                $i++;
            }

            return response()->json(['success'=>true]);
        }
    }

    public function hideOrUnhide(Request $request)
    {
        if ($request->ajax()) {
            if ($request->visible == 1) {
                $visible = 0;
            }else {
                $visible = 1;
            }
            Menu::where('id',$request->id)->update(['visible'=>$visible]);
            return response()->json(['success'=>true]);
        }
    }

    public function sort() {
        $menus = Menu::orderBy('position')->get();
        $submenus = Submenu::orderBy('position')->get();
        return view('admin.sortmenu', compact('menus', 'submenus'));
    }

    public function sortAll(Request $request) {
        
        if($request->ajax()) {
            $menus = json_decode($request->menus, true);

            //sort by role
            // array_multisort(array_column($menus, 'role'), SORT_ASC, $menus);
            
            //update by order of roles
            $i = $j = 1; //to update the new menu position
            foreach(role::all() as $role) {
                //filter by role
                $roleMenus = array_values(array_filter($menus, function($var) use ($role) {
                    return ($var['role'] == $role->id);
                }));
                foreach($roleMenus as $menu) {
                    // update the menu position
                    Menu::where('id',$menu['id'])->update(['position' => $i]);
                    // update the new menu childrens
                    Submenu::whereIn('id', $menu['children'])
                            ->update([
                                'menu_id' => $menu['id']
                            ]);
                    // update children new positions
                    $childrens = $menu['children'];
                    foreach($childrens as $child) {
                        Submenu::where('id', $child['id'])->update(['position' => $j]);
                        $j++;
                    }
                    $i++; //increment position
                }
            }

            return \response()->json(['success'=>true], 200);
        }
    }
}
