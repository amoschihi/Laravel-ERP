<div class="panel-body">
	<button class="btn btn-success pull-right" id="printSlip"><i class="fa fa-print"></i> Print Slip</button>

	<a href="{{ url('admin/fees_management/go/to/payment?student_adno='.$st->s_applicationno) }}" class="btn btn-info btn-flat pull-right" ><i class="fa fa-money fa-fw"></i> Fee Management</a>
	<div class="col-lg-12" id="printableSlip">
		<div class="row">
			<table class="table">
				<tr>
					<td class="text-bold">University: </td>
					<td>{{$app->appname}}</td>
					<td class="pull-right"><span class="text-bold">Admission No: </span>{{$st->s_applicationno}}</td>
				</tr>
				<tr>
					<td class="text-bold">Student: </td>
					<td>{{$st->s_surname.', '.$st->s_othernames}}</td>
					<td class="pull-right"><span class="text-bold">Printed:</span> {{date('M-D-Y h:i A')}}</td>
				</tr>
			</table>
		</div>
		<div class="row">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead> 
						<th class="info"></th>
						<th colspan="6" class="text-center">Fees Statement</th>
					</thead>
					<tr>
						<td class="info"></td>
						<td colspan="6"><b>Academic Year:</b> {{ $student->academic_name }}</td>
					</tr>
					<tr style="font-weight:bolder; background: #eee;">
						<th class="info"></th>
						<th>Date</th>
						<th>Ref No:</th>
						<th>Description</th>
						<th>Debit DR</th>
						<th>Credit CR</th>
						<th>Balance</th>
					</tr>
					@foreach ($transactions as $key => $t)
					<tr>
						<td class="info"></td>
						<td>{{ $t->transaction_date }}</td>
						<td></td>
						<td>{{ $t->description }}</td>
						<td></td>
						<td>{{ $t->amount_paid }}</td>
						<td>{{ $fees->fee_amount - $t->amount_paid }}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		<span id="dontprint">For the fees breakdown: <a href="{{ url('admin/fees_management/'.$st->student_id) }}">Click Here</a></span>
	</div>
</div>