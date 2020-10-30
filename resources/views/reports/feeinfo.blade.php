<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered table-condensed" id="fee-info">
		<thead>
			<tr>
				<td>#</td>
				<td>Student ID</td>
				<td>Student Name</td>
				<td>Paid Amount</td>
				<td>Transaction Date</td>
				<td>School Fee</td>
				<td>Student Amount</td>
				<td>Accountant</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($fees as $k => $f)
			<tr>
				<td>{{ ++$k }}</td>
				<td>{{ sprintf('%05d',$f->student_id) }}</td>
				<td>{{ $f->s_othernames.' '.$f->s_surname }}</td>
				<td>{{ $f->amount_paid }}</td>
				<td>{{ $f->transaction_date }}</td>
				<td>{{ $f->school_fee }}</td>
				<td>{{ $f->student_fee }}</td>
				<td>{{ $f->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	@if ($fees->count()==null)
		swal('No records found','','warning')
	@endif
	$(document).ready(function() {
		$('#fee-info').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5',
			'print'
			]

		})
	});	
</script>