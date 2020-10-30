<div class="row">
  <div class="panel panel-info">
    <div class="panel-heading"> 
      Registering {{$students->count()}} Applicants
    </div>
    <div class="panel-body">
      <form action="{{ url('admin/students/'.$ids) }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table">
          <thead>
            <tr>
              <th class="text-danger text-uppercase">Issue Registration No</th>
              <th class="text-uppercase"><i class="text-danger">Confirm</i> Surname</th>
              <th class="text-uppercase"><i class="text-danger">Confirm</i> Othernames</th>
              <th class="text-uppercase"><i class="text-danger">Join</i> Academic Year</th>
              <th class="text-uppercase"><i class="text-danger">Join</i> Trisemester</th>
              <th class="text-uppercase">Admission Date</th>
              <th class="text-danger">*REMARKS</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < @count($ids); $i++)
            @foreach ($students as $applicant)
            <tr>
              @if ($applicant->s_approved!=1)
              <td>
                <input style="color: blue;font-weight: bolder;text-transform: uppercase;" type="text" name="registration_no[]" class="form-control">
              </td>
              @else
              <td>
                <input style="color: green;font-weight: bolder;text-transform: uppercase;" type="text" name="registration_no[]" class="form-control" placeholder="Registered" value="{{$applicant->s_applicationno}}" readonly>
              </td>
              @endif
              <td>
                <input style="color:blue" type="text" name="s_surname[]" class="form-control" value="{{$applicant->s_surname}}" >
              </td>
              <td>
                <input style="color:blue" type="text" name="s_othernames[]" class="form-control" value="{{$applicant->s_othernames}}">
              </td>
              @if ($applicant->s_approved==1)
              <td>
                <select name="academic_year[]" id="academic_year" class="form-control" readonly>
                  <option value="{{$applicant->academic_id}}">{{$applicant->academic->academic_name}}</option>
                </select>
              </td>
              @else
              <td>
               <select style="color:blue" name="academic_year[]" id="academic_year" class="form-control">
                 @foreach ($academics as $academic)
                 {{-- expr --}}
                 <option value="{{$academic->academic_id}}">{{$academic->academic_name}}</option>
                 @endforeach
               </select>
             </td>
             @endif
             @if ($applicant->s_approved==1)
             <td>
              <select name="trisemester[]" id="trisemester" class="form-control" readonly>
                <option value="{{$applicant->trisemester}}">{{$applicant->trisemester}}</option>
              </select>
            </td>
            @else
            <td>
              <select style="color:blue" name="trisemester[]" id="trisemester" class="form-control">
                <option value="Trisemester 1">Trisemester 1</option>
                <option value="Trisemester 2">Trisemester 2</option>
                <option value="Trisemester 3">Trisemester 3</option>
                <option value="Trisemester 4">Trisemester 4</option>
              </select>
            </td>
            @endif
            @if ($applicant->s_approved!=1)
            <td>
              <input style="color: blue" type="text" name="admission_date[]" class="form-control" value="{{date('M d Y H:i:s A') }}">
            </td>
            @else
            <td>
              <input style="color: blue" type="text" name="admission_date[]" class="form-control" value="{{$applicant->s_admdate }}" readonly>
            </td>
            @endif
            @if ($applicant->s_approved!=1)
            {{-- expr --}}
            <td>
              <input style="color: green;font-weight: bolder;" type="text" name="remarks[]" class="form-control" value="Approved.">
            </td>
            @else
            <td>
              <input style="color: green;font-style: italic;" type="text" name="remarks[]" class="form-control" value="{{$applicant->remarks}}" readonly>
            </td>
            @endif
          </tr>
          @endforeach
          @endfor
          <tr>
            <td colspan="2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Save</button>&nbsp;
              <a href="{{ url('admin/applicants') }}" class="btn btn-default"> <i class="fa fa-fast-backward"></i> Cancel</a>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
</div>

