<?php

namespace App\Http\Controllers;

use App\Displinary;
use Illuminate\Http\Request;

class incidentsController extends Controller
{
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
        $ids = explode(',',$id);
        for ($i=0; $i < count($ids); $i++) { 
            # code...
            Displinary::where('id',$ids[$i])
            ->update([
                'description' => $request->description[$i],
                'victim' => $request->victim[$i],
                'referrer' => $request->referrer[$i],
                'action_taken' => $request->action_taken[$i],
            ]);
        }
        return back()->with('info','Incident(s) updated successfully!');
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

    public function delete (Request $request) 
    {
        $ids = $request->ids;
        Displinary::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Incident(s) Deleted successfully."]);
    }
}
