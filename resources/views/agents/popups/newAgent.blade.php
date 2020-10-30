<style type="text/css">
.agent-photo {
  height: 160px;
  padding-left: 1px;
  padding-right: 1px;
  border: 1px solid #ccc;
  background: #eee;
  width: 140px;
  margin: 0 auto;
}
.photo > input[type='file'] {
  display: none;
}
.photo {
  width: 30px;
  height: 30px;
  border-radius: 100%;
}
.agent-id {
  background-repeat: repeat-x;
  border-color: #ccc;
  padding: 5px;
  text-align: center;
  background: #eee;
  border-bottom: 1px solid #ccc;
}
.btn-browse {
  border-color: #ccc;
  padding: 5px;
  text-align: center;
  background: #eee;
  border: none;
  border-top: 1px solid #ccc;
}
fieldset {
  margin-top: 5px;
}

fieldset legend {
  display: block;
  width: 100%;
  padding: 0;
  font-size: 15px;
  line-height: inherit;
  color: #797979;
  border: 0;
  border-bottom: 1px solid #e5e5e5;
}

</style>

<div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Record</h4>
      </div>
      <form action="{{ url('admin/agents') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="panel panel-default">
            <div class="panel-heading">
              <b><i class="fa fa-apple"></i> Agent Information</b>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4">
                  <!--Approved applicant admission number -->
                  <div class="form-group error">
                    <label for="NationalId">National ID</label>
                    <input type="number" name="national_id" class="form-control" placeholder="National ID" maxlength="8" value="" required>
                  </div>

                  <div class="form-group error">
                    <label for="Surname">Surname</label>
                    <input type="text" name="surname" class="form-control" placeholder="Surname" value="" required>
                  </div>

                  <div class="form-group error">
                    <label for="OtherNames">Other Names</label>
                    <input type="text" name="othernames" class="form-control" placeholder="Other Names" value="" required>
                  </div>
                  <div class="form-group error">
                    <label for="dob">Date of Birth</label>
                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth" value="" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group error">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" placeholder="Contact" class="form-control" value="" required>
                  </div>
                  <div class="form-group error">
                    <label for="gender">Gender</label>
                    <fieldset>
                      <legend></legend>
                      <table style="width:100%;margin-top: -14px;">
                        <tr style="border-bottom: 1px solid #ccc;">
                          <td>
                            <label>
                              <input type="radio" name="gender" id="gender" value="M" required> Male
                            </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="gender" id="gender" value="F" required> Female
                            </label>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </div>
                  <div class="form-group error">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-group-login">
                    <label for="agent_id">Agent photo</label>
                    <table style="margin: 0 auto;">
                      <thead>
                        <tr class="info">
                          <th class="agent-id">ID {{ sprintf("%05d",$agents->count()+1) }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="photo">
                            <img src="{{ asset('img/profile.png') }}" class="agent-photo" id="showPhoto">
                            <input type="file" name="photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align: center;background: #ddd">
                            <input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@section('script')
<script type="text/javascript">
  $('#dob').datepicker({
    changeYear:true,
    changeMonth:true,
    dateFormat:'yy-mm-dd'
  });
  $('#browse_file').on('click', function() {
    $('#photo').click();
  });

  $('#photo').on('change',function(e){
    showFile(this, '#showPhoto');
  })
  {{-- ===================== --}}
  function showFile(fileInput,img,showName) {
    if(fileInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(img).attr('src',e.target.result);
      }
      reader.readAsDataURL(fileInput.files[0]);
    }
    $(showName).text(fileInput.files[0].name)
  };
</script>
@endsection