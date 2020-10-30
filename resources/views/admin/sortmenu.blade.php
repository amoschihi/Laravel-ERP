@extends('layouts.header')
@push('head')
@include('admin.styles.sortmenu')
@endpush
@section('title','Menu Management - Sort Menu')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li><i class="fa fa-bars"> Menu management</i></li>
	<li class="active"><i class="fa fa-plus"> Sort menus</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		<a href="{{ url('admin/menu_management') }}" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
		<div class="pull-right" style="margin-top: -20px;">
			<menu id="nestable-menu">
				<button type="button" data-action="expand-all">Expand All</button>
				<button type="button" data-action="collapse-all">Collapse All</button>
			</menu>
		</div>
		<i class="fa fa-bars"></i> Sort All Menus <span id='menu-saved-info' style="display:none" class='pull-right text-success'><i class='fa fa-check'></i> Menus Saved !</span>
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
		<span class="gif"><img src="{{ asset('img/loading-image.gif') }}"></span>
		<div class="dd" id="nestable2">
			<ol class="dd-list">
				@foreach($menus as $menu)
				<li style="background: #ffffff" class="dd-item" data-role="{{ $menu->roles[0]->id }}" data-id="{{ $menu->id }}">
					<div class="dd-handle"><strong>{{ $menu->menu_name }}</strong> <i class="pull-right">Role: <strong>{{ $menu->roles[0]->name }}</strong></i> </div>
					<ol>
					@foreach($submenus->where('menu_id',$menu->id) as $submenu) 
						<li class="dd-item" data-id="{{ $submenu->id }}"><div class="dd-handle">{{ $submenu->menu_name }}</div></li>
					@endforeach
					</ol>
				</li>
				@endforeach
			</ol>
		</div>
	
		<textarea id="nestable2-output"></textarea>
			
			
			
	</div>
</div>
@endsection

@section('script') 
<script src="{{ asset('js/jquery.nestable.js') }} "></script>
	<script>
	
		$(document).ready(function()
		{
		
			var updateOutput = function(e)
			{
				var list   = e.length ? e : $(e.target),
					output = list.data('output');
				if (window.JSON) {
					ndata = window.JSON.stringify(list.nestable('serialize'));
					$('.gif').css('display', 'block');
					$.post('{{ route('menu.sortAll') }}', {menus:ndata}, function(data) {
						console.log(data);
						$('.gif').css('display','none');
						$('#menu-saved-info').fadeIn('fast').delay(1000).fadeOut('fast');
						$('#panel-body').load(location.href + " #panel-body>*","");
						$('#ix').load(location.href + " #ix>*","");
					});
					output.val(ndata);//, null, 2));
				} else {
					output.val('JSON browser support required for this demo.');
				}
			};
		
			// activate Nestable for list 
			$('#nestable2').nestable({
				group: 1,
				maxDepth: 2
			})
			.on('change', updateOutput);
		
			// output initial serialised data
			updateOutput($('#nestable2').data('output', $('#nestable2-output')));
		
			$('#nestable-menu').on('click', function(e)
			{
				var target = $(e.target),
					action = target.data('action');
				if (action === 'expand-all') {
					$('.dd').nestable('expandAll');
				}
				if (action === 'collapse-all') {
					$('.dd').nestable('collapseAll');
				}
			});
		
		});
	</script>
@endsection