@extends('layouts.header')
@section('title','Comments')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-dashboard"> Dashboard</i></li>
	<li class="active"><i class="fa fa-comments"> Comments</i></li>
</ol>
@endsection
@section('content')
@include('admin.popups.compose')
<div class="panel panel-info">
	<div class="panel-heading">
		<i class="fa fa-comments"></i> Comments
		<a href="#comment-modal" style="margin-top: -5px;" data-toggle="modal" data-target="#comment-modal" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Compose</a>
	</div>
	<div class="panel-body">
		<table class="table" id="datatable">
			<thead>
				<tr>
					<th>#</th>
					<th>Subject</th>
					<th>Body</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($comments as $key => $value)
				<tr>
					<td>{{ ++$key }}</td>
					<td>{{ $value->subject }}</td>
					<td>{{ $value->body }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="panel-footer">
		<a href="" class="btn btn-success"><i class="fa fa-paper-plane-o fa-lg"></i> Reply</a>
		<a href="" class="btn btn-danger"><i class="fa fa-trash-o fa-lg"></i> Delete</a>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {

		$('#frm-comment').on('submit', function(e) {
			e.preventDefault();

			if($('#subject').val() !='' && $('#body').val() !='')
			{
				var form_data = $(this).serialize();
				$.ajax({
					url: '{{ route('insertComment') }}',
					type: 'POST',
					data: form_data,
				})
				.done(function(data) {
					$('#frm-comment')[0].reset();
					$('#datatable').load(location.href + " #datatable>*","");
					if(data.message) {
						swal(data.message)
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
			else 
			{
				swal('','Subject and Body fields are required');
			}
			
		})
	});
</script>
@endsection