<!-- Modal -->
<div class="modal fade" id="admtype-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Add Admission Type</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <label for="admtype">Admission Type Name</label>
            <input type="text" name="admissiontype_name" id="admtype_name" class="form-control" placeholder="Admission type name">
          </div>
          <div class="col-sm-6">
            <label for="mode">Mode</label>
            <div class="input-group">
              <select name="mode_id" id="mode_id" class="form-control">
                @foreach ($modes as $mode)
                {{-- expr --}}
                <option value="{{$mode->mode_id
                }}">{{$mode->mode_name
                }}</option>
                @endforeach
              </select>
              <div class="input-group-addon">
                <span class="fa fa-plus" id="add-more-mode"></span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <label for="admtype_description">Admission Type Description</label>
            <input type="text" name="admissiontype_description" id="admtype_description" class="form-control" placeholder="Admission type description">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-admtype" class="btn btn-primary">Save</button>
      </div>

    </div>
  </div>
</div>