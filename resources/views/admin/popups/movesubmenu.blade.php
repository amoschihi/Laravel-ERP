<div class="modal" id="movesubmenu-modal" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
				<h5 class="modal-title"><i class="fa fa-arrow-alt"></i> Move Submenu: <b></b> </h5>
			</div>
			<form action="{{ url('admin/submenu_management/nestMenu') }}" id="frm-movesubmenu" class="form-horizontal" method="POST">
				<div class="modal-body">
					{{ csrf_field() }}
					<input type="hidden" id="id" name="id" value="">
					<input type="hidden" id="return_id" name="return_id" value="">
					<input type="hidden" id="submenu_name" name="submenu_name" value="">
					<label for="position" class="control-label">Select Menu Name to move to</label>
					<select name="menu_id" class="form-control" id="menu_id" value="" required>
						@foreach ($allMenus as $menu)
						<option value="{{ $menu->id }}" data-role="{{ $menu->roles[0]->name }}" data-menu="{{ $menu->menu_name }}">{{ $menu->menu_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button  id="save-moved" class="btn btn-flat btn-primary">
						<i class="fa fa-save"></i> Save
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
