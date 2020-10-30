@extends('layouts.header')
@section('title','Agents')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
  <li><i class="fa fa-home"> Home</i></li>
  <li class="active"><i class="fa fa-suitcase"> Agents</i></li>
</ol>
@endsection
@section('content')
@include('agents.popups.newAgent')
<div class="panel panel-info">
 <div class="panel-heading">
   Agents
   <a name="btn_add" id="btn_add" data-target="#agentModal" data-toggle="modal" class="btn btn-primary btn-flat btn-sm pull-right">New Agent</a>
 </div>
 <div class="panel-body">
  <div id="printDiv" class="table-responsive">
    <table class="table table table-hover table-striped table-condensed" id="datatable">
      <thead><th>
        <tr>
         <th><input type="checkbox" name="check_all" id="check_all" value="">
           <th>National ID</th>
           <th>Names</th>
           <th>Sex</th>
           <th>Location</th>
           <th>Contact</th>
         </tr>
       </thead>
       <tbody>
        @foreach($agents->all() as $agent)
        <tr>
          <td><input type="checkbox" class="checkbox" name="selected_id[]" value="{{$agent->id}}"></td>
          <td>{{ $agent->national_id }}</td>
          <td><a href="{{ url('admin/agents/'.$agent->id) }}"> {{ $agent->name }}</a></td>
          <td>{{ $agent->gender=='F' ? 'Female' : 'Male' }}</td>
          <td>{{ $agent->location }}</td>
          <td>{{ $agent->contact }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="panel-footer">
 <div class="row">
   <div class="col-md-2">
     <button class="btn btn-success">Edit selected</button>
   </div>
   <div class="col-md-2">
     <button class="btn btn-danger" onclick="deleteConfirm();">Delete selected</button>
   </div>
 </div>
</div>
</div>
@endsection
@push('bottom')
  <script type="text/javascript">
  $(document).ready(function() {
    function deleteConfirm() {
      var result = confirm("Do you really want to delete this records");

      return result;
    }

    // $('#check_all').on('click',function() {
    //   if(this.checked) {
    //     $('.checkbox').each(function() {
    //       this.checked = true;
    //     });
    //   }else {
    //     $('.checkbox').each(function() {
    //       this.checked = false;
    //     });
    //   }
    // });
    $(document).on('click', '#check_all', function() {
    $(':checkbox.checkbox').prop('checked',this.checked);
  });

    $('.checkbox').on('click', function() {
      if($('.checkbox:checked').length == $('.checkbox').length) {
        $('#check_all').prop('checked',true);
      }else{
        $('#check_all').prop('checked',false);
      }
    });
  });
</script>
@endpush
