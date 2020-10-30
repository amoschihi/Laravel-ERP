<!-- Modal -->
<div class="modal fade" id="school-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <label for="college">College</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <span class="fa fa-university"></span>
                </div>
                <select name="college" id="college" class="form-control">
                 
                </select>
              </div>
          </div>
          <div class="col-sm-6">
            <label for="school_name">School name</label>
            <input type="text" name="school_name" id="school_name" class="form-control" placeholder="School name"> 
            <br>
            <label for="school_name">School director</label>
            <input type="text" name="school_director" id="school_director" class="form-control" placeholder="School director"> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-school" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>