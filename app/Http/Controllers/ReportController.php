<?php

namespace App\Http\Controllers;

use App\Academic;
use App\AdmissionType;
use App\Course;
use App\Level;
use App\Mode;
use App\Status;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
    //
	public function getStudentList()
	{
		$admissiontypes = AdmissionType::all();
		$courses = Course::orderBy('course_name')->get();
		$levels = Level::orderBy('level_name')->get();
		$academics = Academic::all();
		return view('reports.student',compact('admissiontypes','courses','levels','academics'));
	}

	public function info()
	{
		return Status::join('programs','programs.program_id','=','statuses.program_id')
		->join('students','students.student_id','=','statuses.student_id')
		->join('levels','levels.level_id','=','programs.level_id')
		->join('academics','academics.academic_id','=','programs.academic_id')
		->join('courses','courses.course_id','=','programs.course_id');
	}
	public function showStudentInfo(Request $request)
	{
		if($request->ajax())
		{
			if (!empty($request['chk'])) {
                # code...
				$classes = $this->info()
				->select(DB::raw('students.student_id,
					CONCAT(students.s_othernames," ",students.s_surname) as name,
					(CASE WHEN students.s_gender="M" THEN "Male" ELSE "Female" END) as sex,
					students.s_dob,
					courses.course_name,
					CONCAT(courses.course_name," / Start - ",programs.start_date," / ",programs.end_date) as program,
					levels.level_name
					'))
				->where('students.s_approved',1)
				->whereIn('programs.program_id',$request['chk'])
				->get();
				return view('reports.info',compact('classes'));
			}else {
				$classes = $this->info()
				->select(DB::raw('students.student_id,
					CONCAT(students.s_othernames," ",students.s_surname) as name,
					(CASE WHEN students.s_gender="M" THEN "Male" ELSE "Female" END) as sex,
					students.s_dob,
					levels.level_name,
					courses.course_name,
					CONCAT(courses.course_name," / Start - ",programs.start_date," / ",programs.end_date) as program'))
				->where(['programs.program_id'=>$request->class_id,'students.s_approved'=>1])
				->get();
				return view('reports.info',compact('classes'));
			}
		}
	}

	public function getFeeReport()
	{
		return view('reports.fee');
	}

	public function showFeeReport(Request $request)
	{
		if ($request->ajax()) {
			$fees = $this->feeInfo()
			->select('admins.name',
				'students.student_id',
				'students.s_othernames',
				'students.s_surname',
				'transactions.amount_paid',
				'transactions.transaction_date',
				'fee_finance_details.fee_amount as school_fee',
				'payments.payment_amount as student_fee')
			->whereDate('transactions.transaction_date','>=',$request->frm)
			->whereDate('transactions.transaction_date','<=',$request->to)
			->orderBy('students.student_id')
			->get();
			return view('reports.feeinfo',compact('fees'));
		}
	}

	public function feeInfo()
	{
		return Transaction::join('payments','payments.payment_id','=','transactions.payment_id')
		->join('students','students.student_id','=','transactions.student_id')
		->join('fee_finance_details','fee_finance_details.id','=','transactions.fee_finance_detail_id')
		->join('admins','admins.id','=','transactions.user_id');
	}
}
