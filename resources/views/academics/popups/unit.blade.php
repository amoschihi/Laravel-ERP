<!-- Modal -->
<div class="modal fade" id="unit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frm-create-unit">
          <div class="row">
            <div class="col-sm-6">
              <label for="course">Course</label>
              <select name="course" id="course" class="form-control">
              </select>
            </div>
            <div class="col-sm-6">
              <label for="level">Level</label>
              <select name="level" id="levl" class="form-control">
              </select>
            </div>
            <div class="col-sm-6">
              <label for="unit_name">Unit Name</label>
              <input type="text" name="unit_name" id="unit_name" class="form-control" placeholder="Unit Name"> 
            </div>
            <div class="col-sm-6">
              <label for="unit_code">Unit Code</label>
              <input type="text" name="unit_code" id="unit_code" class="form-control" placeholder="Unit code"> 
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label for="unit_hours">Unit Hours</label>
              <input type="text" name="unit_hours" id="unit_hours" class="form-control" placeholder="Unit hours"> 
            </div>
            <div class="col-sm-6">
              <label for="unit_description">Unit Description</label>
              <input type="text" name="unit_description" id="unit_description" class="form-control" placeholder="Unit Name"> 
            </div>
            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-unit" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>