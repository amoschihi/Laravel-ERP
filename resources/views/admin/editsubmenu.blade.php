@extends('layouts.header')
@section('title','Submenu Management - Edit')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-gear"> Submenu Management</i></li>
	<li class="active"><i class="fa fa-navicon"> {{ $submenu->menu_name }}</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		<a href="{{ url('admin/menu_management/'.$mm.'/edit') }}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
		<i class="fa fa-edit"></i> Edit Submenu: {{ $submenu->menu_name }}
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
		<form action="{{ url('admin/submenu_management/'.$submenu->id.'?mm='.$mm ) }}" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<div class="form-group {{ $errors->has('menu_name') ? ' has-error' : '' }}">
				<label for="menu_name" class="control-label">Menu Name</label>
				<input type="text" name="menu_name" class="form-control" value="{{ $submenu->menu_name }}">
				@if ($errors->has('menu_name'))
				<span class="help-block">
					<strong>{{ $errors->first('menu_name') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
				<label for="position" class="control-label">Position</label>
				<select name="position" class="form-control" id="position" value="{{ $submenu->position }}">
					@for ($i = 1; $i <= $submenus->count()+1; $i++)
					@if ($i==$submenu->position)
					<option value="{{ $i }}" selected>{{ $i }}</option>
					@else 
					<option value="{{ $i }}">{{ $i }}</option>
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
				<input type="radio" name="visible" value="1" {{ $submenu->visible==1 ? 'checked' : '' }}> Yes
				<input type="radio" name="visible" value="0" {{ $submenu->visible==0 ? 'checked' : '' }}> No

				@if ($errors->has('visible'))
				<div class="help-block">
					<strong>{{ $errors->first('visible') }}</strong>
				</div>
				@endif
			</div>
			<div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
				<label for="menu_name" class="control-label">Icon</label>
				<select id='list-icon' class="form-control" name="icon" style="font-family: 'FontAwesome', Helvetica;">
					<option value="">** Select an Icon</option>
					@foreach($icons as $icon)
					<option value='{{ $icon->id }}' data-path="{{ $icon->icon_path }}" {{ ($submenu->icon_id == $icon->id)?"selected":"" }} data-label='{{$icon->icon_name}}'>{{$icon->icon_name}}</option>
					@endforeach
				</select>
				@if ($errors->has('icon'))
				<span class="help-block">
					<strong>{{ $errors->first('icon') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
			</div>
		</form>
		<div class="form-group" style="margin-top: -50px;">
			<a href="#" class="btn btn-danger pull-right" onclick="event.preventDefault();document.getElementById('del-submenu').submit();"><i class="fa fa-trash-o"></i> Delete {{ $submenu->menu_name }} submenu</a>

			<form id="del-submenu" action="{{ url('admin/submenu_management/'.$submenu->id.'?mm='.$mm) }}" method="POST" style="display: none;">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
@endsection
@section('script') 
<script type="text/javascript">
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