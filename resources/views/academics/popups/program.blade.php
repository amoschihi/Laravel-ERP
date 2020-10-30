<!-- Modal -->
<div class="modal fade" id="course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <label for="department">Department</label>
                <select name="department" id="department" class="form-control">
                </select>
          </div>
          <div class="col-sm-6">
            <label for="course_name">Course name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" placeholder="Course name"> 
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label for="course_length">Course length</label>
            <input type="text" name="course_length" id="course_length" class="form-control" placeholder="Course length"> 
          </div>
          <div class="col-sm-6">
            <label for="course_description">Course description</label>
            <input type="text" name="course_description" id="course_description" class="form-control" placeholder="Course description"> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-course" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>