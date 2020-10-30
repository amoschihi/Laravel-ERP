<div class="row">
	<div class="col-md-10">
		<style type="text/css">
		th#th {
			text-align: right;
		}
	</style>

	<table class="table table-striped">
		<thead>
			<p style="font-size: 20px;" class="text-titlecase text-center text-danger"><strong>{{$st->s_surname.', '.$st->s_othernames}}  &nbsp;</strong>~<strong> {{ $student->description.' '.$student->s_description }}</strong>(current session)</p>
		</thead>
		<tr>
			<th id="th">Admission No: </th>
			<td>{{$st->s_applicationno }}</td>
		</tr>
		<tr>
			<th id="th">Gender: </th>
			<td>
				@if($st->s_gender=="F")
				Female
				@else
				Male
				@endif
			</td>
		</tr>
		<tr>
			<th id="th">Date of Birth: </th>
			<td>{{$st->s_dob}}</td>
		</tr>
		<tr>
			<th id="th">National ID: </th>
			<td>{{$st->s_nationalid}}</td>
		</tr>
		<tr>
			<th id="th">Nationality: </th>
			<td>{{$st->s_country}}</td>
		</tr>
		<tr>
			<th id="th"><i class="fa fa-phone"></i>  Mobile No: </th>
			<td>{{$st->s_contacts}}</td>
		</tr>
		<tr>
			<th id="th">Home Address: </th>
			<td>{{$st->s_homeaddress}}</td>
		</tr>

		<tr>
			<th id="th">Guardian Name: </th>
			<td>{{$st->parent->parentfullname}}</td>
		</tr>
		<tr>
			<th id="th">Guardian Tel: </th>
			<td>{{$st->parent->p_contacts}}</td>
		</tr>
		<tr>
			<th id="th">Department: </th>
			<td>{{$student->department_name}}</td>
		</tr>
		<tr>
			<th id="th">Course: </th>
			<td>{{$student->course_name}}</td>
		</tr>
		<tr>
			<th id="th">Entry: </th>
			<td>{{$student->admissiontype_name}}</td>
		</tr>
		<tr>
			<th id="th">Date of Admission: </th>
			<td>{{str_limit($st->s_admdate,25). ' ('. $st->created_at->diffForHumans().')'}}</td>
		</tr>
		<tr>
			<th id="th">Exp. Graduation Date: </th>
			<td>{{ $st->s_graddate }}</td>
		</tr>
	</table>
</div>
<div class="col-md-2">
	<table class="table table-striped">
		<tr>
			<td>
				<a href="#uploadPhoto" data-target="#uploadPhoto" data-toggle="modal" class="thumbnail">
					<img src="{{ $st->s_photo ? asset('storage/students/'.$st->s_photo) : asset('storage/profile.png') }}" alt="Passport Photo">
				</a>
				@include('students.tabs.popups.upload-student-photo')
			</td>
		</tr>
		<tr>
			<td>
				[{{$student->college_name}}]
			</td>
		</tr>
	</table>
	<a href="{{ url('admin/students/'.$st->student_id.'/edit') }}" class="btn btn-flat btn-success"><i class="fa fa-edit"></i> Edit Record</a>
	<div class="page-header"></div>
	<a class="btn btn-danger btn-flat" href="{{ url('admin/students/'.$st->student_id) }}" onclick="event.preventDefault(); AreYouSure()"> <i class="fa fa-times fa-fw"></i> Delete record </a>

	<form id="delete-form" action="{{ url('admin/students/'.$st->student_id) }}" method="POST" style="display: none;">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
</div>
</div>