@extends('layouts.header')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li class="active"><i class="fa fa-plus-circle"> Create Roles</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		Create role
	</div>
	<div class="panel-body">
		<form action="{{ url('admin/roles_privileges') }}" method="POST">
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
				</div>
			</div>
			<div class="page-header"></div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-flat btn-success pull-right">Create role</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection