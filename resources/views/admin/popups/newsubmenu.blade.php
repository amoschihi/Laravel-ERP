<div class="modal" id="submenu-modal" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
				<h5 class="modal-title"><i class="fa fa-plus"></i> New Submenu</h5>
			</div>
			<form action="{{ url('admin/submenu_management') }}" id="frm-submenu" class="form-horizontal" method="POST">
				<div class="modal-body">
					{{ csrf_field() }}
					<input type="hidden" name="menu_id" value="{{ $menu->id }}">
					@foreach ($menu->roles as $role)
					@php $role = $role->name; @endphp
					@endforeach
					<input type="hidden" name="role" value="{{ $role }}">
					<label for="menu_name" class="control-label">Menu Name</label>
					<input type="text" name="menu_name" class="form-control" value="" required>
					<label for="position" class="control-label">Position</label>
					<select name="position" class="form-control" id="position" value="" required>
						@for ($i = 1; $i <= $submenus->where('menu_id',$menu->id)->count()+1; $i++)
						@if ($i==$submenus->where('menu_id',$menu->id)->count())
						<option value="{{ $i }}">{{ $i }}</option>
						@else 
						<option value="{{ $i }}" selected>{{ $i }}</option>
						@endif
						@endfor
					</select>
					<div>
						<label for="visible" class="control-label">Visible</label>
						<input type="radio" name="visible" value="{{ $errors->has('visible') ? old('position') : 1 }}" checked required> Yes
						<input type="radio" name="visible" value="{{ $errors->has('visible') ? old('position') : 0 }}" required> No
					</div>
					<div>
						<label for="menu_name" class="control-label">Icon</label>
						<select name="icon_id" id="icon" class="form-control" value="" style="font-family: 'FontAwesome', Helvetica;">
							<option value="" disabled selected>** Select an Icon</option>
							@foreach ($icons as $icon)
							<option value='{{ $icon->id }}' data-path="{{ $icon->icon_path }}" data-label='{{$icon->icon_name}}'>{{$icon->icon_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="save-comment" class="btn btn-flat btn-primary">
						<i class="fa fa-save"></i> Save
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
