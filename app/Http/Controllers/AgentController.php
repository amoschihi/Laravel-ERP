<?php

namespace App\Http\Controllers;

use App\Agent;
use App\FileUpload;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
    * 
    *
    * 
    */
    public function __construct () 
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agent = Agent::all();
        return view('agents.agents',['agents'=>$agent]);
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
        $agent = new Agent();
        $agent->name = $request->othernames.' '.$request->surname;
        $agent->photo = FileUpload::photo($request,'photo','agent');
        $agent->location = $request->location;
        $agent->contact = $request->contact;
        $agent->dob = $request->dob;
        $agent->national_id = $request->national_id;
        $agent->gender = $request->gender;
        $agent->save();
        return back();
        
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
        $selectedAgent = Agent::find($id);
        return view('agents.profile',['agent'=>$selectedAgent]);
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
