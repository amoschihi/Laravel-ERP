<!-- Modal -->
<div class="modal fade" id="new-incident-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Incident</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('new.incident') }}" method="POST" id="newincident">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="student_id" value="{{$st->student_id}}">
            <div class="col-sm-6">
              <label for="victim">Victim</label>
              <input type="text" name="victim" id="victim" class="form-control" placeholder="Victim"> 
            </div>
            <div class="col-sm-6">
              <label for="referrer">Referrer</label>
              <input type="text" name="referrer" id="referrer" class="form-control" placeholder="Referrer"> 
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label for="m_cat">Description</label>
              <textarea name="description" id="description" class="form-control"> </textarea>
            </div> 
            <div class="col-sm-6">
              <label for="m_exam">Action Taken</label>
              <input type="text" name="action_taken" id="action" class="form-control" placeholder="Action Taken"> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="document.getElementById('newincident').submit();" id="save-incident" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>