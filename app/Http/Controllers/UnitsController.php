<?php

namespace App\Http\Controllers;

use App\Mark;
use App\UnitRegistered;
use Illuminate\Http\Request;

class UnitsController extends Controller
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
        dd('show');
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
        $ids = explode(",", $id);
        // Sanitize marks from request to check for incomplete marks
        $totalMarks = []; $gradeArray = []; $ptArray = [];
        for ($i=0; $i < count($ids); $i++) { 
            # code...
            if($request->m_cat[$i] != null &&
                $request->m_assignment[$i] != null &&
                $request->m_exam[$i] != null) {
                    $total = ($request->m_cat[$i] + $request->m_assignment[$i])/2 + $request->m_exam[$i];
                    $total = round($total);

                    switch ($total) {
                        case $total>=70 && $total<=100:
                            $grade = 'A';
                            $pt = 5;
                            break;
                        case $total>=60 && $total<=69:
                            $grade = 'B';
                            $pt = 4;
                            break;
                        case $total>=50 && $total<=59:
                            $grade = 'C';
                            $pt = 3;
                            break;
                        case $total>=40 && $total<=49:
                            $grade = 'D';
                            $pt = 2;
                            break;
                        case $total<40:
                            $grade = 'F';
                            $pt = 1;
                            break;
                        default:
                            $grade = '-';
                            $pt = 0;
                            break;
                    }
                    
                }else{
                    // No grade
                    // No total marks
                    $total = 0;
                    $pt = 0;
                    $grade = '*';
                }
            array_push($totalMarks, $total);
            array_push($gradeArray, $grade);
            array_push($ptArray, $pt);
        }
        $request['m_total_marks'] = $totalMarks;
        $request['m_grade'] = $gradeArray;
        $request['m_gp'] = $ptArray;

        //update rows with these ids
        for ($i=0; $i < count($ids); $i++) { 
            # code...
            $mark = Mark::where(["student_id" => $request->student_id, "unit_id" => $ids[$i]])->first();
            
                $mark->update([
                    'm_assignment' => $request->m_assignment[$i],
                    'm_assignmentmissing' => $mark->m_assignment != null ? false : true, 
                    'm_cat' => $request->m_cat[$i],
                    'm_catmissing' => $mark->m_cat != null ? false : true,
                    'm_exam' => $request->m_exam[$i],
                    'm_exammissing' => $mark->m_exam != null ? false : true,
                    'm_total_marks' => $request->m_total_marks[$i],
                    'm_grade' => $request->m_grade[$i],
                    'm_gp' => $request->m_gp[$i]
                ]);
        }
        
        return redirect('admin/students/'.$request->student_id)->with('info','Mark(s) updated successfully!');
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
        Mark::whereIn('id',explode(",",$ids))->delete();
        UnitRegistered::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Unit(s) Deleted successfully."]);
    }
}
