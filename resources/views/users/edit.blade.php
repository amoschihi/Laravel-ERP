@extends('layouts.header')
@section('breadcrumb')
	<ol class="breadcrumb pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-user-o"> Edit user</i></li>
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
		Edit user
	</div>
	<div class="panel-body">
		<form action="{{ url('admin/user_management/'.$user->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Name</label>
						<input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">Email</label>
						<input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="password">Password</label><br>
						<div class="radio">
							<label>
								<input type="radio" name="password_options" value="keep" checked> Do not Change Password
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="password_options" value="auto"> Auto Generate New Password
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="password_options" value="manual"> Manually Set New Password
							</label>
							<input style="display: none;" class="form-control" name="password" id="password" placeholder="Manually set the password">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Roles: </label>
						@foreach ($roles as $role)
						<div class="checkbox">
							<label>
								<input type="checkbox" name="roles[]" @foreach ($user->role as $r) {{ $r->name==$role->name ? 'checked' : '' }} @endforeach value="{{ $role->id }}"> {{ $role->name }}
							</label>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="page-header"></div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-flat btn-success pull-right">Edit user</button>
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
		}else{
			$('#password').css('display', 'none');
		}
	}
	isChecked()
	$('input').on('click',function() {
		isChecked()
	});
</script> 
@endsection