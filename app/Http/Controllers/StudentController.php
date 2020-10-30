<?php

namespace App\Http\Controllers;

use App\Academic;
use App\AdmissionType;
use App\Applicant;
use App\College;
use App\Course;
use App\Displinary;
use App\FeeFinanceDetails;
use App\FileUpload;
use App\Lecturer;
use App\Level;
use App\Mark;
use App\Mode;
use App\Par;
use App\Status;
use App\Term;
use App\Transaction;
use App\Unit;
use App\UnitRegistered;
use App\User;
use Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:admin');
      $this->middleware('instructor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $levels = Level::orderBy('level_name')->get();
      $courses = DB::table('courses')->orderBy('course_name')->get();
      $academics = Academic::all();
      $admissiontypes = AdmissionType::all();
      $students = Applicant::join('statuses','statuses.student_id','=','students.student_id')
      ->join('programs','programs.program_id','=','statuses.program_id')
      ->join('levels','levels.level_id','=','programs.level_id')
      ->join('courses','courses.course_id','=','programs.course_id')
      ->join('departments','departments.department_id','=','courses.department_id')
      ->join('schools','schools.school_id','=','departments.school_id')
      ->join('colleges','colleges.college_id','=','schools.college_id')
      ->where('s_approved',1)
      ->get();
      return view('students.student',compact('students','levels','courses','academics','admissiontypes'));
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
      $students = Applicant::join('statuses','statuses.student_id','=','students.student_id')
      ->join('programs','programs.program_id','=','statuses.program_id')
      ->join('levels','levels.level_id','=','programs.level_id')
      ->join('courses','courses.course_id','=','programs.course_id')
      ->whereIn('students.student_id',explode(',',$ids))
      ->get();
      if(@count($students)==1) {
        foreach ($students as $student) {
                # code...
          $data = array(
            'course_name' => $student->course_name,
            'course_length'=>$student->course_length,
            'ids'=>$ids,
            'surname'=>$student->s_surname,
            'othernames'=>$student->s_othernames
          );
        }
        return $data;
      }else {
        $academics = Academic::all();
        return view('applicants.popups.register-multiple',compact('academics','students','ids'));
      }
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
      $student = Applicant::find($request->student_id);
      $parent = Par::find($student->parent_id);
      $parent->p_contacts = $request->p_contacts;
      $parent->save();
      $student->s_contacts = $request->s_contacts;
      $student->s_homeaddress = $request->s_homeaddress;
      $student->s_country = $request->s_country;
      $student->save();

      return redirect('admin/students/'.$request->student_id.'/edit')->with('info','Records updated successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
      $levels = Level::all();
      $academics = Academic::all();
      $lecturers = Lecturer::all();
      $courses = Course::all();
      $colleges = College::all();
      $displines = Displinary::where('student_id',$id)->get();
      $fees = Transaction::join('fee_finance_details','transactions.fee_finance_detail_id','=','fee_finance_details.id')
                          ->join('payments','payments.payment_id','=','transactions.payment_id')
                          ->where('transactions.student_id',$id)
                          ->first();
      $transactions = Transaction::where('student_id',$id)->get();
      $terms = Term::all();
      $units = UnitRegistered::all()->where('student_id',$id);
      $st = Applicant::find($id);
      $student = Applicant::join('statuses','statuses.student_id','=','students.student_id')
                          ->join('programs','programs.program_id','=','statuses.program_id')
                          ->join('levels','levels.level_id','=','programs.level_id')
                          ->join('years','years.id','=','levels.year_id')
                          ->join('semesters','semesters.id','=','levels.semester_id')
                          ->join('admission_types','admission_types.admissiontype_id','=','programs.admissiontype_id')
                          ->join('courses','courses.course_id','=','programs.course_id')
                          ->join('departments','departments.department_id','=','courses.department_id')
                          ->join('schools','schools.school_id','=','departments.school_id')
                          ->join('colleges','colleges.college_id','=','schools.college_id')
                          ->join('academics','academics.academic_id','=','programs.academic_id')
                          ->where('students.student_id',$id)
                          ->first();
      $studentLevelId = $student->level_id;
      if($request->level_id){
        $currentMarks = $this->currentMarks($id,$request->level_id)->get(); 
      }else {
        $currentMarks = $this->currentMarks($id,$student->level_id)->get();
      }
      $enrolledUnits = Mark::where('student_id',$student->student_id)->pluck('unit_id');
      $allunits = Unit::where(['course_id'=>$student->course_id,'level_id'=>$student->level_id])->whereNotIn('unit_id',$enrolledUnits)->get();
      $studentUnits = Unit::where(['course_id'=>$student->course_id,'level_id'=>$student->level_id])->get();
      $chart = Charts::database($currentMarks, 'bar', 'highcharts')
      ->title("Academic Scaling: ".$st->s_othernames.", ".$st->s_surname ." ~ " . $st->s_applicationno)
      ->elementLabel("Grade")
      ->dimensions(950, 500)
      ->responsive(false)
      ->groupBy('m_grade');
      return view('students.profile',compact('studentLevelId','currentMarks','studentUnits','fees','displines','allunits','levels','academics','lecturers','courses','colleges','terms','student','st','units','chart','transactions'));
    }
    public function currentMarks($student,$level)
    {
      return Mark::join('levels','levels.level_id','=','marks.level_id')
                              ->join('years','years.id','=','levels.year_id')
                              ->join('semesters','semesters.id','=','levels.semester_id')
                              ->where(['marks.student_id'=>$student,'marks.level_id'=>$level]);
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
      $student = Applicant::find($id);
      return view('students.edit',compact('student'));
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
          's_approved' => 1,
          's_applicationno' => $request->registration_no[$i],
          's_surname' => $request->s_surname[$i],
          's_othernames' => $request->s_othernames[$i],
          's_admdate' => $request->admission_date[$i],
          'remarks' => $request->remarks[$i],
        ]);
      }
      return redirect('admin/applicants')->with('info','Applicant(s) Approved Successfully!');
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
      $student = Applicant::find($id);
      $student->delete();
      return redirect('admin/students')->with('info','Student deleted Successfully!');

    }
    public function uploadPhoto (Request $request) 
    {
      $getStudent = Applicant::find($request->student_id);
      Storage::disk('public')->delete('students/'.$getStudent->s_photo);
      $getStudent->s_photo = FileUpload::photo($request,'student_photo','student');

      if($getStudent->save()) {
        return redirect('admin/students/'.$request->student_id.'#uploadPhoto');
      }else {
        return redirect('admin/students/'.$request->student_id.'#uploadPhoto')->with('uploadError','Error Uploading the Photo');
      }

      return redirect('admin/students/'.$request->student_id.'#uploadPhoto')->with('nofile','Couldn\'t find a file to upload');
    }
    public function editSelected (Request $request) 
    {
      return $request->all();
    }

    public function updateStatus(Request $request)
    {
      Status::whereIn('student_id',explode(',', $request->ids))->update(['program_id'=>$request->program_id]);
      return response()->json(['success'=>true]);
    }
  }
