<div class="modal" id="importModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Import an Excel or a CSV File</h4>
      </div>
      <div class="modal-body">
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('import.applicant') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
          <input class="form-control" type="file" name="import_file" />
          {{csrf_field()}}
          <button class="btn btn-success btn-flat">Import</button>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>