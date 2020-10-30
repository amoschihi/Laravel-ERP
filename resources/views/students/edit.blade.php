@extends('layouts.header')
@section('title','Editing - '.$student->s_othernames)
@section('breadcrumb')
	<ol class="breadcrumb text-primary pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li><i class="fa fa-users"> Students</i></li>
		<li><i class="fa fa-edit"> {{ $student->s_othernames }}</i></li>
	</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		<a href="{{ url('admin/students/'.$student->student_id) }}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
		<strong><i class="fa fa-user"></i> Editing {{$student->s_surname.', '.$student->s_othernames.' ('.$student->s_applicationno.')'}} </strong>
		@if (session('info'))
		@component('components.alert')
		    @slot('type')
		        success
		    @endslot
		    {{ session('info') }}
		@endcomponent
		@endif
	</div>
	<div class="panel-body">
		<form action="{{ url('admin/students') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="student_id" value="{{$student->student_id}}">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('s_applicationno') ? ' has-error' : '' }}">
					<label for="s_applicationno" class="control-label">Admission No</label>
					<input type="text" name="s_applicationno" class="form-control" value="{{ $student->s_applicationno }}" readonly>
					@if ($errors->has('s_applicationno'))
					<span class="help-block">
						<strong>{{ $errors->first('s_applicationno') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('s_othernames') ? ' has-error' : '' }}">
					<label for="othernames" class="control-label">Other Names</label>
					<input type="text" name="s_othernames" class="form-control" value="{{ $student->s_othernames }}" readonly>
					@if ($errors->has('s_othernames'))
					<span class="help-block">
						<strong>{{ $errors->first('s_othernames') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('s_contacts') ? ' has-error' : '' }}">
					<label for="s_contacts" class="control-label">Mobile No</label>
					<input type="text" name="s_contacts" class="form-control" value="{{ $student->s_contacts }}">
					@if ($errors->has('s_contacts'))
					<span class="help-block">
						<strong>{{ $errors->first('s_contacts') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('s_homeaddress') ? ' has-error' : '' }}">
					<label for="s_homeaddress" class="control-label">Home Address</label>
					<input type="text" name="s_homeaddress" class="form-control" value="{{ $student->s_homeaddress }}">
					@if ($errors->has('s_homeaddress'))
					<span class="help-block">
						<strong>{{ $errors->first('s_homeaddress') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('s_dob') ? ' has-error' : '' }}">
					<label for="s_applicationno" class="control-label">Date of Birth</label>
					<input type="text" name="s_applicationno" class="form-control" value="{{ $student->s_dob }}" id="s_dob" readonly>
					@if ($errors->has('s_dob'))
					<span class="help-block">
						<strong>{{ $errors->first('s_dob') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('s_nationalid') ? ' has-error' : '' }}">
					<label for="s_nationalid" class="control-label">National ID</label>
					<input type="text" name="s_nationalid" class="form-control" value="{{ $student->s_nationalid }}" readonly>
					@if ($errors->has('s_nationalid'))
					<span class="help-block">
						<strong>{{ $errors->first('s_nationalid') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('s_country') ? ' has-error' : '' }}">
					<label for="s_country" class="control-label">Country</label>
					<input type="text" name="s_country" class="form-control" value="{{ $student->s_country }}">
					@if ($errors->has('s_country'))
					<span class="help-block">
						<strong>{{ $errors->first('s_country') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('p_contacts') ? ' has-error' : '' }}">
					<label for="p_contacts" class="control-label">Guardian Tel</label>
					<input type="text" name="p_contacts" class="form-control" value="{{ $student->parent->p_contacts }}">
					@if ($errors->has('p_contacts'))
					<span class="help-block">
						<strong>{{ $errors->first('p_contacts') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('script') 
<script type="text/javascript">
	$('#s_dob').datepicker({
		changeMonth:true,
		changeYear: true,
		dateFormat:'yy-mm-dd'
	});
</script>
@endsection