@extends('layouts.header')
@section('title','Fees Management ')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-usd"> Fees</i></li>
	<li class="active"><i class="fa fa-wrench"> Manage</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		@if (session('feeCreated'))
		{{-- expr --}}
		<div class="alert alert-success" data-dismiss="alert">
			<span class="close">&times;</span>
			{{session('feeCreated')}}
		</div>
		@endif
		<div class="row">
			<div class="col-md-3">
				<form action="{{ route('student.payment') }}" method="GET">
					<input class="form-control" type="text" id="student_adno" name="student_adno" placeholder="Search by Admission No">
				</form>
			</div>
			<div class="col-md-3">Name: </div>
			<div class="col-md-3">Date: {{date('d-M-Y')}}</div>
			<div class="col-md-3">Receipt N<sup>o</sup>: <b></b></div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-condensed table-bordered">
				<tr>
					<th>Student Level</th>
					<th>School Fees(KSH)</th>
					<th>Amount(KSH)</th>
					<th>Paid(KSH)</th>
					<th>Balance(KSH)</th>
				</tr>
				<tr>
					<td>
						<select class="form-control" name="">
							<option>...................</option>
						</select>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon" title="Create Fees">
								<a id="create-fee"><i class="fa fa-plus"></i> <i class="fa fa-money"></i></a>
							</span>
							<input type="text" name="" class="form-control" value="" disabled="disabled">
						</div>
					</td>
					<td>
						<input type="text" name="" class="form-control" value="">
					</td>
					<td>
						<input type="text" name="" class="form-control" value="">
					</td>
					<td>
						<input type="text" name="" class="form-control" value="">
					</td>
				</tr>
				<tr>
					<td colspan="2">Remarks</td>
					<td colspan="4">Description</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="" class="form-control" value="">
					</td>
					<td colspan="4">
						<input type="text" class="form-control" name="" value="">
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		<a href="" class="btn btn-flat btn-primary">Save</a>
		<a href="" class="btn btn-flat btn-default">Reset</a>
	</div>
</div>
@endsection