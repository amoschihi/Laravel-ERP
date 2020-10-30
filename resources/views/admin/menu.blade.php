@extends('layouts.header')
@section('title','Menu Management')
@section('breadcrumb')
	<ol class="breadcrumb pull-right text-primary">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-gear"> Menu Management</i></li>
	</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<i class="fa fa-bars"></i> Menu Management
				<a href="{{ route('menu.sort') }}" style="margin-top: -5px;" class="btn btn-flat btn-default pull-right">Sort Menus</a>
				<span>&nbsp;&nbsp;</span>
				<a href="{{ url('admin/menu_management/create') }}" style="margin-top: -5px;" class="btn btn-flat btn-primary pull-right">Create New Menu</a>
				<span id='menu-saved-info' style="display:none" class='pull-right text-success'><i class='fa fa-check'></i> Menu Saved !</span>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped table-condensed" id="datatable">
					@if ($allMenus->count() > 0)
					<thead>
						<tr>
							<th>#</th>
							<th>Menu Name</th>
							<th>Sub menus(N<sup>o</sup>)</th>
							<th>Privilege(s)</th>
							<th>Visible</th>
							<th>Position</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						{{-- expr --}}
						@foreach ($allMenus->all() as $menu)
						{{-- expr --}}
						<tr>
							<td>{{$menu->id}}</td>
							<td><i class="{{ $menu->icon->icon_path or null }}"></i> {{ $menu->menu_name }} </td>
							<td>{{ $submenus->where('menu_id',$menu->id)->count() }}</td>
							<td> @foreach ($menu->roles as $role)
								<span class="btn btn-xs btn-default"> {{ $role->name }}</span>
							@endforeach</td>
							<td>@if ( $menu->visible == 1) Yes @else No @endif</td>
							<td>{{ $menu->position }}</td>
							<td>
								<a data-toggle="tooltip" title="Edit" href="{{ url('admin/menu_management/'.$menu->id.'/edit') }}" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> </a>
								<a data-toggle="tooltip" title="{{ $menu->visible==0?'Unhide':'Hide' }}" onclick="hideOrUnhide({{ $menu->id }},{{ $menu->visible }});" class="btn btn-xs {{ $menu->visible==1?'btn-success':'btn-warning' }}"><i class="fa {{ $menu->visible==1?'fa-eye':'fa-eye-slash' }}"></i> </a>
								<a data-toggle="tooltip" title="Delete" href="" onclick="event.preventDefault();swal('Delete is currently disabled','You can instead hide the menu by clicking the green hide button','error')//event.preventDefault();document.getElementById('').submit();" id="btn_delete">
									<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
								</a>
								<form id="" action="{{ url('admin/menu_management/'.$menu->id) }}" method="POST" style="display: none;">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
								</form>
							</td>
						</tr>
						@endforeach
						<span class="gif" style="z-index:1;margin-left:680px;margin-top:200px;position:absolute;display:none;"><img src="{{ asset('img/loading-image.gif') }}"></span>
					</tbody>
				</table>
				@else
				<p class="alert">No menus found</p>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script type="text/javascript">
		function hideOrUnhide(id,visible) {
		$('.gif').css('display', 'block');
		$.post('{{ url('admin/menu_management/hideOrUnhide') }}', {id:id,visible:visible}, function(data) {
			$('.gif').css('display','none');
			$('#menu-saved-info').fadeIn('fast').delay(1000).fadeOut('fast');
			$('#datatable').load(location.href + " #datatable>*","");
			$('#ix').load(location.href + " #ix>*","");
		});
	}
	</script>
@endsection