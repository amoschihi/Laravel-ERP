<!-- Modal -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Applicant Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="row">
       <div class="col-sm-6">
        <input type="hidden" name="graddate" id="graddate" value="">
        <input type="hidden" name="course_length" id="course_length" value="">
        <input type="hidden" name="course_name" id="course_name" value="">
        <input type="hidden" name="pstudent_id" id="pstudent_id" value="">
        <label for="issue-registration" class="text-danger text-uppercase">Issue Registration NO</label>
        <div class="input-group">
          <input style="color: blue;font-weight: bolder;text-transform: uppercase;" type="text" class="form-control" id="registration_no" name="registration_no">

          <div class="input-group-addon" id="generate_adm" title="Generate Registration No" style="cursor: pointer">
            <span class="fa fa-cogs"></span>
          </div>
        </div>
        <label for="surname" class="text-uppercase"><i class="text-danger">Confirm</i> Surname</label>
        <input style="color:blue" type="text" name="surname" class="form-control" id="r-surname">
        <label for="othernames" class="text-uppercase"><i class="text-danger">Confirm</i> Other Names</label>
        <input style="color:blue" type="text" name="othernames" class="form-control" id="r-othernames">
    </div>
    <div class="col-sm-6">
      <label for="academic-year" class="text-uppercase"><i class="text-danger">Join</i> Academic Year</label>
      <select style="color: blue" name="academic_year" id="r_academic" class="form-control">
         @foreach ($academics as $academic)
         <option value="{{$academic->academic_id}}">{{$academic->academic_name}}</option>
         @endforeach
     </select>
     <label for="trisemester" class="text-uppercase"><i class="text-danger">Join</i> Semester</label>
     <select style="color: blue" name="trisemester" id="r_trisemester" class="form-control">
         <option value="1">Semester 1</option>
         <option value="2">Semester 2</option>
         <option value="3">Semester 3</option>
     </select>
     <label for="admission_date" class="text-uppercase">Admission Date</label>
     <input style="color: blue" type="text" name="admission_date" class="form-control" id="r_admdate" value="">
 </div>
</div>
<div class="row">
   <div class="col-sm-12">
      <label for="remarks" class="text-danger"><i>*REMARKS</i></label>
      <input style="color: green;font-weight: bolder;" type="text" name="remarks" class="form-control" value="Approved." id="remarks">
  </div>
</div>
</div>
<div class="modal-footer">
    <div class="col-md-8"><i><span class="text-danger">NOTE: </span><span class="text-success">Once issued registration no, applicant becomes student; notified by SMS & Email</span></i></div>
    <div class="col-md-4"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save-registration" class="btn btn-primary"><i class="fa fa-save"></i> <span id="save">Save</span></button>
    </div>
</div>

</div>
</div>
</div>