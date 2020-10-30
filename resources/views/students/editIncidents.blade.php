<div class="panel panel-info">
  <div class="panel-heading"> 
    Editing {{$incidents->count()}} Incidents
  </div>
  <div class="panel-body">
    <form action="{{ url('admin/incidents/'.$ids) }}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Description</th>
            <th>Victim</th>
            <th>Referrer</th>
            <th>Action Taken</th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < @count($ids); $i++)
          @foreach ($incidents as $incident)
          <tr>
            <td>
              <textarea name="description[]" class="form-control">{{$incident->description}}</textarea>
            </td>
            <td>
              <input type="text" name="victim[]" class="form-control" value="{{$incident->victim}}">
            </td>
            <td>
              <input type="text" name="referrer[]" class="form-control" value="{{$incident->referrer}}">
            </td>
            <td>
              <input type="text" name="action_taken[]" class="form-control" value="{{$incident->action_taken}}">
            </td>
          </tr>
          @endforeach
          @endfor
          <tr>
            <td colspan="2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>&nbsp;
              <a href="{{ url('admin/students/'.$incident->student_id) }}" class="btn btn-default"> <i class="fa fa-fast-backward"></i> Cancel</a>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

