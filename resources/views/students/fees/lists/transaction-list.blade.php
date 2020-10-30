<div class="accordion-body collapse" id="div{{$key}}">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Transaction Date</th>
				<th>Cashier</th>
				<th>Paid (KSH)</th>
				<th>Remark</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach ($transactions as $k => $t)
		<tbody>
			<tr>
				<td>{{$k+1}}</td>
				<td>{{ $t->transaction_date }}</td>
				<td>{{ $t->name }}</td>
				<td>{{$t->amount_paid}}</td>
				<td>{{$t->remark }}</td>
				<td>{{$t->description}}</td>
				<td>
					<a href="" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
							<a class="btn btn-danger btn-xs" type="button" href="#"><i class="fa fa-trash-o" title="Delete"></i></a>
							<a href="{{ route('print.invoice',$t->receiptDetail->receipt_id) }}" target="_blank" class="btn btn-primary btn-xs"><span class="fa fa-print"></span></a>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
</div>