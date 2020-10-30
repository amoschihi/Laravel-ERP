@extends('layouts.student.master')
@section('content')
@include('students.popups.academic')
@include('students.popups.transcript')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-o"></i> Transcript</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ url('home') }}">Home</a></li>
			<li><i class="fa fa-file"></i> Transcript</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2><i class="fa fa-registered"></i><strong>Transcript</strong></h2>
				<div class="panel-actions">
					<a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
					<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="fa fa-times"></i></a>
				</div>
			</div>

			<div class="panel-body " style="height:220px; padding: 0px;">
				<div class="col-md-12">
					
					<button id="transcripts" data-slip="{{$student->student_id}}" data-level="{{ $currentMarks->count()!=null?$currentMarks[0]->level_id:(request('level_id')==null?$levels->where('level_id', $student->level_id)->first()->level_id:$levels->where('level_id',request('level_id'))->first()->level_id) }}" class="btn btn-danger">Print</button>
				</div>
			</div>


		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$(document).on('click', '#transcripts', function(event) {
		$('#academic-modal').modal()
		$('#aca').on('change',function() {
			$('#academic-modal').modal('hide')
      		academic_id = $(this).val()
      		student_id = $('#transcripts').data('slip')
      		level_id = $('#transcripts').data('level')
			$("#loader").modal('show');
			$.post('{{ route('get.transcript') }}', {student_id:student_id,academic_id:academic_id,level_id:level_id}, function(data) {
				$("#loader").modal('hide')
				$('#getTranscript').html(data);
				$('#transcript').modal('show');
				$('[data-toggle="tooltip"]').tooltip();
				$('#printTranscript').click(function(event) {
					w=window.open();
					w.document.write($('div.printTranscript').html());
					w.print();
					w.close();
				});
			})

    	})
	});
</script>
@endpush