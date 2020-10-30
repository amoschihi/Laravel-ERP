@extends('layouts.header')
@section('title','Menu Management - Edit')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-gear"> Menu Management</i></li>
	<li class="active"><i class="fa fa-navicon"> {{ $menu->menu_name }}</i></li>
</ol>
@endsection
@section('content')
@push('head')
<style type="text/css">
body.dragging, body.dragging * { cursor: move !important;}
.dragged {position: absolute;opacity: 0.7;z-index: 2000;}
.draggable-menu {padding: 0 0 0 0;margin:0 0 0 0;}
.draggable-menu li {margin-top:6px;padding:5px;border:1px solid #cccccc;background:#eeeeee;cursor: move;list-style-type:none;margin-bottom:4px;min-height: 35px;}
.draggable-menu li.placeholder {position: relative;border:1px dashed #b7042c;background:#ffffff;}
.draggable-menu li.placeholder:before {position: absolute;}
.gif {position:absolute;margin-left:200px;margin-top:40px;display:none;}
</style>
@endpush
@push('bottom')
<script src='{{asset("js/jquery-sortable-min.js")}}'></script>
<script type="text/javascript">
	$(function  () {
		var sortactive = $(".draggable-menu").sortable({
			group: '.draggable-menu',  
			delay:200,               
			isValidTarget: function ($item, container) {
              	var depth = 1, // Start with a depth of one (the element itself)
              	maxDepth = 2,
              	children = $item.find('ol').first().find('li');
             	// Add the amount of parents to the depth
             	depth += container.el.parents('ol').length;
              	// Increment the depth for each time a child
              	while (children.length) {
              		depth++;
              		children = children.find('ol').first().find('li');
              	}
              	return depth <= maxDepth;
              },                       
              onDrop: function ($item, container, _super) {
              	var data = $('.draggable-menu').sortable("serialize").get();
              	var jsonString = JSON.stringify(data, null, ' '); 
              	$.post("{{ url('admin/menu_management/sortMenus') }}",{menus:jsonString},function(resp) {
              		console.log(resp)
              		$('#menu-saved-info').fadeIn('fast').delay(1000).fadeOut('fast');
              		$('#ix').load(location.href + " #ix>*","");
              	});

              	_super($item, container);
              }
          });
	});
</script>
@endpush
@include('admin.popups.newsubmenu')
@include('admin.popups.movesubmenu')
<div class="panel panel-info">
	<div class="panel-heading">
		<a href="{{ url('admin/menu_management') }}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
		<i class="fa fa-bars"></i> Menu Management - Edit Menu 
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						Submenus in {{ $menu->menu_name }} Menu <span id='menu-saved-info' style="display:none" class='pull-right text-success'><i class='fa fa-check'></i> Menu Saved !</span>
						@if (session('success'))
						@component('components.alert')
						    @slot('type')
						        success
						    @endslot
							{{ session('success') }}
						@endcomponent
						@endif
					</div>
					<div class="panel-body">
						<span class="gif"><img src="{{ asset('img/loading-image.gif') }}"></span>
						<ol data-toggle="tooltip" title="Drag and drop to sort" data-placement="bottom" class="draggable-menu">
							@forelse ($children->where('menu_id',$menu->id) as $sub)
							<li data-id="{{ $sub->id }}" 
								data-name="{{ $sub->menu_name }}">
								<i class="{{ $sub->icon->icon_path or null }}"></i> 
								{{ $sub->menu_name }}
								<span class="pull-right">
									<a href="{{ url('admin/submenu_management/'.$sub->id.'/edit?mm='.$menu->id) }}"
										data-toggle="tooltip" 
										title="Edit">
										<i class="fa fa-pencil"></i>
									</a>
									&nbsp;&nbsp;
									<a href="" 
										onclick="event.preventDefault();hideOrUnhide({{ $sub->id }},{{ $sub->visible }})">
											<i class="fa {{ $sub->visible==1 ? 'fa-eye text-success' : 'fa-eye-slash text-warning' }}" 
												data-toggle="tooltip" 
												title="{{ $sub->visible==1 ? 'Hide' : 'Unhide' }}">
											</i>
									</a>
									&nbsp;&nbsp;
									<a href=""
										onclick="event.preventDefault();moveMenu({{ $sub->id }},'{{ $sub->menu_name }}')">
											<i class="fa fa-arrows-alt text-warning"
												data-toggle="tooltip"
												title="Move sub menu">
											</i>
									</a>
								</span>
							</li>
							@empty
							No submenus found in {{ $menu->menu_name }} menu
							@endforelse
						</ol>
						<a href="#submenu-modal" data-toggle="modal" data-target="#submenu-modal" class="pull-right"><i class="fa fa-plus"></i> New submenu</a>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Menu : {{ $menu->menu_name }}
						<a href="#submenu-modal" data-toggle="modal" data-target="#submenu-modal" class="btn btn-info btn-xs pull-right"><i class="fa fa-plus-circle"></i> Add a submenu to this menu</a>
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
						<form action="{{ url('admin/menu_management/'.$menu->id ) }}" method="POST">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="form-group {{ $errors->has('menu_name') ? ' has-error' : '' }}">
								<label for="menu_name" class="control-label">Menu Name</label>
								<input type="text" name="menu_name" class="form-control" value="{{ $menu->menu_name }}">
								@if ($errors->has('menu_name'))
								<span class="help-block">
									<strong>{{ $errors->first('menu_name') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('priviledges') ? ' has-error' : '' }}">
								<label for="priviledges" class="control-label">Priviledges <small><em>NB: The menu will only be available to the selected users</em></small></label>
								<select name="priviledges[]" id="priviledges" class="form-control" multiple="multiple" value="{{ $menu->priviledges }}">
									@foreach ($menu->roles as $role)
									<option value="{{ $role->id }}" selected> {{ $role->name }} </option>
									@endforeach
									@foreach ($roles as $role)
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
								<select name="position" class="form-control" id="position" value="{{ $menu->position }}">
									@for ($i = 1; $i <= $allMenus->count()+1; $i++)
									@if ($i==$menu->position)
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
								<input type="radio" name="visible" value="1" {{ $menu->visible==1 ? 'checked' : '' }}> Yes
								<input type="radio" name="visible" value="0" {{ $menu->visible==0 ? 'checked' : '' }}> No

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
									<option value='{{ $icon->id }}' data-path="{{ $icon->icon_path }}" {{ ($menu->icon_id == $icon->id)?"selected":"" }} data-label='{{$icon->icon_name}}'>{{$icon->icon_name}}</option>
									@endforeach
								</select>
								@if ($errors->has('icon'))
								<span class="help-block">
									<strong>{{ $errors->first('icon') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group">
								<button data-toggle="tooltip" data-placement="left" title="Save Menu" class="btn btn-primary btn-flat pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script') 
<script type="text/javascript">
	function hideOrUnhide(id,visible) {
		$('.gif').css('display', 'block');
		$.post('{{ url('admin/submenu_management/hideOrUnhide') }}', {id:id,visible:visible}, function(data) {
			$('.gif').css('display','none');
			$('#menu-saved-info').fadeIn('fast').delay(1000).fadeOut('fast');
			$('.draggable-menu').load(location.href + " .draggable-menu>*","");
			$('#ix').load(location.href + " #ix>*","");
		});
	}
	function moveMenu(id,name) {
		$('#id').val(id);
		$('#return_id').val({{ $menu->id }});
		$('#submenu_name').val(name);
		$('#movesubmenu-modal .modal-title b').text(name);
		modal = $('#movesubmenu-modal');
		modal.modal();
		// alert(id);
	}
	$('#save-moved').on('click',function(e){
		e.preventDefault();
		var name = $('#submenu_name').val();
		if(confirm('The '+name+' submenu will be moved to ' +
					$('#menu_id option:selected').text() +
					' in the '+ $('#menu_id option:selected').data('role') +
					' role. Do you want to continue?')){
			$('#frm-movesubmenu').submit();
		}
		$('#movesubmenu-modal').modal('hide');
		// alert();
	})
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
	function formatMenu(menu) {          
		var originalOption = menu.element;
		var label = $(originalOption).text();
		var val = $(originalOption).val();
		if(!val) return label;
		var resp = $('<span><i style=\"margin-top:1px\" class=\"pull-right\">' + $(originalOption).data('role') + '</i> ' + $(originalOption).data('menu') + '</span>');
		return resp;
	}
	$('#list-icon,#icon').select2({
		width: "100%",
		templateResult: format,
		templateSelection: format
	});
	$('#menu_id').select2({
		width: "100%",
		templateResult: formatMenu,
		templateSelection: formatMenu
	});

</script>
@endsection