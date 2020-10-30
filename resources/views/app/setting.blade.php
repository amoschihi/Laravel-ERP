@extends('layouts.header')
@section('title','Settings')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"> Home</i></li>
	<li class="active"><i class="fa fa-gear"> Settings</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		@if (session('whoIsLoggedIn') == 'admin')
		<div class="pull-right">
			<div class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<button class="btn btn-primary btn-sm">Advanced Settings <i class="fa fa-caret-down"></i></button> 
				</a>
				<ul class="dropdown-menu dropdown-user dropdown-menu-right">
					<li><a data-toggle="modal" data-target="#importIcons" class="btn btn-block btn-default"><i class="fa fa-download fa-fw"></i> Import Icons</a>
					</li>
					<li class="divider"></li>
					<li><a href="{{ route('view.icons') }}" class="btn btn-block btn-default"><i class="fa fa-list fa-fw"></i> Available Icons</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
				<div class="modal" id="importIcons">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Import an Excel or a CSV File</h4>
							</div>
							<div class="modal-body">
								<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('import.icons') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
									<input class="form-control" type="file" name="import_icons" />
									{{csrf_field()}}
									<button class="btn btn-success">Import</button>
								</form>
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		<i class="fa fa-gear"></i> Application Settings
		@if(session('info'))
		@component('components.alert')
		@slot('type')
		success
		@endslot
		{{session('info')}}
		@endcomponent
		@endif
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<form action="{{ url('admin/settings/create') }}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="appname" class="control-label">Application Name</label>
						<input type="text" name="appname" value="{{ $app->appname ? $app->appname : '' }}" class="form-control">
					</div>
					<div class="form-group">
						<label for="Logo" class="control-label">Logo</label>
						<input type="file" name="logo" class="form-control" value="">
					</div>
					<div class="form-group">
						<label for="Favicon" class="control-label">Favicon</label>
						<input type="file" name="favicon" class="form-control">
					</div>
					<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
				</form>	
			</div>
			<div class="col-md-6">
				<label>Show Notifications</label>
				<div class="toggleWrapper">
					{{csrf_field()}}
					<input type="checkbox" data-setting="notifications" id="dn" class="dn">
					<label for="dn" class="toggle"><span class="toggle__handler"></span></label>
				</div>
			</div>
		</div>	
	</div>	
</div>
@endsection
@section('script') 
<script type="text/javascript">
	$('#dn').prop('checked', {{$app->notifications==1?'true':'false'}});
	$('#dn').change(function() {
		if($('#dn').prop('checked')==true) {
			state = 1;
		}else{
			state = 0;
		}
		setting = $('#dn').data("setting");
		$.post('{{ url('admin/settings/update') }}', {state:state,setting:setting}, function(data) {
			location.reload(true);
		});
	});
</script>
@endsection
