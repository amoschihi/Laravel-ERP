<div class="panel panel-default">
	<div class="panel-heading">
		Pay List
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-bordered" style="border-collapse: collapse;">
				<thead>
					<tr>
						<th>N<sup>o</sup></th>
						<th>Year of Study</th>
						<th>Semester</th>
						<th class="text-center">Fee (KSH)</th>
						<th class="text-center">Paid (KSH) </th>
						<th class="text-center">Balance (KSH)</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($student_fee as $key => $sf)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$sf->year}}</td>
						<td>{{ $sf->semester }}</td>
						<td class="text-center">{{number_format($schoolfees->fee_amount,2)}}</td>
						<td class="text-center">
							{{number_format($transactions->where('fee_finance_detail_id',$sf->fee_finance_detail_id)->sum('amount_paid'),2)}}
							<input type="hidden" name="b" id="b">
						</td>
						<td class="text-center" style="color:red;font-weight: bold;">
							{{number_format($schoolfees->fee_amount - $transactions->where('fee_finance_detail_id',$sf->fee_finance_detail_id)->sum('amount_paid'),2) }}
						</td>
						<td>
							<a href="" class="btn btn-success btn-xs" title="Edit" data-id-updateFee="{{ $sf->fee_finance_detail_id }}"><i class="fa fa-edit"></i></a>
							<button class="btn btn-danger btn-xs btn-paid" type="button" value="{{ $schoolfees->fee_amount - $transactions->where('fee_finance_detail_id',$sf->fee_finance_detail_id)->sum('amount_paid') }}" data-id-paid="{{ $sf->fee_finance_detail_id }}" data-st-id="{{ $student->student_id }}"><i class="fa fa-usd" title="complete"></i></button>
							<button class="btn btn-primary btn-xs accordion-toggle" data-target="#div{{$key}}" data-toggle="collapse" ><span class="fa fa-eye"></span></button>
						</td>
					</tr>
					<tr>
						<td colspan="7">
							@include('students.fees.lists.transaction-list')
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		

	</div>
</div>