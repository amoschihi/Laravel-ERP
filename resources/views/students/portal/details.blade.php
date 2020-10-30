@extends('layouts.student.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-registered"></i> Registration Info</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ url('home') }}">Home</a></li>
			<li><i class="fa fa-registered"></i> Registration info</li>
		</ol>
	</div>
</div>
@if($student!=null)
<div class="panel panel-info">
	<div class="panel-heading">
		<h2><i class="fa fa-apple"></i> <strong>Personal Info</strong></h2>
		<div class="panel-actions">
			<a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
			<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
			<a href="{{ url('main_details') }}" class="btn-close"><i class="fa fa-times"></i></a>
		</div>
	</div>

	<div class="panel-body">
		<div class="col-xs-6 col-md-3">
			<a href="" onclick="event.preventDefault()" class="thumbnail">
				<img class="media-object" src="{{ asset('storage/students/'.$student->s_photo) }}" alt="{{ $student->s_othernames }}">
			</a>
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>Names</h4>
			{{ $student->s_surname.', '.$student->s_othernames }}
			<h4>Gender</h4>
			{{ $student->s_gender=='M' ? 'Male' : 'Female' }}
			<h4>Contacts</h4>
			{{ $student->s_contacts }}
			<h4>Date of Birth</h4>
			{{ $student->s_dob }}
			<h4>National ID</h4>
			{{ $student->s_nationalid }}
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>Denomination</h4>
			{{ $student->s_denomination }}
			<h4>Home Address</h4>
			{{ $student->s_homeaddress }}
			<h4>District</h4>
			{{ $student->s_district }}
			<h4>Nationality</h4>
			{{ $student->s_country }}
			<h4>Email Address</h4>
			{{ $student->s_emailaddress }}
		</div>
		<div class="col-xs-6 col-md-3">
			<h4>Guardian Names</h4> {{ $student->parentfullname }}
			<h4>Guardian Contacts</h4> {{ $student->p_contacts }}
			<h4 class="page-header"></h4>
			<a href="{{ url('main_details/'.$student->student_id.'/edit') }}" class="btn btn-primary">Edit profile</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading"><i class="fa fa-apple"></i> Academic info</div>
			<div class="panel-body">
				<div class="col-xs-6 col-md-6">
					<h4>College</h4>
					{{ $student->college_name }}
					<h4>School</h4>
					{{ $student->school_name }}
					<h4>Department</h4>
					{{ $student->department_name }}

				</div>
				<div class="col-xs-6 col-md-6">
					<h4>Course</h4>	{{ $student->course_name }}
					<h4>Admission Date</h4>	{{ $student->s_admdate }}
					<h4>Expected Graduation Date</h4>	{{ $student->s_graddate }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading"><i class="fa fa-apple"></i> Status info</div>
			<div class="panel-body">
				<div class="col-xs-6 col-md-6">
					<h4>Admission No</h4> {{ $student->s_applicationno }}
					<h4>Academic Year</h4> {{ $student->academic_name }}
					<h4>Level</h4> Year {{ $student->year }} Sem {{ $student->semester }}
				</div>
				<div class="col-xs-6 col-md-6">
					<h4>Admission Type</h4> {{ $student->admissiontype_name }}
					<h4>Mode</h4> {{ $student->mode_name }}
				</div>
			</div>
		</div>
	</div>
</div>
@else
<div class="panel panel-info">
	<div class="panel-heading"><i class="fa fa-warning"></i> You have no records found</div>
	<div class="panel-body text-danger">Report to your school immediately</div>
</div>
@endif
@endsection