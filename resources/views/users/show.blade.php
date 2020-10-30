@extends('layouts.header')
@section('breadcrumb')
	<ol class="breadcrumb pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-user-o"> {{ $user->name }}</i></li>
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
		View user details
		<a href="{{ url('admin/user_management/'.$user->id.'/edit') }}" style="margin-top: -5px;" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit user</a>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label for="name">Name</label>
			{{ $user->name }}
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			{{ $user->email }}
		</div>
		<div class="form-group">
			<label for="roles">Roles: </label>
			<ul>
				@forelse ($user->role as $role)
					<li>{{ $role->name }}</li>
				@empty
					This user has no roles assigned yet
				@endforelse
			</ul>
		</div>	
	</div>
</div>
@endsection