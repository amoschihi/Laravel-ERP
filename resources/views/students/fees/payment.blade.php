@extends('layouts.header')
@section('title','Fees - '.$student->s_othernames)
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-usd"> Fees</i></li>
	<li class="active"><i class="fa fa-user"> {{ $student->s_othernames }}</i></li>
</ol>
@endsection
@section('content')
@include('students.fees.popups.create-fee')
<div class="panel panel-info">
	<div class="panel-heading">
		@if (session('feeCreated'))
		@component('components.alert')
		    @slot('type')
		        success
		    @endslot
			{{session('feeCreated')}}
		@endcomponent
		@endif
		<div class="row">
			<div class="col-md-3">
				<form action="{{ route('student.payment') }}" method="GET">
					<input class="form-control" type="text" value="{{ $student_id }}" id="student_adno" name="student_adno" placeholder="Student Admission Number">
				</form>
			</div>
			<div class="col-md-3">Name: <b class="text-uppercase">{{$student->s_surname. ', '.$student->s_othernames}}</b></div>
			<div class="col-md-3">Date: <b>{{date('d-M-Y')}}</b></div>
			<div class="col-md-3">Receipt N<sup>o</sup>: <b>{{ sprintf('%05d',$receipt_id)}}</b></div>
		</div>
	</div>
	<form action="{{ count($student_fee) != 0 ? route('extra.payment') : route('save.payment') }}" method="POST" id="frmPayment">
		{{csrf_field()}}
		<div class="panel-body">
			<div class="text-center text-danger"><caption>Program: {{$student->course_name}} / Academic Year: {{$student->academic_name}}</caption></div>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-condensed table-bordered">
					<tr>
						<th>Student Level</th>
						{{-- <th>Semester</th> --}}
						<th>School Fees</th>
						<th>Amount Paid(KSH)</th>
						<th>Balance(KSH)</th>
					</tr>
					<tr>
						<td>
							<input type="hidden" name="student_id" value="{{$student->student_id}}">
							<input type="hidden" name="payment_date" value="{{date('Y-m-d H:i:s A')}}">
							<input type="hidden" name="transaction_date" value="{{ date('Y-m-d H:i:s') }}">
							<input id="" type="hidden" name="fee_finance_detail_id" value="{{ $schoolfees->id or null }}">
							<input type="hidden" name="user_id" value="{{ Auth::id() }}">
							<select data-toggle="tooltip" title="{{ $student->level_name }}" name="level_id" id="level_id" class="form-control lid d">
								<option>.....................</option>
								@foreach ($levels as $e => $l)
								<option value="{{$l->level_id}}" {{$l->level_id==$student->level_id ? 'selected' : null}}>{{$l->level_name}}</option>
								@endforeach
							</select>
						</td>
						{{-- <td>
							<select name="semester_id" class="form-control sid d" id="semester_id">
								<option>.....................</option>
								@foreach ($semesters as $s)
								<option value="{{$s->semester}}" {{$s->semester==$student->semester_id ? 'selected' : null }}>{{$s->semester}}</option>
								@endforeach
							</select>
						</td> --}}
						<td>
							<div class="input-group">
								<span class="input-group-addon" title="Create Fees">
									<a id="create-fee"><i class="fa fa-plus"></i> KSH</i></a>
								</span>
								<input type="text" id="fee" class="form-control" value="{{$schoolfees->fee_amount or null}}" disabled="disabled">
							</div>
						</td>
						<td>
							<input type="text" name="payment_amount" id="fee_amount" class="form-control famt" value="" required="">
						</td>
						<td>
							<input type="text" name="amount_due" id="balance" class="form-control" value="" disabled>
						</td>
					</tr>
					<tr>
						<th colspan="2">Remarks</th>
						<th colspan="4">Description</th>
					</tr>
					<tr>
						<td colspan="2">
							<input type="text" name="remark" class="form-control" value="">
						</td>
						<td colspan="4">
							<input type="text" class="form-control" name="description" value="">
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-flat btn-primary" id="save-payment">{{ count($student_fee) == 0 ? 'Pay' : 'Extra Pay' }}</button>
			<button type="reset" class="btn btn-flat btn-default">Reset</button>
		</div>
	</form>
</div>
@if(count($student_fee) != 0)
@include('students.fees.lists.student-fee-list')
<input type="hidden" value="0" id="disabled">
@endif
@endsection
@section('script')
@include('students.fees.scripts.calculate')
@include('students.fees.scripts.payment')
@endsection