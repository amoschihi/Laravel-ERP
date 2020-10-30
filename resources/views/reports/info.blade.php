<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered table-condensed" id="student-info">
		<caption>
			{{ $classes->count()==null ? 'No results found' : $classes[0]->program }}
		</caption>
		<thead>
			<tr>
				<th>#</th>
				<th>StudentID</th>
				<th>Name</th>
				<th>Sex</th>
				<th>Birth Date</th>
				<th>Course</th>
				<th>Level</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($classes as $key => $c)
			<tr>
				<td>{{ ++$key }}</td>
				<td>{{ sprintf("%05d",$c->student_id) }}</td>
				<td>{{ $c->name }}</td>
				<td>{{ $c->sex }}</td>
				<td>{{ $c->s_dob }}</td>
				<td>{{ $c->course_name }}</td>
				<td>{{ $c->level_name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		@if ($classes->count()==0)
		swal('No students found','','warning')
		@endif
		$('#student-info').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
			]
		})
	});
</script>