@extends('layouts.header')
@section('breadcrumb')
	<ol class="breadcrumb pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-users"> Users</i></li>
	</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		Users
		<a href="{{ url('admin/user_management/create') }}" style="margin-top: -5px;" class="pull-right btn btn-flat btn-success"><i class="fa fa-plus-circle"></i> Add user</a>
	</div>
	<div class="panel-body">
		<table class="table table-hover table-striped table-condensed table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Date created</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at==null?'Not Specified':$user->created_at->toFormattedDateString() }}</td>
					<td class="text-right">
						<a href="{{ url('admin/user_management/'.$user->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
						<a href="{{ url('admin/user_management/'.$user->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection