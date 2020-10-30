<?php

namespace App\Http\Controllers;

use App\Academic;
use App\AdmissionType;
use App\College;
use App\Course;
use App\Department;
use App\Displinary;
use App\Level;
use App\Mark;
use App\Mode;
use App\Program;
use App\School;
use App\Semester;
use App\Unit;
use App\UnitRegistered;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('instructor'); //Revisit code
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $units = Unit::all();
        $years = Year::all();
        $colleges = College::all();
        $courses = DB::table('courses')->orderBy('course_name')->get();
        $schools = School::all();
        $departments = Department::all();
        $modes = Mode::all();
        $levels = Level::orderBy('level_name')->get();
        $semesters = Semester::all();
        $academics = Academic::all();
        $admissiontypes = AdmissionType::all();
        return view('academics.managecourse',compact('years','units','colleges','courses','schools','departments','modes','levels','semesters','academics','admissiontypes'));
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
        if($request->ajax()) 
        {  
            $request['course_id'] = $request->course;
            //check if program already exists
            $it_exists = Program::where([
                            'academic_id'=>$request->academic_id,
                            'level_id'=>$request->level_id,
                            'course_id'=>$request->course_id,
                            'admissiontype_id'=>$request->admissiontype_id
                        ])->first();
            if(@count($it_exists) > 0) 
            {
                return response(['msg' => 'Program already exists']);
            }

            return response(Program::create($request->all()));
        }
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
    public function registerunit (Request $request) 
    {
        $std = ($request->m_assignment+$request->m_cat)/2;
        $total_marks = round($std+$request->m_exam);
        switch ($total_marks) {
            case $total_marks>=70 && $total_marks<=100:
                $grade = 'A'; $pt = 5;
                break;
            case $total_marks>=60 && $total_marks<=69:
                $grade = 'B'; $pt = 4;
                break;
            case $total_marks>=50 && $total_marks<=59:
                $grade = 'C'; $pt = 3;
                break;
            case $total_marks>=40 && $total_marks<=49:
                $grade = 'D'; $pt = 2;
                break;
            case $total_marks<40:
                $grade = 'F'; $pt = 1;
                break;
            default:
                $grade = '-'; $pt = 0;
                break;
        }
        $units = array(
            'student_id'=>$request->student_id,
            'unit_id'=>$request->unit_id,
            'academic_id'=>$request->academic_id,
            'course_id'=>$request->course_id,
            'college_id'=>$request->college_id,
            'level_id'=>$request->level_id,
            'u_cost'=>$request->u_cost,
            'term_id'=>$request->term_id,
            'lecturer_id'=>$request->lecturer_id,
            // 'u_mode'=>$request->u_mode,
        );
        $marks = array(
            'student_id'=>$request->student_id,
            'unit_id'=>$request->unit_id,
            'academic_id'=>$request->academic_id,
            'level_id'=>$request->level_id,
            'm_assignment'=>$request->m_assignment,
            'm_cat'=>$request->m_cat,
            'm_exam'=>$request->m_exam,
            'm_total_marks'=>$total_marks,
            'm_grade'=>$grade,
            'm_gp'=>$pt
        );

        Mark::create($marks);
        UnitRegistered::updateOrCreate($units);

        return redirect('admin/students/'.$request->student_id)->with('info','Unit Enrolled Successfully!');

    }
    public function newincident (Request $request) 
    {
        Displinary::create($request->all());
        return redirect('admin/students/'.$request->student_id)->with('info','Incident created Successfully!');
    }

// Course Management
    public function course (Request $request) 
    {
        if($request->ajax()) {
            return response(Course::create($request->all()));
        }
    }
    public function college (Request $request) 
    {
        if($request->ajax()) {
            return response(College::create($request->all()));
        }
    }
    public function school (Request $request) 
    {
        if($request->ajax()) {
            return response(School::create($request->all()));
        }
    }
    public function department (Request $request) 
    {
        if($request->ajax()) {
            return response(Department::create($request->all()));
        }
    }
    public function mode (Request $request) 
    {
        if($request->ajax()) {
            return response(Mode::create($request->all()));
        }
    }
    public function academic (Request $request) 
    {
        if($request->ajax()) {
            return response(Academic::create($request->all()));
        }
    }  

    public function year (Request $request) 
    {
        if($request->ajax()) {
            return response(Year::create($request->all()));
        }
    } 

    public function semester (Request $request) 
    {
        if($request->ajax()) {
            return response(Semester::create($request->all()));
        }
    }
    public function level (Request $request) 
    {
        if($request->ajax()) {
            $checkLevel = Level::where('level_name',$request->level_name)
                                ->first();
            if(@count($checkLevel)!=0) 
            {
                return response(array('msg'=>'Level is already created'));
            }
            return response(Level::create($request->all()));
        }
    }
    public function showDepartment (Request $request) 
    {
        if($request->ajax()) {
            return response(Department::where('school_id',$request->school_id)->get());
        }
    }

    public function showCourse (Request $request) 
    {
        if($request->ajax()) {
            return response(Course::where('department_id',$request->department_id)->get());
        }
    }
    public function showUnits (Request $request) 
    {
        if($request->ajax()) {
            if($request->has('level_id'))
            {
                return response(Unit::where(['course_id'=>$request->course_id,'level_id'=>$request->level_id])->get());
            }
            return response(Unit::where('course_id',$request->course_id)->get());
        }
    }
    public function admtype (Request $request) 
    {
        if($request->ajax()) {
            return response(AdmissionType::create($request->all()));
        }
    }
    public function unit (Request $request) 
    {
        if($request->ajax()) {
            return response(Unit::create($request->all()));
        }
    }
    public function showClassInformation(Request $request)
    {
        if($request->level_id == "") {
            $criteria = array(
                'courses.course_id'=>$request->course,
                'admission_types.admissiontype_id'=>$request->admissiontype_id
            );
        }elseif($request->level_id !="" && 
                $request->course != "" && 
                $request->academic_id != "" && 
                $request->admissiontype_id !="") 
        {
            $criteria = array(
                'levels.level_id'=>$request->level_id,
                'courses.course_id'=>$request->course,
                'academics.academic_id'=>$request->academic_id,
                'admission_types.admissiontype_id'=>$request->admissiontype_id
            );
        }
        $classes = $this->classInformation($criteria)->get();
        return view('academics.classes.classinfo',compact('classes'));
    } 

    public function classInformation($criteria)
    {
        return Program::join('levels','levels.level_id','=','programs.level_id')
                                ->join('years','years.id','=','levels.year_id')
                                ->join('academics','academics.academic_id','=','programs.academic_id')
                                ->join('semesters','semesters.id','=','levels.semester_id')
                                ->join('courses','courses.course_id','=','programs.course_id')
                                ->join('admission_types','admission_types.admissiontype_id','=','programs.admissiontype_id')
                                ->join('modes','modes.mode_id','=','admission_types.mode_id')
                                ->where($criteria)
                                ->orderBy('courses.course_id','DESC');
    }

    public function editClass(Request $request)
    {
        if($request->ajax()) 
        {
            return response(Program::find($request->program_id));
        }
    }

    public function updateClassInfo(Request $request)
    {
        if($request->ajax())
        {
            return response(Program::updateOrCreate(['program_id'=>$request->program_id], $request->all()));
        }
    }
    public function deleteClass(Request $request)

    {
        if($request->ajax())
        {
            Program::destroy($request->program_id);
        }
    }
}
