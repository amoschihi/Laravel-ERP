@extends('layouts.header')
@section('title','Roles')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li class="active"><i class="fa fa-key"> Roles</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		Roles
		<a href="{{ url('admin/roles_privileges/create') }}" style="margin-top: -5px;" class="pull-right btn btn-flat btn-success"><i class="fa fa-plus-circle"></i> Add role</a>
	</div>
	<div class="panel-body">
		<table class="table table-hover table-striped table-condensed table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td class="text-right">
						<a href="{{ url('admin/roles_privileges/'.$role->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>					
@endsection