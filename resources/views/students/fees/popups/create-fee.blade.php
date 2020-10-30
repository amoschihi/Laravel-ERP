<!-- Modal -->
<div class="modal fade" id="create-fee-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Create School Fee</h5>
      </div>
      <form action="{{ url('admin/fees_management') }}" method="POST" id="createFee" class="createFeeForm">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-3">
              <label for="fee_academicyear">Fee Academic Year</label>
              <select name="academic_id" id="fee_academicyear" class="form-control" {{$student->academic_id ? 'disabled':null}}>
                <option selected disabled>...........Academic Year.............</option>
                @foreach ($academics as $academic)
                {{-- expr --}}
                <option value="{{$academic->academic_id}}" {{$academic->academic_id==$student->academic_id ? 'selected' : null }}>{{$academic->academic_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <label for="level">Year of Study</label>
              <select name="level_id" id="level_id" class="form-control" {{$student->level_id ? 'disabled':null}}>
                <option selected disabled>...........Year.............</option>
                @foreach ($levels as $level)
                  {{-- expr --}}
                  <option value="{{$level->year_id}}" {{$level->level_id==$student->level_id ? 'selected' : null }}>{{$level->year_id}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <label for="fee_semester">Fee Semester</label>
              <select name="semester_id" id="fee_semester" class="form-control" {{$student->semester_id ? 'disabled':null}}>
                <option selected disabled>...........Semester.............</option>
                @foreach ($semesters as $semester)
                  <option value="{{$semester->id}}" {{$semester->id==$student->semester_id ? 'selected' : null }}>{{$semester->s_description}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <label for="fee_mode">Fee Mode</label>
              <select name="mode_id" id="mode_id" class="form-control" {{$student->mode_id ? 'disabled':null}}>
                <option selected disabled>...........Mode of Study.............</option>
                @foreach ($modes as $mode)
                {{-- expr --}}
                <option value="{{$mode->mode_id}}" {{$mode->mode_id==$student->mode_id ? 'selected' : null }}>{{$mode->mode_name}}</option>
                @endforeach
              </select>
              
            </div>

          </div>
          <div class="row">
            <div class="col-sm-3">
              <input type="hidden" name="level_id" value="{{ $student->level_id }}">
              <input type="hidden" name="student_id" value="{{ $student->student_id }}">
              <label for="fee_amount">Fee Amount</label>
              <input type="text" name="fee_amount" id="fee_amount" class="form-control" required> 
            </div>
            <div class="col-sm-3">
              <label for="fee_detail">Fee Detail</label>
              <input type="text" name="fee_detail" class="form-control" id="fee_detail" required>
            </div>
            <div class="col-sm-3">
             <label for="fee_paydate">Fee Pay Date</label>
             <input type="text" name="fee_paydate" class="form-control" id="datepicker" required>
           </div>
           <div class="col-sm-3">
            <label for="fee_description">Fee Description</label>
            <input type="text" name="fee_description" class="form-control" id="fee_description" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="save-fee" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
</div>