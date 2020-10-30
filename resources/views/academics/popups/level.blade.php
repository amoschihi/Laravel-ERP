<!-- Modal -->
<div class="modal fade" id="level-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Add Level</h5>
        <p></p>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <label for="year">Year</label>
            <div class="input-group">
              <select name="year_id" id="yr" class="form-control">
                @foreach ($years as $year)
                {{-- expr --}}
                <option value="{{$year->id
                }}">{{$year->year
                }}</option>
                @endforeach
              </select>
              <div class="input-group-addon">
                <span class="fa fa-plus" id="add-more-year"></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="semester">Semester</label>
            <div class="input-group">
              <select name="semester_id" id="sem" class="form-control">
                @foreach ($semesters as $semester)
                {{-- expr --}}
                <option value="{{$semester->id
                }}">{{$semester->semester
                }}</option>
                @endforeach
              </select>
              <div class="input-group-addon">
                <span class="fa fa-plus" id="add-more-semester"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-level" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>