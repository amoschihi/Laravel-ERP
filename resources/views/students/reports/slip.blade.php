
<style type="text/css">
.body {padding: 0;margin: 0;width: 100%;background: #fff;font-family: Arial, 'San Serif','Time News Roman';font-size: 10pt;}
#container { width: 100%;margin: 0 auto; }
.length-limit {min-height: auto; max-height: auto;}
</style>
<a data-toggle="tooltip" data-placement="bottom" title="Print Result" class="btn btn-flat btn-primary pull-right" id="printButton"><i class="fa fa-print"></i> </a>
<div class="printableArea body">
	<div id="container">
		<div class="length-limit">
			<table style="width: 100%;margin: 0 auto;text-align: left;border-collapse: collapse;">
				<tr style="border-bottom: 1px solid; padding-left: 10px; font-family: 'Times News Roman','Khmer OS Muol Light';">
					<th style="padding-left: 2px;width:33%;"><img src="{{ asset('storage/img/'.$app->logo) }}"></th>
					<th style="width:33%;text-align: center;"><b>ACADEMIC RESULT SLIP</b></th>
					<th style="width:34%;text-align: right;padding-left: 2px;">Email: {{ env('MAIL_USERNAME') }}<br>P.O BOX 8394<br>Nairobi<br>Tel: 020 504 4135</th>
				</tr>
			</table>
			<table style="width: 100%;margin: 0 auto;text-align: left;border-collapse: collapse;">
				<tr>
					<td style="width: 150px;padding: 5px 0px;">Student Name: </td>
					<td style="width: 150px;padding: 5px 0px;" colspan="3" id="studentname">{{$student->s_surname.','.$student->s_othernames}}</td>
					<td style="width: 150px;padding: 5px 0px;">Registration No: </td>
					<td style="width: 150px;padding: 5px 0px;" id="studentno">{{$student->s_applicationno}}</td>
				</tr>
				<tr>
					<td>Programme: </td>
					<td colspan="3" id="programme">{{$student->course_name}}</td>
					<td>Department: </td>
					<td id="department">{{$student->department_name}}</td>
				</tr>
				<tr>
					<td>Admission Date: </td>
					<td id="admdate">{{$student->s_admdate}}</td>
					<td>Year of Study: </td>
					<td id="yos">{{$session->level_description}}</td>
					<td>Academic Year: </td>
					<td id="academic">{{$session->academic_name}}</td>
				</tr>
			</table> <br>		
			<table style="width: 100%;margin: 0 auto;text-align: left;border-collapse: collapse;">
				<tr style="font-weight:bolder; background: #eee;">
					<th class="th">#</th>
					<TH class="th">Unit Code</TH>
					<th class="th">Title</th>
					<TH class="th">Hours</TH>
					<th class="th">Marks</th>
					<TH class="th">Grade</TH>
				</tr>
				@foreach ($getMarks as $i => $marks)
				<tr>
					<td style="background-color: #fff; border: 1px solid; text-align: center;">{{++$i}}</td>
					<td style="background-color: #fff; border: 1px solid; text-align: left;padding-left: 4px;">{{$marks->unit->unit_code}}</td>
					<td style="background-color: #fff; border: 1px solid; text-align: left;padding-left: 4px;">{{$marks->unit->unit_name}}</td>
					<td style="background-color: #fff; border: 1px solid; text-align: center;">{{$marks->unit->unit_hours}}</td>
					<td style="background-color: #fff; border: 1px solid; text-align: center;">{{$marks->m_total_marks}}</td>
					<td style="background-color: #fff; border: 1px solid; text-align: center;">{{$marks->m_grade=="*" ? $marks->m_grade."*" : $marks->m_grade}}</td>
				</tr>
				@endforeach
				<tr style="background: #eee;">
					<td colspan="6"><span>Current Performance:</span>&nbsp;&nbsp; [<b>{{ $getMarks->count() }}/{{ $units->count() }} Units</b>] &nbsp;<span>Credit Hours:</span>&nbsp;&nbsp; <b>{{ $units->sum('unit_hours') }}</b> &nbsp;<span>Mean Score:</span> &nbsp;&nbsp;<b>{{ round($getMarks->avg('m_total_marks'),2) }}</b> &nbsp;<span>Mean Grade:</span> &nbsp;&nbsp;<b>
						@php
						switch($marks = round($getMarks->avg('m_total_marks'))) {
							case $marks >= 70: 
							echo "A";
							break;
							case $marks >= 60 && $marks < 70:
							echo "B";
							break;
							case $marks >= 50 && $marks < 60:
							echo "C";
							break;
							case $marks >= 40 && $marks < 50:
							echo "D";
							break;
							default;
							echo "F";
						}
						@endphp
					</b>
				</td>
			</tr>
			<tr style="background: #eee;">
				<td colspan="6">RECOMMENDATION &nbsp;<b>{{ $fail = $getMarks->where('m_grade','F')->count() !=0 ? "Fail" : ($getMarks->where('m_grade','*')->count() !=0 ? "Incomplete" : "Proceed") }}</b></td>
			</tr>
		</table><br>
		<table style="width: 100%;margin: 0 auto;text-align: left;border-collapse: collapse;">
			<tr style="font-weight:bold">
				<th width="25%"></th>
				<th>Key</th>
				<th>Special Remarks</th>
				<th></th>
			</tr>
			<tr>
				<td></td>
				<td>
					<table style="border-collapse: collapse;">
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">70 - 100</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Excellent</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">60 - 69</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Good</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">50 - 59</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Average</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">40 - 49</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">PASS</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">0 - 39</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">FAIL</td>
						</tr>
					</table>
				</td>
				<td>
					<table style="border-collapse: collapse;">
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">W</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Withdrawal</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">AS</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Audited Successfully</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">F</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Supplementary</td>
						</tr>
						<tr>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">**</td>
							<td style="background-color: #fff; border: 1px solid; text-align: center;">Incomplete</td>
						</tr>
					</table>
				</td>
				<td>
					NB:one(3 hours) unit consists of 30 lectures<br> of equivalent(3 practical hours or 2 hours<br> are equivalent to one lecture hour)
				</td>
			</tr>
		</table><br><br><br><br><br><br>
		<table style="width: 100%;margin: 0 auto;text-align: left;border-collapse: collapse;">
			<tr>
				<th>Signed:</th>
				<th>________________</th>
				<th>Date: <u>{{date('d/m/Y') }}</u></th>
				<th>Signed:</th>
				<th>_________________</th>
				<th>Date: <u>{{date('d/m/Y') }}</u></th>
			</tr>
			<tr>
				<td></td>
				<td style="font-style: italic;">Principal</td>
				<td></td>
				<td></td>
				<td style="font-style: italic;">Dean Registrar(A.A)</td>
				<td></td>
			</tr>
			<tr>
				<td style="font-style: italic;text-align: center;" colspan="6">*Official College Result Slip</td>
			</tr>
		</table>
	</div>
</div>
</div>

