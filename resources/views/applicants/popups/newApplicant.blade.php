@include('academics.classes.classpopup')
<style type="text/css">
.student-photo {
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
.student-id {
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Record</h4>
      </div>
      <form action="{{ url('admin/applicants') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="program_id" id="program_id">
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse" style="text-decoration: none;"><i class="fa fa-apple"></i> Choose Academic</a>
                    <a class="pull-right" id="show-class-info"><i class="fa fa-plus"></i></a>
                  </div>
                  <div class="panel-collapse collapse in" id="collapse">
                    <div class="panel-body academic-detail">
                      <p data-toggle="tooltip" title="Having problem scrolling? Dismiss modal and open again to fix"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <b><i class="fa fa-apple"></i> Student Information</b>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3">
                  <!--Approved applicant admission number -->
                  <div class="form-group error">
                    <label for="NationalId">National ID</label>
                    <input type="number" name="s_nationalid" class="form-control" placeholder="National ID" maxlength="8" value="" required>
                  </div>

                  <div class="form-group error">
                    <label for="Surname">Surname</label>
                    <input type="text" name="s_surname" class="form-control" placeholder="Surname" value="" required>
                  </div>

                  <div class="form-group error">
                    <label for="OtherNames">Other Names</label>
                    <input type="text" name="s_othernames" class="form-control" placeholder="Other Names" value="" required>
                  </div>
                  <div class="form-group error">
                    <label for="gender">Gender</label>
                    <fieldset>
                      <legend></legend>
                      <table style="width:100%;margin-top: -14px;">
                        <tr style="border-bottom: 1px solid #ccc;">
                          <td>
                            <label>
                              <input type="radio" name="s_gender" id="s_gender" value="M" required> Male
                            </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="s_gender" id="s_gender" value="F" required> Female
                            </label>
                          </td>
                        </tr>
                      </table>
                    </fieldset>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group error">
                    <label for="ParentFullname">Parent Full Names</label>
                    <input type="text" name="parentfullname" placeholder="Parent names" class="form-control" value="" required>
                  </div>

                  <div class="form-group error">
                    <label for="ParentTel">Parent Tel</label>
                    <input type="text" name="p_contacts" class="form-control" value="">
                  </div>
                  <div class="form-group error">
                    <label for="Homeaddress">Home Address</label>
                    <input type="text" name="s_homeaddress" class="form-control" value="">
                  </div>
                  <div class="form-group error">
                    <label for="District">District</label>
                    <input type="text" name="s_district" class="form-control" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group error">
                    <label for="EmailAddress">Email Address</label>
                    <input type="text" name="s_emailaddress" class="form-control" value="" required placeholder="Email Address">
                  </div>
                  <div class="form-group error">
                    <label for="dob">D.O.B</label>
                    <input type="text" name="s_dob" id="s_dob" class="form-control" placeholder="Date of Birth" value="" required>
                  </div> 

                  <div class="form-group error">
                    <label for="Contact">Mobile No</label>
                    <input type="text" name="s_contacts" max="10" class="form-control" placeholder="Mobile No" value="" required>
                  </div>
                  <div class="form-group error">
                    <label for="DateApplied">Date applied</label>
                    <input type="text" name="date_applied" class="form-control" value="{{ date('Y-m-d H:i:s') }}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group form-group-login">
                    <label for="agent_id">Applicant photo</label>
                    <table style="margin: 0 auto;">
                      <thead>
                        <tr class="info">
                          <th class="student-id">ID {{ sprintf("%05d",1) }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="photo">
                            <img src="{{ asset('img/profile.png') }}" class="student-photo" id="showPhoto">
                            <input type="file" name="s_photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
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
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group error">
                    <label for="Country">Country</label>
                    <input type="text" name="s_country" id="name" class="form-control" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group error">
                    <label for="gender" class="control-label">Denomination</label>
                    <input type="text" class="form-control" name="s_denomination" id="s_denomination">
                  </div> 
                </div>
                <div class="col-md-3">
                  <div class="form-group error">
                    <label for="agent_id">Agent Name</label>
                    <select name="agent_id" class="form-control">
                      <option selected="" value="">Select Agent</option>
                      @foreach ($agents->all() as $agent)
                      <option value="{{$agent->id}}">{{$agent->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>