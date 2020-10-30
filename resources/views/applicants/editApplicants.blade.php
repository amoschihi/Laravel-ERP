<div class="row">
  <div class="panel panel-info">
    <div class="panel-heading"> 
      Editing {{$applicants->count()}} Applicants
    </div>
    <div class="panel-body">
      <form action="{{ url('admin/applicants/'.$ids) }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Surname</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Home Address</th>
              <th>Email Address</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < @count($ids); $i++)
            @foreach ($applicants as $applicant)
            <tr>
              <td>
                <input type="text" name="s_surname[]" class="form-control" value="{{$applicant->s_surname}}" >
              </td>
              <td>
                <input type="text" name="s_othernames[]" class="form-control" value="{{$applicant->s_othernames}}">
              </td>
              <td>
                <input type="text" name="s_contacts[]" class="form-control" value="{{$applicant->s_contacts}}">
              </td>
              <td>
                <input type="text" name="s_homeaddress[]" class="form-control" value="{{$applicant->s_homeaddress}}">
              </td>
              <td>
                <input type="text" name="s_emailaddress[]" class="form-control" value="{{$applicant->s_emailaddress}}">
              </td>
            </tr>
            @endforeach
            @endfor
            <tr>
              <td colspan="2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>&nbsp;
                <a href="{{ url('admin/applicants') }}" class="btn btn-default"> <i class="fa fa-fast-backward"></i> Cancel</a>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>

