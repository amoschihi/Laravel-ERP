<div class="row">
	<style type="text/css">
		th#th {
			text-align: right;
		}
	</style>
	<div class="col-md-10">
		<table class="table table-striped">
			<thead>
				<p style="font-size: 20px;" class="text-titlecase text-center text-danger"><strong>{{$agent->name}}</strong></p>
			</thead>
			<tr>
				<th id="th">Gender: </th>
				<td>
					@if ($agent->gender=='F')
						Female
					@else
						Male
					@endif
				</td>
			</tr>
			<tr>
				<th id="th">DOB: </th>
				<td>{{$agent->dob}}</td>
			</tr>
			<tr>
				<th id="th">National ID: </th>
				<td>{{$agent->national_id}}</td>
			</tr>
			<tr>
				<th id="th">Location: </th>
				<td>{{$agent->location}}</td>
			</tr>
			<tr>
				<th id="th">Contact: </th>
				<td>{{$agent->contact}}</td>
			</tr>
		</table>
	</div>
	<div class="col-md-2">
		<table class="table table-striped">
			<tr>
				<td>
					<a href="#uploadPhoto" data-target="#uploadPhoto" data-toggle="modal" class="thumbnail">
						<img src="{{ $agent->photo ? asset('storage/agents/'.$agent->photo) : '' }}" alt="Passport Photo">
					</a>
					{{-- @include('students.tabs.popups.upload-student-photo') --}}
				</td>
			</tr>
			<tr>
				<td>
					[{{ $agent->location }}]
				</td>
			</tr>
		</table>
		<a href="{{ url('admin/agents/'.$agent->id.'/edit') }}" class="btn btn-flat btn-success"><i class="fa fa-edit"></i> Edit Record</a>
		<div class="page-header"></div>
		<a class="btn btn-danger btn-flat" href="{{ url('admin/agents/'.$agent->id) }}" onclick="event.preventDefault(); AreYouSure()"> <i class="fa fa-times fa-fw"></i> Delete record </a>

		<form id="delete-form" action="{{ url('admin/agents/'.$agent->id) }}" method="POST" style="display: none;">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
		</form>
	</div>
</div>