@extends('layouts.header')
@section('breadcrumb')
	<ol class="breadcrumb pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-user-o"> Create user</i></li>
	</ol>
@endsection
@section('content')
<style type="text/css">
li {
	list-style: none;
}
</style>
<div class="panel panel-info">
	<div class="panel-heading">
		Create user
	</div>
	<div class="panel-body">
		<form action="{{ url('admin/user_management') }}" method="POST">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-12">
					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Name</label>
						<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">Email</label>
						<input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<div class="radio">
							<label>
								<input type="radio" name="password_options" value="auto" checked> Auto Generate Password
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="password_options" value="manual"> Manually Set Password
							</label>
							<input style="display: none;" class="form-control" name="password" id="password" placeholder="Manually give this user a password">
						</div>
					</div>
				</div>
			</div>
			<div class="page-header"></div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-flat btn-success pull-right">Create user</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	var isChecked = function () {
		if($('input:checked').val()=='manual') {
			$('#password').css('display', 'block');
			$('#password').prop('required', 'required')
		}else{
			$('#password').css('display', 'none');
			$('#password').removeProp('required')
		}
	}
	isChecked()
	$('input').on('click',function() {
		isChecked()
	});
</script> 
@endsection