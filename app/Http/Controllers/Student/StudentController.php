<?php

namespace App\Http\Controllers\Student;

use App\Unit;
use App\Status;
use App\Comment;
use App\Academic;
use App\Applicant;
use App\FileUpload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }
    public function newsIndex()
    {
    	$inbox = Comment::where('user_id',Auth::id())->get();
    	return view('students.portal.news',['inbox'=>$inbox]);
    }
    public function detailsIndex()
    {
    	$student = SELF::studentInfo();
    	return view('students.portal.details',compact('student'));
    }
    public function detailsEdit($id)
    {
    	$student = Applicant::findOrFail($id);
    	return view('students.portal.detailsEdit',compact('student'));
    }
    public function detailsUpdate(Request $request, $id)
    {
    	$student = Applicant::findOrFail($id);
    	if($request->s_photo!=null) {
    		$photo = FileUpload::photo($request,'s_photo','student',$student->s_photo);
    	}else {
    		$photo = $student->s_photo;
    	}
    	$student->update([
    		's_surname'=>$request->s_surname,
    		's_othernames'=>$request->s_othernames,
    		's_contacts'=>$request->s_contacts,
    		's_dob'=>$request->s_dob,
    		's_denomination'=>$request->s_denomination,
    		's_homeaddress'=>$request->s_homeaddress,
    		's_district'=>$request->s_district,
    		's_country'=>$request->s_country,
    		's_gender'=>$request->s_gender,
    		's_photo'=>$photo
    	]);
    	return back()->with('response','Details updated successfully!');
    }
    public function unitsIndex()
    {
        $units = Unit::where([
                        'level_id'=>self::studentInfo()->level_id,
                        'course_id'=>self::studentInfo()->course_id])
                        ->orderBy('unit_code')
                        ->get();
    	return view('students.portal.units',['units'=>$units]);
    }
    public function transcriptsIndex()
    {
        $academics = Academic::all();
        $student = $this->studentInfo();
        $controller = new \App\Http\Controllers\StudentController();
        $currentMarks = $controller->currentMarks($student->student_id,$student->level_id)->get();
        // dd($mark);
    	return view('students.portal.transcripts', compact('academics', 'currentMarks','student'));
    }
    public function resultsIndex()
    {
    	return view('students.portal.results');
    }
    public function programmes()
    {
    	return view('students.portal.programmes');
    }
    public function feesStructure()
    {
    	return view('students.portal.fees-structure');
    }
    public function feesStatus()
    {
    	return view('students.portal.fees-status');
    }
    public function receipt()
    {
    	return view('students.portal.receipt');
    }

    public static function studentInfo()
    {
        return Status::join('students','students.student_id','=','statuses.student_id')
                        ->join('parents','parents.parent_id','=','students.parent_id')
                        ->join('programs','programs.program_id','=','statuses.program_id')
                        ->join('levels','levels.level_id','=','programs.level_id')
                        ->join('courses','courses.course_id','=','programs.course_id')
                        ->join('admission_types','admission_types.admissiontype_id','=','programs.admissiontype_id')
                        ->join('modes','modes.mode_id','=','admission_types.mode_id')
                        ->join('academics','academics.academic_id','=','programs.academic_id')
                        ->join('years','years.id','=','levels.year_id')
                        ->join('semesters','semesters.id','=','levels.semester_id')
                        ->join('departments','departments.department_id','=','courses.department_id')
                        ->join('schools','schools.school_id','=','departments.school_id')
                        ->join('colleges','colleges.college_id','=','schools.college_id')
                        ->where(['students.s_emailaddress'=>Auth::user()->email,'students.s_approved'=>1])
                        ->first();
    }
}
