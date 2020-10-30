@extends('layouts.student.master')
@section('content')
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
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-registered"></i> Registration Info</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ url('home') }}">Home</a></li>
			<li><i class="fa fa-registered"></i> Registration info</li>
		</ol>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h2><i class="fa fa-apple"></i> <strong>Personal Info</strong></h2>
		<div class="panel-actions">
			<a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
			<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
			<a href="{{ url('main_details') }}" class="btn-close"><i class="fa fa-times"></i></a>
		</div>
		@if (session('response'))
		@component('components.alert')
		@slot('type')
		success
		@endslot
		{{ session('response') }}
		@endcomponent
		@endif
	</div>

	<div class="panel-body">
		<form action="{{ url('main_details/'.$student->student_id) }}" method="post" enctype="multipart/form-data">
			<div class="col-xs-6 col-md-3">
				<h4>Surname</h4> <input type="text" name="s_surname" value="{{ $student->s_surname }}" class="form-control">
				<h4>Othernames</h4> <input type="text" name="s_othernames" value="{{ $student->s_othernames }}" class="form-control">
				<h4>Email Address</h4> <input type="text" name="s_emailaddress" value="{{ $student->s_emailaddress  }}" class="form-control" readonly>
				<h4>Contacts</h4> <input type="text" name="s_contacts" value="{{ $student->s_contacts }}" class="form-control">

			</div>
			<div class="col-xs-6 col-md-3">
				<h4>Date of Birth</h4> <input type="text" id="dob" name="s_dob" value="{{ $student->s_dob  }}" class="form-control">
				<h4>National ID</h4> <input type="text" name="s_nationalid" value="{{ $student->s_nationalid  }}" class="form-control" readonly>
				<h4>Denomination</h4> <input type="text" name="s_denomination" value="{{ $student->s_denomination }}" class="form-control">
				<h4>Home Address</h4> <input type="text" name="s_homeaddress" value="{{ $student->s_homeaddress  }}" class="form-control">

			</div>
			<div class="col-xs-6 col-md-3">
				<h4>District</h4> <input type="text" name="s_district" value="{{ $student->s_district  }}" class="form-control">
				<h4>Nationality</h4> <input type="text" name="s_country" value="{{ $student->s_country  }}" class="form-control">
				<h4>Gender</h4> <input type="radio" name="s_gender" value="M" {{ $student->s_gender=='M' ?'checked' : '' }}> Male <input type="radio" name="s_gender" value="F" {{ $student->s_gender=='F' ?'checked' : '' }}> Female
				{{ csrf_field() }}
			</div>
			<div class="col-xs-6 col-md-3">
				<table style="margin: 0 auto;">
					<thead>
						<tr class="info">
							<th class="student-id">{{ $student->s_surname }}'s Photo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="photo">
								<img src="{{ asset('storage/students/'.$student->s_photo) }}" class="student-photo" id="showPhoto">
								<input type="file" name="s_photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
							</td>
						</tr>
						<tr>
							<td style="text-align: center;background: #ddd">
								<input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse">
							</td>
						</tr>
					</tbody>
				</table>
				<h4 class="page-header"></h4>
				<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Update profile</button>
			</div>
		</form>
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#dob').datepicker({
		changeYear:true,
		changeMonth:true,
		dateFormat:'yy-mm-dd'
	});
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
@endpush