@extends('layouts.header')
@section('title','Student List')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"><a href=""> Home</a></i></li>
	<li><i class="fa fa-file"> Reports</i></li>
	<li class="active"><i class="fa fa-file-text-o"> Student List</i></li>
</ol>
@endsection
@section('content')

<style type="text/css">
caption {
	height: 50px;
	font-size: 20px;
	font-weight: bold;
}
</style>
<div class="panel panel-info">
	<div class="panel-heading">
		<b><i class="fa fa-apple"></i> Student Information</b><a data-toggle="tooltip" title="Sort & Filter" href="" class="pull-right" id="show-class-info"><i class="fa fa-filter"> Sort & Filter</i></a>
	</div>
	<div class="panel-body" style="padding-bottom:4px;">
		<p style="text-align: center;font-size: 20px;font-weight: bold;">Student Report</p>
		<p id="img" style="z-index: 1000; text-align: right; display: none;"><img src="{{ asset('img/loading-image.gif') }}"></p>
		<div class="show-student-info">

		</div>
	</div>
</div>
@include('academics.classes.classpopup')
@endsection
@section('script')
@include('scripts.classpopup')
<script type="text/javascript">
	$(document).on('click','#btn-class-go',function(e) {
		e.preventDefault();
		$('#img').css('display','block')
		data = $('#frm-multi-class').serialize();
		$.get('{{ route('showStudentInfo') }}',data, function(data) { 
			$('#img').css('display','none')
			$('.show-student-info').empty().append(data);
			$('#choose-academic').modal('hide')
		});

	});
	$(document).on('click','.class-edit',function(e) {
		e.preventDefault();
		class_id = $(this).data('id');
		$('#img').css('display','block')
		$.get('{{ route('showStudentInfo') }}',{class_id:class_id}, function(data) {
			$('#img').css('display','none')
			$('.show-student-info').empty().append(data);
			$('#choose-academic').modal('hide')
		});

	});
	$(document).on('click', '#checkall', function() {
		$(':checkbox.chk').prop('checked',this.checked);
	});
</script>
@endsection