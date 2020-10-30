@extends('layouts.header')

@section('content')
@section('title','Admin - Profile')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-dashboard"> Dashboard</i></li>
	<li><i class="fa fa-user"> Profile</i></li>
</ol>
@endsection
<style type="text/css">
.student-photo {
	height: 160px;
	padding-left: 1px;
	padding-right: 1px;
	border: 1px solid #ccc;
	background: #eee;
	width: 140px;
	margin: 0 auto;
}
.photo > input[type='file'] {
	display: none;
}
.photo {
	width: 30px;
	height: 30px;
	border-radius: 100%;
}
.student-id {
	background-repeat: repeat-x;
	border-color: #ccc;
	padding: 5px;
	text-align: center;
	background: #eee;
	border-bottom: 1px solid #ccc;
}
.btn-browse {
	border-color: #ccc;
	padding: 5px;
	text-align: center;
	background: #eee;
	border: none;
	border-top: 1px solid #ccc;
}
</style>
<div class="panel panel-info">
	<div class="panel-heading">
		Your Profile 
		@if (session('nophoto'))
		{{-- expr --}}
		@component('components.alert')
			@slot('type')
				warning
			@endslot
			{{ session('nophoto') }}
		@endcomponent
		@endif
	</div>
	<div class="panel-body">
		<form action="{{ url('admin/profile/'.Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="form-control" value="{{ $user->email }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-login">
						<table style="margin: 0 auto;">
							<thead>
								<tr class="info">
									<th class="student-id"> {{ $user->name }}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="photo">
										<img src="{{ $user->picturefile ? asset('storage/users/'.$user->picturefile) : asset('img/profile.png') }}" class="student-photo" id="showPhoto">
										<input type="file" name="picturefile" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
									</td>
								</tr>
								<tr>
									<td style="text-align: center;background: #ddd">
										<input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Save">
				<a type="submit" class="btn btn-default btn-flat" href="{{ url('admin/change_password/') }}"> Change Password</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('#browse_file').on('click', function() {
		$('#photo').click();
	});

	$('#photo').on('change',function(e){
		showFile(this, '#showPhoto');
	})
	{{-- ===================== --}}
	function showFile(fileInput,img,showName) {
		if(fileInput.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$(img).attr('src',e.target.result);
			}
			reader.readAsDataURL(fileInput.files[0]);
		}
		$(showName).text(fileInput.files[0].name)
	};
</script>
@endsection