<style type="text/css">
	#academic-detail {
		white-space: normal;
		width: 400px;
	}
	#table-class-info {
		width: 100%;
	}
	table tbody > tr >td {
		vertical-align: middle;
	}
</style>

<table class="table-hover table-striped table-condensed table-bordered" id="table-class-info">
	<thead>
		<tr>
			<th>Course</th>
			<th>Mode</th>
			<th>Year</th>
			<th>Semester</th>
			<th>Academic Detail</th>
			<th hidden="hidden">Action</th>
			<th id="hd"><input type="checkbox" id="checkall"></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($classes as $key => $c)
			<tr>
				<td>{{ $c->course_name }}</td>
				<td>{{ $c->mode_name }}</td>
				<td>{{ $c->year_id }}</td>
				<td>{{ $c->semester }}</td>
				<td id="academic-detail">
					<a href="#" data-id="{{ $c->program_id }}" class="class-edit">
						Course: {{ $c->course_name }}/ Academic Year: {{ $c->academic_name }} / Level: {{ $c->level_name }} / Start Date: {{ date("d-M-Y", strtotime($c->start_date))}} / End Date: {{ date("d-M-Y", strtotime($c->end_date)) }}
					</a>
				</td>
				<td id="hd"><input type="checkbox" name="chk[]" value="{{ $c->program_id }}" class="chk"></td>
				<td style="vertical-align: middle;width: 50px;" id="hidden">
					<button class="btn btn-danger btn-xs del-class" value="{{ $c->program_id }}">Del</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>