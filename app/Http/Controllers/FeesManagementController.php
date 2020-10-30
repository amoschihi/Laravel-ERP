<?php

namespace App\Http\Controllers;

use App\Academic;
use App\Applicant;
use App\Course;
use App\FeeFinanceDetails;
use App\Level;
use App\Mode;
use App\Payment;
use App\Receipt;
use App\ReceiptDetail;
use App\Semester;
use App\Status;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeesManagementController extends Controller
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
        $levels = Level::all();
        $modes = Mode::all();
        $academics = Academic::all();
        return view('students.fees.fee', compact('levels','modes','academics'));
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
        $request['updated_by'] = Auth::user()->name;
        FeeFinanceDetails::create($request->all());
        $student = Applicant::find($request->student_id);
        return redirect('admin/fees_management/go/to/payment?student_adno='.$student->s_applicationno)->with('feeCreated','School Fee created successfully');
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
        $student = Applicant::find($id);
        return view('students.fees.student',compact('student'));
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

    public function createFee (Request $request) 
    {
        return $request->all();
    }

    public function student_status ($student_id) 
    {
        return Status::join('students','students.student_id','=','statuses.student_id')
                    ->join('programs','programs.program_id','=','statuses.program_id')
                    ->join('admission_types','admission_types.admissiontype_id','=','programs.admissiontype_id')
                    ->join('modes','modes.mode_id','=','admission_types.mode_id')
                    ->join('levels','levels.level_id','=','programs.level_id')
                    ->join('courses','courses.course_id','=','programs.course_id')
                    ->join('academics','academics.academic_id','=','programs.academic_id')
                    ->where('s_applicationno',$student_id);
    }
    public function school_fees ($level_id) 
    {
        return FeeFinanceDetails::where('level_id',$level_id);
    }
    public function read_studentFee ($student_id) 
    {
        return Payment::join('levels','levels.level_id','=','payments.level_id')
                        ->join('years','years.id','=','levels.year_id')
                        ->join('semesters','semesters.id','=','levels.semester_id')
                        ->where('payments.student_id',$student_id);
    }
    public function read_studentTransaction($student_id) 
    {
        return Transaction::join('admins','admins.id','=','transactions.user_id')
                            ->where('student_id',$student_id);
    }

    public function student_payment ($viewName, $student_id) 
    {
        $student = $this->student_status($student_id)->first();
        $programs = Course::where('course_id',$student->course_id)->get();
        $academics = Academic::where('academic_id',$student->academic_id)->get();
        $modes = Mode::where('mode_id',$student->mode_id)->get();
        $levels = Level::where('level_id',$student->level_id)->get();
        $semesters = Semester::where('id',$student->semester_id)->get();
        $schoolfees = $this->school_fees($student->level_id)->first();
        $receipt_id = ReceiptDetail::where('student_id',$student->student_id)->max('receipt_id');
        $student_fee = $this->read_studentFee($student->student_id)->get();
        $transactions = $this->read_studentTransaction($student->student_id)->get();;
        return view($viewName,compact('academics','modes','receipt_id','programs','levels','semesters','student','schoolfees','student_fee','transactions'))->with('student_id',$student_id);
    }
    public function payment (Request $request) 
    {
        $student_id = $request->student_adno;
       return $this->student_payment('students.fees.payment',$student_id);
    }

    public function save_payment (Request $request) 
    {
        $get_fee_id = FeeFinanceDetails::where([
            'level_id'=>$request->level_id
        ])->first();

        $request['fee_finance_detail_id'] = $get_fee_id->id;
        $payment = Payment::create($request->all());

        $transaction = Transaction::create([
            'transaction_date'=>$request->transaction_date,
            'payment_id'=>$payment->payment_id,
            'user_id'=>$request->user_id,
            'student_id'=>$request->student_id,
            'fee_finance_detail_id'=>$request->fee_finance_detail_id,
            'amount_paid'=>$request->payment_amount,
            'remark'=>$request->remark,
            'description'=>$request->description
        ]);

        ReceiptDetail::create([
            'receipt_id'=>Receipt::autoNumber(),
            'student_id'=>$request->student_id,
            'transaction_id'=>$transaction->transaction_id
        ]);
        return back();
    }

    private static function payment_id($student_id) 
    {
        return Payment::where('student_id',$student_id);
    }

    public function pay(Request $request) 
    {
        if($request->ajax()) 
        {
            $fee = Payment::where(['fee_finance_detail_id'=>$request->fee_finance_detail_id,'student_id'=>$request->student_id])->first();
            return $fee;
        }
    }

    public function extraPay(Request $request)
    {
        $request['payment_id'] = self::payment_id($request->student_id)->first()->payment_id;
        $request['amount_paid'] = $request->payment_amount;
        $request['description'] = $request->payment_breakdown;
        $request['remark'] = $request->payment_charges;
        $transaction = Transaction::create($request->all());

        if(@count($transaction)!=0) 
        {
            $transaction_id = $transaction->transaction_id;
            $student_id = $transaction->student_id;
            $receipt_id = Receipt::autoNumber();
            ReceiptDetail::create([
                'receipt_id'=>$receipt_id,
                'student_id'=>$student_id,
                'transaction_id'=>$transaction_id]);
            return back();
        }

    }

    public function printInvoice($receipt_id) 
    {
        $invoice = ReceiptDetail::join('receipts','receipts.receipt_id','=','receipt_details.receipt_id')
                    ->join('students','students.student_id','=','receipt_details.student_id')
                    ->join('transactions','transactions.transaction_id','=','receipt_details.transaction_id')
                    ->join('fee_finance_details','fee_finance_details.id','=','transactions.fee_finance_detail_id')
                    ->join('levels','levels.level_id','=','fee_finance_details.level_id')
                    ->join('admins','admins.id','=','transactions.user_id')
                    ->select('students.student_id',
                        'students.s_applicationno',
                        'students.s_surname',
                        'students.s_othernames',
                        'students.s_gender',
                        'fee_finance_details.fee_amount',
                        'transactions.transaction_date',
                        'transactions.fee_finance_detail_id',
                        'transactions.amount_paid',
                        'transactions.description',
                        'admins.name',
                        'receipts.receipt_id')
                    ->where('receipts.receipt_id',$receipt_id)
                    ->first();
        $totalPaid = Transaction::where('fee_finance_detail_id',$invoice->fee_finance_detail_id)->sum('amount_paid');
        return view('students.fees.invoice.invoice',compact('invoice','totalPaid'));
    }

}
