<!-- Modal -->
<div class="modal fade" id="semester-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Semester</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <label for="school_name">Semester</label>
            <input type="text" name="semester" id="semester" class="form-control" placeholder="Semester">
            <label for="school_name">Description</label>
            <input type="text" name="s_description" id="s_description" class="form-control" placeholder="Description">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-semester" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>