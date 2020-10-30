<div class="panel panel-info">
  <div class="panel-heading"> 
    Editing {{$foundUnits->count()}} Units
  </div>
  <div class="panel-body">
    <form action="{{ url('admin/units/'.$ids) }}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Unit Code</th>
            <th>Unit Title</th>
            <th>Assignment</th>
            <th>CAT</th>
            <th>EXAM</th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < @count($ids); $i++)
          @foreach ($foundUnits as $unit)
          <tr>
            <td>
              <input type="text" name="unit_code[]" class="form-control" value="{{$unit->unit->unit_code}}" readonly>
            </td>
            <td>
              <input type="text" name="unit_name[]" class="form-control" value="{{$unit->unit->unit_name}}" readonly>
            </td>
            <td>
              <input type="text" name="m_assignment[]" class="form-control" value="{{$unit->m_assignment}}">
            </td>
            <td>
              <input type="text" name="m_cat[]" class="form-control" value="{{$unit->m_cat}}">
            </td>
            <td>
              <input type="text" name="m_exam[]" class="form-control" value="{{$unit->m_exam}}">
            </td>
          </tr>
          @endforeach
          @endfor
          <input type="hidden" name="student_id" id="" value="{{ $student_id }}">
          <tr>
            <td colspan="2">
              <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i> Update</button>&nbsp;
              <a href="{{ url('admin/students/'.$student_id) }}" class="btn btn-flat btn-default"> <i class="fa fa-fast-backward"></i> Cancel</a>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

