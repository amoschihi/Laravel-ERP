@extends('layouts.header')
@section('title','Menu Management - New Menu')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-bars"> Menu management</i></li>
	<li class="active"><i class="fa fa-plus"> New menu</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		<a href="{{ url('admin/menu_management') }}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
		<i class="fa fa-bars"></i> Add New Menu
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
		<form action="{{ url('admin/menu_management') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group {{ $errors->has('menu_name') ? ' has-error' : '' }}">
				<label for="menu_name" class="control-label">Menu Name</label>
				<input type="text" name="menu_name" class="form-control" value="{{ old('menu_name') }}">
				@if ($errors->has('menu_name'))
				<span class="help-block">
					<strong>{{ $errors->first('menu_name') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group {{ $errors->has('priviledges') ? ' has-error' : '' }}">
				<label for="priviledges" class="control-label">Priviledges <small><em>NB: The menu will only be available to the selected users</em></small></label>
				<select name="priviledges[]" id="priviledges" class="form-control" multiple="multiple" value="{{ old('priviledges') }}">
					@foreach ($roles as $role)
					{{-- expr --}}
					<option value="{{ $role->id }}">{{$role->name}}</option>
					@endforeach
				</select>
				@if ($errors->has('priviledges'))
				<span class="help-block">
					<strong>{{ $errors->first('priviledges') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
				<label for="position" class="control-label">Position</label>
				<select name="position" class="form-control" id="position" value="{{ old('position') }}">
					@for ($i = 1; $i <= $allMenus->count()+1; $i++)
					@if ($i==$allMenus->count())
					<option value="{{ $i }}">{{ $i }}</option>
					@else 
					<option value="{{ $i }}" selected>{{ $i }}</option>
					@endif
					@endfor
				</select>
				@if ($errors->has('position'))
				<div class="help-block">
					<strong>{{ $errors->first('position') }}</strong>
				</div>
				@endif
			</div>
			<div class="form-group {{ $errors->has('visible') ? 'has-error' : '' }}">
				<label for="visible" class="control-label">Visible</label>
				<input type="radio" name="visible" value="{{ $errors->has('visible') ? old('position') : 1 }}"> Yes
				<input type="radio" name="visible" value="{{ $errors->has('visible') ? old('position') : 0 }}"> No

				@if ($errors->has('visible'))
				<div class="help-block">
					<strong>{{ $errors->first('visible') }}</strong>
				</div>
				@endif
			</div>
			<div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
				<label for="menu_name" class="control-label">Icon</label>
				<select name="icon" id="list-icon" class="form-control" value="{{old('icon')}}" style="font-family: 'FontAwesome', Helvetica;">
					<option value="" disabled selected>** Select an Icon</option>
					@foreach ($icons as $icon)
					<option value='{{ $icon->id }}' data-path="{{ $icon->icon_path }}" data-label='{{$icon->icon_name}}'>{{$icon->icon_name}}</option>
					@endforeach
				</select>
				@if ($errors->has('icon'))
				<span class="help-block">
					<strong>{{ $errors->first('icon') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('script') 
<script type="text/javascript">
	$("#priviledges").select2({
		placeholder: "Click to select priviledges",
		allowClear: true
	});
	function format(icon) {          
		var originalOption = icon.element;
		var label = $(originalOption).text();
		var val = $(originalOption).val();
		if(!val) return label;
		var resp = $('<span><i style=\"margin-top:5px\" class=\"pull-right ' + $(originalOption).data('path') + '\"></i> ' + $(originalOption).data('label') + '</span>');
		return resp;
	}
	$('#list-icon').select2({
		width: "100%",
		templateResult: format,
		templateSelection: format
	});
</script>
@endsection