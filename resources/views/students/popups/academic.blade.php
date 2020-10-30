<!-- Modal -->
<div class="modal fade" id="academic-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Academic Year</h5>
      </div>
      <div class="modal-body">
        <label for="school_name">Academic Year</label>
        <select name="academic_id" id="aca" class="form-control">
          <option selected disabled>-----Choose academic year-----</option>
          @foreach ($academics as $academic)
          <option value="{{ $academic->academic_id }}">{{ $academic->academic_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="modal-footer">
      </div>

    </div>
  </div>
</div>