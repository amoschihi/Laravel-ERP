@extends('layouts.header')
@section('title','Fees Management ')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
  <li><i class="fa fa-home"> Home</i></li>
  <li><i class="fa fa-usd"> Fees</i></li>
  <li><i class="fa fa-wrench"> Manage</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		Fee Management ~ {{$student->s_applicationno}}: {{$student->s_surname.', '.$student->s_othernames}}
	</div>
	<div class="panel-body">
		<a class="btn btn-flat btn-success pull-right" href="">Print Statement</a>

		<div class="panel panel-default">
			<div class="panel-heading">
				<table class="table table-bordered">
					<thead>
						<tr class="info">
							<th colspan="2">Academic Year</th>
							<th>Unit</th>
							<th>Tuition</th>
							<th>Accomodation</th>
							<th>Other</th>
							<th style="background: #eee">Required</th>
							<th>Self</th>
							<th>Support</th>
							<th>Total</th>
							<th style="background: #eee">Balance</th>
							<th>Prepaid</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></i></td>
							<td>2013/2014 Trisemester I</td>
							<td>4</td>
							<td>0.00</td>
							<td>0.00</td>
							<td>20930.00</td>
							<td style="background: #eee">21940.00</td>
							<td>21940.00</td>
							<td>0.00</td>
							<td>21940.00</td>
							<td style="background: #eee">0.00</td>
							<td>0.00</td>
						</tr>
						<tr>
							<td></i></td>
							<td>2016/2017 Trisemester II</td>
							<td>4</td>
							<td>0.00</td>
							<td>0.00</td>
							<td>37230.00</td>
							<td style="background: #eee">37230.00</td>
							<td>37230.00</td>
							<td>0.00</td>
							<td>37230.00</td>
							<td style="background: #eee">0.00</td>
							<td>0.00</td>
						</tr>
						<tr style="background: #ddd">
							<td><i class="fa fa-edit"></i></td>
							<td>2014/2015 Trisemester III</td>
							<td>4</td>
							<td>0.00</td>
							<td>0.00</td>
							<td>41930.00</td>
							<td style="background: #eee">41930.00</td>
							<td>41930.00</td>
							<td>0.00</td>
							<td>41930.00</td>
							<td style="background: #eee">0.00</td>
							<td>0.00</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr style="background: #acf">
							<th colspan="2">2016/2017 Trisemester II Active</th>
							<th colspan="2">Payment Breakdown</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Outstanding Balance</td>
							<td><input type="text" name="" class="form-control" value="0.00"></td>
							<td>SELF</td>
							<td>26930.00</td>
						</tr>
						<tr>
							<td>Previous prepayments</td>
							<td><input type="text" name="" class="form-control" value="0.00"></td></td>
							<td>HELB</td>
							<td>0.00</td>
						</tr>
						<tr>
							<td>Accomodations/meals</td>
							<td><input type="text" name="" class="form-control" value="0.00"></td></td>
							<td>WORKSTUDY</td>
							<td>0.00</td>
						</tr>
						<tr>
							<td>Standing/Other Charges</td>
							<td><input type="text" name="" class="form-control" value="41930.00"></td>
							<td>C.D.F</td>
							<td>0.00</td>
						</tr>
						<tr>
							<td rowspan="2"></td>
							<td rowspan="2"><button class="btn btn-flat btn-success">Update current changes</button></td>
							<td>BURSARY</td>
							<td>15000.00</td>
						</tr>
						<tr>
							<td>SUBTOTAL</td>
							<td>41930.00</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered">
					<tr>
						<td><input type="" name="" class="form-control" placeholder="Transaction Date"></td>
						<td>
							<select class="form-control">
								<option>FEES PAYABLE</option>
							</select>
						</td>
						<td><input type="" name="" class="form-control" placeholder="Enter Amount"></td>
						<td>
							<select class="form-control">
								<option>CASH</option>
							</select>
						</td>
						<td><input type="" name="" class="form-control" placeholder="More details e.g Slip No, Bank No, Cheque No e.t.c"></td>
					</tr>
					<tr style="background: #acf">
						<td colspan="3"></td>
						<td colspan="2"><button class="btn btn-flat btn-default pull-right">POST NEW TRANSACTION</button></td>
					</tr>
				</table>
				<table class="table table-bordered">
					<tr style="background: #aaf">
						<th>Date</th>
						<th>Receipt No</th>
						<th>Description</th>
						<th>Amount</th>
						<th></th>
					</tr>
					<tr>
						<td>07/02/2015</td>
						<td>1425455112</td>
						<td>BANK: EQUITY AGENT 7011251 (FEES)</td>
						<td>10000.00</td>
						<td><i class="fa fa-times btn-xs"></i></td>
					</tr>
					<tr>
						<td>10/03/2001</td>
						<td>1400254122</td>
						<td>CASH: MPESA TRANSACTION ID MXFEI393SD (FEES)</td>
						<td>16000.00</td>
						<td><i class="fa fa-times btn-xs"></i></td>
					</tr>
				</table>
			</div>
		</div>


	</div>
</div>
@endsection