@extends('layouts.student.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-laptop"></i> News</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ url('home') }}">Home</a></li>
			<li><i class="fa fa-newspaper-o"></i>News</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2><i class="fa fa-newspaper-o "></i><strong>NEWS ROOM</strong></h2>
				<div class="panel-actions">
					<a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
					<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="fa fa-times"></i></a>
				</div>
			</div>

			<div class="panel-body">
				@forelse ($inbox as $in => $inb)
					<table class="table table-striped table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Subject</th>
								<th>Body</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ ++$in }}</td>
								<td>{{ $inb->subject }}</td>
								<td>{{ $inb->body }}</td>
							</tr>
						</tbody>
					</table>
				@empty
					<h4>No current news</h4>	
				@endforelse
			</div>


		</div>
	</div>
</div>
@endsection