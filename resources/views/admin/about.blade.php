@extends('layouts.header')
@section('breadcrumb')
	<ol class="breadcrumb pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-question"> About</i></li>
	</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
	  STUDENT INFORMATION MANAGEMENT SYSTEM
	</div>
	<div class="panel-body">
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				Version:  1.0<br>
				<a href="#" target="blank">Privacy Policy</a><br>
				<a href="#" target="blank"">Terms of Conditions</a>
				<hr>
				<p>Developed & Maintained by <a target="blank" href="https://github.com/amoschihi">Amos Chihi</a></p>
			</div>
		</div>
	</div>
</div>
@endsection