@extends('layouts.header')
@section('title','Settings - Icons')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-gear"> Settings</i></li>
	<li class="active"><i class="fa fa-apple"> Icons</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		<a href="{{ url('admin/settings') }}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
		<i class="fa fa-list-alt"></i> {{ $icons->count()}} Available icons
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				{{-- {{ $icons->links() }} --}}
				<table class="table table-striped" id="datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>icon_name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($icons as $i => $icon) 
						<tr>
							<td>{{ ++$i }}</td>
							<td><i class="{{$icon->icon_path }}"></i> {{$icon->icon_name }}</td>
							<td>
								<a href="" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
								<a href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-plus"></i> Create New
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
						<form action="{{ route('new.icon') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group {{$errors->has('icon_name')?'has-error':''}}" >
								<label for="name" class="control-label">Icon name</label>
								<input type="text" value="{{ old('icon_name') }}" class="form-control" name="icon_name" placeholder="e.g user">
								@if ($errors->has('icon_name'))
								<span class="help-block">
									<strong>{{ $errors->first('icon_name') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group {{$errors->has('icon_path')?'has-error':''}}" >
								<label for="icon" class="control-label">Icon class name</label>
								<input type="text" value="{{ old('icon_path') }}" class="form-control" name="icon_path" placeholder="e.g fa fa-user">
								@if ($errors->has('icon_path'))
								<span class="help-block">
									<strong>{{ $errors->first('icon_path') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group">
								<button class="btn btn-flat btn-primary pull-right"><i class="fa fa-save"></i>  Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection

