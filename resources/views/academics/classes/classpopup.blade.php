<div class="modal fade" id="choose-academic" role="dialog">
	<div class="modal-dialog modal-xs">
		<section class="panel panel-default">
			<header class="panel-heading">Choose Academic</header>
			<form class="form-horizontal" id="frm-view-class" action="">
				<div class="panel-body">
					<div class="form-group">
						{{-- Level --}}
						<div class="col-sm-6">
							<label for="mode">Level</label>
							<div class="input-group">
								<select name="level_id" id="lvl" class="form-control">
									<option value="">.....................................</option>
									@foreach ($levels as $level)
									{{-- expr --}}
									<option value="{{$level->level_id
									}}">{{$level->level_name
									}}</option>
									@endforeach
								</select>
								<div class="input-group-addon">
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>
						{{-- Shift --}}
						<div class="col-sm-6">
							<label for="course">Course</label>
							<div class="input-group">
								<select name="course" id="cor" class="form-control">
									@foreach ($courses as $course)
									{{-- expr --}}
									<option value="{{$course->course_id}}">{{$course->course_name}}</option>
									@endforeach
								</select>
								<div class="input-group-addon">
									<span class="fa fa-plus" id="add-more-course"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<label for="academic-year">Academic Year</label>
							<div class="input-group">
								<select name="academic_id" id="academic" class="form-control">
									@foreach ($academics as $academic)
									{{-- expr --}}
									<option value="{{$academic->academic_id}}">{{$academic->academic_name}}</option>
									@endforeach
								</select>
								<div class="input-group-addon">
									<span class="fa fa-plus" id="add-more-academic"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<label for="adm_type">Admission Type</label>
							<div class="input-group">
								<select name="admissiontype_id" id="atype" class="form-control">
									@foreach ($admissiontypes as $admissiontype)
									{{-- expr --}}
									<option value="{{$admissiontype->admissiontype_id
									}}">{{$admissiontype->admissiontype_name
									}}</option>
									@endforeach
								</select>
								<div class="input-group-addon">
									<span class="fa fa-plus" id="add-more-admtype"></span>
								</div>
							</div>
						</div>

					</div>
				</div> 
			</form>
			<form action="#" id="frm-multi-class" method="get">
				<div class="panel panel-default">
					<div class="panel-heading">
						Class Information
						<button id="btn-class-go" type="button" class="btn btn-info btn-xs pull-right" style="margin-top: 5px;">Go</button>
					</div>
					<div class="panel-body" id="add-class-info" style="overflow-y: auto;height: 250px;">

					</div>
				</div>
			</form>
		</section>
	</div>
</div>