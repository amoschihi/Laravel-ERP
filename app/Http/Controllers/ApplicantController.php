<?php

namespace App\Http\Controllers;

use App\Academic;
use App\AdmissionType;
use App\Agent;
use App\Applicant;
use App\College;
use App\Course;
use App\Department;
use App\FileUpload;
use App\Level;
use App\MajorG;
use App\Menu;
use App\Mode;
use Notification;
use App\Notifications\EmailNotification;
use App\Par;
use App\School;
use App\Status;
use App\Unit;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicantController extends Controller
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
        $academics = Academic::all();
        $colleges = College::all();
        $levels = Level::all();
        $units = Unit::all();
        $departments = Department::all();
        $courses = Course::all();
        $schools = School::all();
        $admissiontypes = AdmissionType::all();
        $modes = Mode::all();
        $applicants = Applicant::join('statuses','statuses.student_id','=','students.student_id')
        ->join('programs','programs.program_id','=','statuses.program_id')
        ->join('levels','levels.level_id','=','programs.level_id')
        ->join('courses','courses.course_id','=','programs.course_id')
        ->join('departments','departments.department_id','=','courses.department_id')
        ->join('schools','schools.school_id','=','departments.school_id')
        ->join('colleges','colleges.college_id','=','schools.college_id')
        ->whereNotIn('students.s_approved',[1])
        ->get();
        $agents = Agent::all();
        $menus = Menu::all();
        return view('applicants.applicants',compact('academics','schools','colleges','departments','courses','admissiontypes','modes','levels','units','menus','applicants','agents'));
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
        $applicants = Applicant::whereIn('student_id',explode(',',$ids))->get();
        return view('applicants.editApplicants',compact('applicants','ids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parent = new Par();
        $parent->parentfullname = $request->parentfullname;
        $parent->p_contacts = $request->p_contacts;

        if($parent->save()) 
        {
            $applicant = new Applicant();
            $applicant->s_othernames = $request->s_othernames;
            $applicant->s_surname = $request->s_surname;
            $applicant->s_gender = $request->s_gender;
            $applicant->s_contacts = $request->s_contacts;
            $applicant->s_dob = $request->s_dob;
            $applicant->s_nationalid = $request->s_nationalid;
            $applicant->s_denomination = $request->s_denomination;
            $applicant->s_admdate = $request->s_admdate;
            $applicant->s_graddate = $request->s_graddate;
            $applicant->s_homeaddress = $request->s_homeaddress;
            $applicant->s_district = $request->s_district;
            $applicant->s_area = $request->s_area;
            $applicant->s_country = $request->s_country;
            $applicant->s_photo = FileUpload::photo($request,'s_photo','student');
            $applicant->parent_id = $parent->parent_id;
            $applicant->agent_id = $request->agent_id;
            $applicant->user_id = $request->user_id;
            // $applicant->s_admissiontype = $request->s_admissiontype;
            $applicant->s_emailaddress = $request->s_emailaddress;
            $applicant->s_applicationno = Str::upper(Str::random(4));
            $applicant->date_applied = $request->date_applied;
            if($applicant->save()) 
            {
                Status::create([
                    'student_id'=>$applicant->student_id,
                    'program_id'=>$request->program_id
                ]); 
                return redirect('admin/applicants')->with('info','New applicant saved successfully');
            }else {
                return redirect('admin/applicants')->with('error','Error creating New Applicant');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
        dd('am ready to show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
        dd('am ready to edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ids = explode(',',$id);
        for ($i=0; $i<count($ids); $i++) {
            DB::table('students')
            ->where('student_id',$ids[$i])
            ->update([
                's_surname' => $request->s_surname[$i],
                's_othernames' => $request->s_othernames[$i],
                's_contacts' => $request->s_contacts[$i],
                's_homeaddress' => $request->s_homeaddress[$i],
                's_emailaddress' => $request->s_emailaddress[$i]
            ]);
        }
        return redirect('admin/applicants')->with('info','Applicant(s) updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function delete (Request $request) 
    {
        $ids = $request->ids;
        Applicant::whereIn('student_id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Applicant(s) Deleted successfully."]);
    }
    public function register (Request $request) 
    {
        $applicant = Applicant::find($request->ids);
        Applicant::where('student_id',$request->ids)
        ->update([
            's_approved' => 1,
            's_surname' => $request->s_surname,
            's_othernames' => $request->s_othernames,
            's_applicationno' => $request->s_applicationno,
            's_admdate' => $request->s_admdate,
            's_graddate' => $request->s_graddate,
            'remarks' => $request->remarks,
        ]);
        // Send a SMS to the applicant
        $message = $this->message($applicant->s_gender,$applicant->s_surname);
        $this->SMSNotify('254'.substr($applicant->s_contacts,1),$message);

        //Send an email to the applicant
        $applicant->email = $applicant->s_emailaddress;
        $applicant->notify(new EmailNotification($applicant->s_surname,$applicant->s_gender,$request->s_applicationno));

        $data = array(
            'name'=>$request->s_surname.' '.$request->s_othernames,
            'adm'=>$request->s_applicationno
        );
        return $data;
    }

    public function reject (Request $request) 
    {

        if($request->param1==1) {
            $this->rejectOrUndo($request->param1);
        }else {
            for ($i=0; $i < @count($request->param1); $i++) { 
                $this->rejectOrUndo($request->param1);
            }
        }
    }

    public function rejectOrUndo($request) {
        $applicant = Applicant::find($request);
        if($applicant->s_approved==0) {
            Applicant::whereIn('student_id',explode(",",$request))
            ->update(['s_approved' => 2]);
            return '2';
        }elseif($applicant->s_approved==1) {
            Applicant::whereIn('student_id',explode(",",$request))
            ->update(['s_approved' => 0]);
            return '0';
        }elseif($applicant->s_approved==2) {
            Applicant::whereIn('student_id',explode(",",$request))
            ->update(['s_approved' => 0]);
            return '0';
        }else {
            Applicant::whereIn('student_id',explode(",",$request)) 
            ->update(['s_approved' => 0]);
            return '0';
        }
    }
    public function approve (Request $request) 
    {
        for ($i=0; $i < count($request->param1); $i++) { 
            $applicant = Applicant::find($request->param1);
            Applicant::whereIn('student_id',explode(",",$request->param1))
            ->update(['s_approved' => 1,'date_approved'=>date('Y-m-d H:i:s')]);
            return '1';
        }
    }

    /**
    * 
    *On change fields for Applicants
    * 
    */
    public function departments (Request $request) 
    {
        $departments = Department::all()->where('school_id',$request->school_id);
        if(count($departments)>0) {
            $new_departments = '';
            foreach($departments as $department) {
                $new_departments .= '<option class="departments" value="'.$department->department_id.'">'.$department->department_name.'</option>';
            }
            return json_encode($new_departments);
        }else {
            $new_departments = '<option selected disabled>Select Department</option>';
            return json_encode($new_departments);
        }
    }
    public function courses (Request $request) 
    {
        $courses = Course::all()->where('department_id',$request->department_id);
        if(count($courses)>0) {
            $new_courses = '';
            foreach($courses as $course) {
                $new_courses .= '<option class="courses" value="'.$course->course_id.'">'.$course->course_name.'</option>';
            }
            return json_encode($new_courses);
        }else {
            $new_courses = '<option selected disabled>Select Course</option>';
            return json_encode($new_courses);
        }
    }

    public function SMSNotify($phone,$message)
    {
       $postData = [
            'action' => 'compose',
            'username' => 'Amos',
            'api_key' => 'CJxML5mvUoXBKiEZkYtE6hq3CFLzMqhm8RrQTpHHaWIaYQR11e',
            'sender' => 'SMARTLINK',
            'to' => $phone,
            'message' => $message,
            'msgtype' => 5,
            'dlr' => 0,
        ];

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://www.sms.movesms.co.ke/API/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData

        ));

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            $data = array(
                'name' => 'Error!',
                'adm' => curl_error($ch)
            );
            return $data;
        }

        curl_close($ch); 
    }
    public function message($g,$name)
    {
        $title = $g=='F'?'Ms. ':'Mr. ';
        return "Congratulations! ".$title.$name.", Your application form has been processed and you have been approved successfully. We have sent more details to your email.";
    }

    public function generate(Request $request) {
        $str = $request->course_name;
        preg_match_all('/(?<=\s|^)[a-z]/i', $str, $matches);

        $result = strtoupper(implode('', $matches[0]));
        $admNo = substr_replace($result, "/", 3, 0)."/".sprintf("%03d",$request->id)."/".date("Y");

        //check if such admission number exist
        $count = Applicant::where('s_applicationno',$admNo)->count();
        if($count > 0) {
            $admNo = substr_replace($result, "/", 3, 0)."/".sprintf("%03d",($request->id+1))."/".date("Y");
        }
        return $admNo;

    }
}
