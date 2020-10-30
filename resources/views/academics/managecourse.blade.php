@extends('layouts.header')
@section('title','Classes')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-graduation-cap"> Academics</i></li>
	<li class="active"><i class="fa fa-file-text-o"> Manage programmes</i></li>
</ol>
@endsection
@section('content')
@include('academics.popups.college')
@include('academics.popups.school')
@include('academics.popups.program')
@include('academics.popups.department')
@include('academics.popups.mode')
@include('academics.popups.year')
@include('academics.popups.academic')
@include('academics.popups.major')
@include('academics.popups.admtype')
@include('academics.popups.unit')
@include('academics.popups.level')
@include('academics.popups.semester')
<div class="panel panel-info">
	<div class="panel-heading">
		<i class="fa fa-apple"></i>	Manage Progammes
		<p id="msg"></p>
	</div>
	<form class="form-horizontal" id="frm-create-class" action="{{ url('admin/academics') }}">
		{{ csrf_field() }}
		<input type="hidden" name="program_id" id="program_id">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<label for="college">College</label>
					<div class="input-group">
						<select name="college" id="col" class="form-control">
							@foreach ($colleges as $college)
							{{-- expr --}}
							<option value="{{$college->college_id}}">{{$college->college_name}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-college"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<label for="school">School</label>
					<div class="input-group">
						<select name="school" id="sch" class="form-control">
							@foreach ($schools as $school)
							{{-- expr --}}
							<option value="{{$school->school_id
							}}">{{ucfirst($school->school_name)
							}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-school"></span>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<label for="department">Department</label>
					<div class="input-group">
						<select name="department" id="dep" class="form-control">
							@foreach ($departments as $department)
							{{-- expr --}}
							<option value="{{$department->department_id
							}}">{{$department->department_name
							}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-department"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<label for="mode">Level</label>
					<div class="input-group">
						<select name="level_id" id="lvl" class="form-control">
							<option value="">.....................................</option>
							@foreach ($levels as $level)
							{{-- expr --}}
							<option value="{{$level->level_id
							}}">{{$level->level_description
							}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-level"></span>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<label for="course">Course</label>
					<div class="input-group">
						<select name="course" id="cor" class="form-control">
							@foreach ($courses as $course)
							{{-- expr --}}
							<option value="{{$course->course_id}}">{{$course->course_name}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-course"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<label for="mode">Unit</label>
					<div class="input-group">
						<select name="unit_id" id="unt" class="form-control">
							@foreach ($units as $unit)
							{{-- expr --}}
							<option value="{{$unit->unit_id
							}}">{{$unit->unit_name
							}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-unit"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-md-3">
					<label for="adm_type">Admission Type</label>
					<div class="input-group">
						<select name="admissiontype_id" id="atype" class="form-control">
							@foreach ($admissiontypes as $admissiontype)
							{{-- expr --}}
							<option value="{{$admissiontype->admissiontype_id
							}}">{{$admissiontype->admissiontype_name
							}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-admtype"></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<label for="academic-year">Academic Year</label>
					<div class="input-group">
						<select name="academic_id" id="academic" class="form-control">
							@foreach ($academics as $academic)
							{{-- expr --}}
							<option value="{{$academic->academic_id}}">{{$academic->academic_name}}</option>
							@endforeach
						</select>
						<div class="input-group-addon">
							<span class="fa fa-plus" id="add-more-academic"></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<label for="start-date">Start Date</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</div>
						<input value="{{date('Y-m-d')}}" type="text" name="start_date" class="form-control" id="start-date">
					</div>
				</div>
				<div class="col-md-3">
					<label for="end-date">End Date</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</div>
						<input value="{{date('Y-m-d')}}" name="end_date" type="text" class="form-control" id="end-date">
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-primary" id="create-course">Create Programme</button>
			<button type="button" class="btn btn-success btn-sm btn-update-class">Update Class</button>
		</div>
	</form>
	<div class="panel panel-info" style="border-bottom: 0px;">
		<div class="panel-heading"><i class="fa fa-apple"></i> Class Information</div>
		<div class="panel-body" id="add-class-info">

		</div>
	</div>
</div>
@endsection

@section('script') 
@include('academics.scripts.managecourse')
@endsection