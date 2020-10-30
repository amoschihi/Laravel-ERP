@extends('layouts.header')
@section('title','Students')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
  <li><i class="fa fa-home"> Home</i></li>
  <li class="active"><i class="fa fa-graduation-cap"> Students</i></li>
</ol>
@endsection
@section('content')
@include('academics.classes.classpopup')
<div class="appendStudents">
 <div class="panel panel-info">
   <div class="panel-heading">
     Student Base
     <div hidden="hidden" class="alert alert-danger" id="deletedApplicants">
       <span class="close" data-dismiss="alert">&times;</span>
     </div>
     <span class="text-success pull-right" style="display: none;" id="program_updated"><i class="fa fa-check"></i> Program updated!</span>
     @if (session('info'))
     @component('components.alert')
     @slot('type')
     success
     @endslot
     {{ session('info') }}
     @endcomponent
     @endif
   </div>
   <div class="panel-body">
    <div class="table-responsive">
     <table class="table" id="datatable">
       <thead>
         <tr>
          <th><input type="checkbox" name="" id="check-all"></th>
          <th>Admission No</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Programme</th>
          <th>Campus</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <td><input type="checkbox" name="checkbox[]" class="checkbox" data-id="{{$student->student_id}}"></td>
          <td>{{$student->s_applicationno}}</td>
          <td><a href="{{ url('admin/students/'.$student->student_id) }}">{{$student->s_surname.', '.$student->s_othernames}}</a></td>
          <td>{{$student->s_gender=='F'?'Female':'Male'}}</td>
          <td>{{$student->course_name}}</td>
          <td>{{$student->college_name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="panel-footer">
 <div class="row">
   <div class="col-md-2">
     <button class="btn btn-success" id="btn_edit">Edit selected</button>
   </div>
   <div class="col-md-2">
     <button class="btn btn-info" id="btn_class_info">Update Class Info</button>
   </div>
   <div class="col-md-2">
     <button class="btn btn-danger" id="btn_del">Delete selected</button>
   </div>
   <div class="col-md-2">
     {{-- <button class="btn btn-success" id="view_transcripts">View transcripts</button> --}}
   </div>
 </div>
</div>
</div>

</div>

@endsection
@section('script')
@include('scripts.classpopup')
<script>
  $('#check-all').on('click', function(e) {
   if($(this).is(':checked',true))  
   {
    $(".checkbox").prop('checked', true);  
  } else {  
    $(".checkbox").prop('checked',false);  
  }  
});
  $(".checkbox").click(function()
  {
    if($(".checkbox").length == $(".checkbox:checked").length)
    {
      $("#check-all").prop("checked", true);
    }
    else
    {
      $("#check-all").prop("checked",false);
    }
  });
  $('#btn_edit').on('click', function() {
    var selectedStudents = [];
    $('.checkbox:checked').each(function() {
      selectedStudents.push($(this).attr('data-id'));
    });
    if(selectedStudents.length <=0 ) {
      swal('No row selected','','warning');
    }else {
      var joinSelectedStudents = selectedStudents.join(',');
      $(document).ajaxStart(function() {
        $("#btn_edit").text('Please wait...');
      }).ajaxStop(function() {
        $("#btn_edit").text('Edit selected');
      });
      $.ajax({
        url: '{{ url('admin/studentAjax/create') }}',
        type: 'GET',
        data: 'ids='+joinSelectedStudents,
      })
      .done(function(data) {
        $('.appendStudents').html(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    }
  });
  $('#btn_class_info').on('click',function() {
    var selectedStudents = [];
    $('.checkbox:checked').each(function() {
      selectedStudents.push($(this).attr('data-id'));
    });
    if(selectedStudents.length <=0 ) {
      swal('No row selected','','warning');
    }else {
      joinSelectedStudents = selectedStudents.join(',');
      $('#choose-academic').modal();
      $('#frm-multi-class #btn-class-go').addClass('hidden');
      $(document).on('click','.class-edit',function(e) {
        e.preventDefault();
        program_id = $(this).data('id');
        $('#choose-academic').modal('hide');
        $.post('{{ route('updateStatus') }}', {ids:joinSelectedStudents,program_id:program_id}, function(data) {
          $('#program_updated').fadeIn('fast').delay(1000).fadeOut('fast');
          $('#datatable').load(location.href + " #datatable>*","");
        });
      });
    }
  })
  $('#btn_del').on('click', function() {

    var selected = [];  
    $(".checkbox:checked").each(function() {  
      selected.push($(this).attr('data-id'));
    });  

    if(selected.length <=0)  
    {  
      swal("Please select a row.","","warning");  
    } else {  
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover selected row!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "Cancel",
        closeOnConfirm: true,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          var join_selected_values = selected.join(","); 
          $.ajax({
            url: '{{ url('admin/studentAjax/delete') }}',
            type: 'POST',
            data: {ids:join_selected_values},
            success: function (data) {
              if (data['success']) {
                $(".checkbox:checked").each(function() {  
                  $(this).parents("tr").remove();
                });
                $('#deletedApplicants').prop('hidden', false);
                $('#deletedApplicants').html(data['success']);
              } else if (data['error']) {
                swal(data['error']);
              } else {
                swal("Error!",'Whoops Something went wrong',"error");
              }
            },
            error: function() {
              swal(data.responseText);
            }
          });

              // $.each(allVals, function( index, value ) {
              //   $('table tr').filter("[data-row-id='" + value + "']").remove();
              // });
            } else {
              swal("Cancelled", "The row is safe 😊 :)", "error");
            }
          });  
    }  
  });
</script>
@endsection
