<!-- Modal -->
<div class="modal fade" id="department-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <label for="school">School</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <span class="fa fa-book"></span>
                </div>
                <select name="school" id="school" class="form-control">
                  
                </select>
              </div>
          </div>
          <div class="col-sm-6">
            <label for="school_name">Department name</label>
            <input type="text" name="department_name" id="department_name" class="form-control" placeholder="Department name"> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-department" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>