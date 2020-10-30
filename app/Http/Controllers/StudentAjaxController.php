<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Displinary;
use App\Level;
use App\Mark;
use App\Program;
use App\Status;
use App\Unit;
use App\UnitRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $ids = $request->ids;
        $students = Applicant::join('statuses','statuses.student_id','=','students.student_id')->join('programs','programs.program_id','=','statuses.program_id')->join('levels','levels.level_id','=','programs.level_id')->join('courses','courses.course_id','=','programs.course_id')->whereIn('students.student_id',explode(',',$ids))->get();
        return view('students.editStudents',compact('students','ids'));
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
        return 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $studentSlip = Mark::find($request->id);
        return $studentSlip;
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
        return 'edit';
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
        for ($i=0; $i<count($ids); $i++) {
            DB::table('students')
            ->where('student_id',$ids[$i])
            ->update([
                's_applicationno' => $request->s_applicationno[$i],
                's_surname' => $request->s_surname[$i],
                's_othernames' => $request->s_othernames[$i],
                's_homeaddress' => $request->s_homeaddress[$i],
                's_emailaddress' => $request->s_emailaddress[$i]
            ]);
        }
        return redirect('admin/students')->with('info','Students(s) updated successfully!');
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
        return 'destroy';
    }
    public function delete (Request $request) 
    {
        $ids = $request->ids;
        Applicant::whereIn('student_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Applicant(s) Deleted successfully."]);
    }
    public function editGrades (Request $request) 
    {
        $ids = $request->ids;
        $student_id = $request->student_id;
        $foundUnits = Mark::where('student_id',$student_id)->whereIn('unit_id',explode(',',$ids))->get();
        return view('students.editUnits',compact('foundUnits','ids','student_id'));
    }

    public function editIncidents (Request $request) 
    {
        $ids = $request->ids;
        $incidents = Displinary::whereIn('id',explode(',',$ids))->get();
        return view('students.editIncidents',compact('incidents','ids'));
    }
    public function getStudent($id)     
    {
        return Status::join('students','students.student_id','=','statuses.student_id')
                        ->join('programs','programs.program_id','=','statuses.program_id')
                        ->join('levels','levels.level_id','=','programs.level_id')
                        ->join('courses','courses.course_id','=','programs.course_id')
                        ->join('departments','departments.department_id','=','courses.department_id')
                        ->join('academics','academics.academic_id','=','programs.academic_id')
                        ->where('students.student_id',$id);
    }
    public function getSlip (Request $request) 
    {
        if($request->ajax()) {
            $student = $this->getStudent($request->student_id)->first();
            $getMarks = Mark::where(['student_id'=>$request->student_id,'level_id'=>$request->level_id])->get();
            $units = Unit::where(['course_id'=>$student->course_id,'level_id'=>$request->level_id])->get();
            $session = $this->currentSession($request->level_id);
            return view('students.reports.slip', compact('session','getMarks','student','units'));
        }
    }

    public function getTranscript (Request $request) 
    {
        if($request->ajax()) {
            $student = $this->getStudent($request->student_id)->first();
            $getMarks = Mark::join('units','units.unit_id','=','marks.unit_id')->where(['student_id'=>$request->student_id,'academic_id'=>$request->academic_id])->get();
            $units = UnitRegistered::where(['student_id'=>$request->student_id,'academic_id'=>$request->academic_id])->get();
            $session = $this->currentSession($getMarks->count()!=null?$getMarks[0]->level_id:$request->level_id);
            return view('students.reports.transcript', compact('session','getMarks','student','units'));
        }
    }
    public function currentSession($level_id)
    {
        return Program::join('levels','levels.level_id','=','programs.level_id')
                        ->join('semesters','semesters.id','=','levels.semester_id')
                        ->join('years','years.id','=','levels.year_id')
                        ->join('academics','academics.academic_id','=','programs.academic_id')
                        ->where('levels.level_id',$level_id)
                        ->first();
    }
}
