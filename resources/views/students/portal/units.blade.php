@extends('layouts.student.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-registered"></i> Unit Registration</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ url('home') }}">Home</a></li>
			<li><i class="fa fa-registered"></i> Register units</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2><i class="fa fa-registered"></i><strong>Unit Registration</strong></h2>
				<div class="panel-actions">
					<a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
					<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="fa fa-times"></i></a>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr>
							<th><input type="checkbox" name="" id=""></th>
							<th>Unit Code</th>
							<th>Unit Name</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($units as $u => $unit)
						<tr>
							<td><input type="checkbox" name="" id="" value="{{ $unit->unit_id }}"></td>
							<td>{{ $unit->unit_code }}</td>
							<td>{{ $unit->unit_name }}</td>
						</tr>
						@empty
							<tr>
								<td colspan="3" class="alert text-center alert-warning"><i class="fa fa-warning"></i> You have not reported for the current session</td>
							</tr>
						@endforelse
					</tbody>
				</table>
				<button class="btn btn-success">Register selected</button>
			</div>


		</div>
	</div>
</div>
@endsection