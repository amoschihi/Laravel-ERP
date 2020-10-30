<div class="panel panel-info">
	<div class="panel-heading">
		<div class="pull-left">
			Cases: {{ $displines->count() }}
		</div>
		&nbsp;
		@if (session('info'))
		@component('components.alert')
		    @slot('type')
		        success
		    @endslot
		    {{ session('info') }}
		@endcomponent
		@endif
		<a id="btn_add" data-target="#new-incident-modal" data-toggle="modal" class="btn btn-primary btn-sm pull-right">New incident</a>
		<div hidden="hidden" class="alert alert-danger" id="deletedincidents" data-dismiss="alert">
			<span class="close">&times;</span>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table" id="datatale" >
				<thead>
					<tr>
						<th><input type="checkbox" id="check_all_incidents"></th>
						<th>Date</th>
						<th>Description</th>
						<th>Victim</th>
						<th>Referrer</th>
						<th>Action taken</th>
					</tr>
				</thead>
				<tbody>
					@foreach($displines as $displine)
					<tr>
						<td><input type="checkbox" class="checked_incidents" data-id="{{$displine->id}}"></td>
						<td>{{$displine->created_at->diffForHumans()}}</td>
						<td>{{$displine->description}}</td>
						<td>{{$displine->victim}}</td>
						<td>{{$displine->referrer}}</td>
						<td>{{$displine->action_taken}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-2">
				<a class="btn btn-success btn-flat" id="edit_selected_incidents" data-edit="edit">Edit selected</a>
			</div>
			<div class="col-md-2">
				<a class="btn btn-danger btn-flat" id="delete_selected_incidents" data-delete="delete">Delete selected</a>
			</div>
		</div>
	</div>
</div>
