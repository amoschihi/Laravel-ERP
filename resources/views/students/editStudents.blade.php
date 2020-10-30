<div class="row">
  <div class="panel panel-info">
    <div class="panel-heading"> 
      Editing {{$students->count()}} Students
    </div>
    <div class="panel-body">
      <form action="{{ url('admin/studentAjax/'.$ids) }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Admission No</th>
              <th>Surname</th>
              <th>Other Names</th>
              <th>Programme</th>
              <th>Home Address</th>
              <th>Email Address</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < @count($ids); $i++)
            @foreach ($students as $student)
            <tr>
              <td>
                <input type="text" name="s_applicationno[]" class="form-control" value="{{$student->s_applicationno}}" >
              </td>
              <td>
                <input type="text" name="s_surname[]" class="form-control" value="{{$student->s_surname}}" >
              </td>
              <td>
                <input type="text" name="s_othernames[]" class="form-control" value="{{$student->s_othernames}}">
              </td>
              <td>
                <select name="course_id[]" id="" class="form-control">
                  <option value="{{$student->course_id}}">{{$student->course_name}}</option>
                </select>
              </td>
              <td>
                <input type="text" name="s_homeaddress[]" class="form-control" value="{{$student->s_homeaddress}}">
              </td>
              <td>
                <input type="text" name="s_emailaddress[]" class="form-control" value="{{$student->s_emailaddress}}">
              </td>
            </tr>
            @endforeach
            @endfor
            <tr>
              <td colspan="2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>&nbsp;
                <a href="{{ url('admin/students') }}" class="btn btn-default"> <i class="fa fa-fast-backward"></i> Cancel</a>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>

