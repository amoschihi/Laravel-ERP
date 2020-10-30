@include('students.popups.academic')
<div class="panel panel-info">
	<div class="panel-heading">
		@if (session('info'))
		@component('components.alert')
		@slot('type')
		success
		@endslot
		{{ session('info') }}
		@endcomponent
		@endif
		<form method="GET" id="frm-rpl">
			<div class="pull-left">
				<select name="level_id" class="form-control" id="rpl">
					@foreach ($levels as $level)
					<option value="{{ $level->level_id }}" {{ (request('level_id') && $level->level_id==request('level_id')) || (!request('level_id') && $student->level_id==$level->level_id) ? "selected" : "" }}>{{ $level->level_description }}
					</option>
					@endforeach
				</select>
			</div>
			&nbsp;
			{{ $currentMarks->count() }} {{$currentMarks->count()>1 ? ' Units' : 'Unit'}} Enrolled
		</form>

		<a style="margin-top: -25px;" id="btn_add" data-target="#new-unit-modal" data-toggle="modal" class="btn btn-primary btn-sm pull-right">Enroll New</a>
		<div hidden="hidden" class="alert alert-danger" id="deletedUnits" data-dismiss="alert">
			<span class="close">&times;</span>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="col-md-12">
				<tr>
					<td>{{$st->s_applicationno}}: <span class="text-danger">{{$st->s_surname.', '.$st->s_othernames}}</span> </td>
					<td class="text-center text-success" style="font-style: italic;">Showing results for {{ $currentMarks->count()!=null?$currentMarks[0]->level_description:(request('level_id')==null?$levels->where('level_id',$studentLevelId)->first()->level_description:$levels->where('level_id',request('level_id'))->first()->level_description) }}</td>
					<td align="right">{{$student->course_name}}</td>
				</tr>
			</table>
			<table class="table" id="datatable" >
				<thead>
					<tr>
						<th><input type="checkbox" id="check_all_units"></th>
						<th>Unit Code</th>
						<th>Title</th>
						<th>Mod</th>
						<th>Assignment</th>
						<th>CAT</th>
						<th>Exam</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody id="marks">
					@foreach($currentMarks as $mark)
					<tr>
						<td><input type="checkbox" name="chkbox[]" class="checked_units" data-id="{{$mark->unit_id}}"></td>
						<td>{{ $mark->unit->unit_code }}</td>
						<td>{{ $mark->unit->unit_name }}</td>
						<td>{{ $mark->rep_status}}</td>
						<td>{{ $mark->m_assignment == null ? "-" : $mark->m_assignment }}</td>
						<td>{{ $mark->m_cat == null ? "-" : $mark->m_cat }}</td>
						<td>{{ $mark->m_exam == null ? "-" : $mark->m_exam }}</td>
						<td>{{ $mark->m_total_marks }}</td>
						<td>{{ $mark->m_grade == "*" ? $mark->m_grade."*" : $mark->m_grade }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-2">
				<input type="hidden" name="" id="student_id" value="{{ $st->student_id }}">
				<a class="btn btn-success btn-flat" id="edit_selected_units" data-edit="edit">Edit selected</a>
			</div>
			<div class="col-md-2">
				<a class="btn btn-danger btn-flat" id="delete_selected_units" data-delete="delete">Delete selected</a>
			</div>
			<div class="col-md-2">
				<a id="result" data-st="{{$st->student_id}}" data-level="{{ $currentMarks->count()!=null?$currentMarks[0]->level_id:(request('level_id')==null?$levels->where('level_id', $student->level_id)->first()->level_id:$levels->where('level_id',request('level_id'))->first()->level_id) }}" class="btn btn-warning btn-flat">Results</a>
			</div>
			<div class="col-md-2">
				<a id="transcripts" data-slip="{{$st->student_id}}" data-level="{{ $currentMarks->count()!=null?$currentMarks[0]->level_id:(request('level_id')==null?$levels->where('level_id', $student->level_id)->first()->level_id:$levels->where('level_id',request('level_id'))->first()->level_id) }}" class="btn btn-info btn-flat">Transcripts</a>
			</div>
		</div>
	</div>
</div>
@push('bottom')
	<script type="text/javascript">
		$('#rpl').on('change',function() {
			$('#frm-rpl').submit();
		})
	</script>
@endpush