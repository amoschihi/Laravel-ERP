<script type="text/javascript">
  $(document).ready(function() {
    $('#frm-multi-class #btn-class-go').addClass('hidden');
    $(document).on('click','.class-edit',function(e) {
      e.preventDefault();
      $('#program_id').val($(this).data('id'));
      $('.academic-detail p').text($(this).text());
      $('#choose-academic').modal('hide');
      $('#myModal').modal();
    });
    $('#browse_file').on('click', function() {
      $('#photo').click();
    });

    $('#photo').on('change',function(e){
      showFile(this, '#showPhoto');
    })  {{-- ===================== --}}
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
    $('#printButton').click(function(event) {
      /* Act on the event */
      var mode = 'iframe'; //popup
      var close = mode == "popup";
      var options = { mode : mode, popClose : close };
      $('#printApplicants').printArea(options);
    });
    $('#addate,#s_dob').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:'yy-mm-dd'
    });
    $('#school_id').on('change',function() {
      school_id = $('#school_id').val();
      $.ajax({
        url: '{{ route('load.departments') }}',
        type: 'POST',
        dataType: 'json',
        data: {school_id:school_id},
      })
      .done(function(data) {
        $('#department_id').html(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    })
    $('#department_id').on('change',function() {
      department_id = $('#department_id').val();
      $.ajax({
        url: '{{ route('load.courses') }}',
        type: 'POST',
        dataType: 'json',
        data: {department_id:department_id},
      })
      .done(function(data) {
        $('#course_id').html(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    })
    $(document).on('click','#btn_delete',function() {
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this menu!",
        type: "warning",
        showCancelButton: true,
        animation: "slide-from-top",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true,
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          document.getElementById('delete-form').submit();
          swal("Deleted!", "The menu has been deleted.", "success");
        } else {
          swal("Cancelled", "The menu is safe 😊 :)", "error");
        }
      });
    });

    $('#check_all').on('click', function(e) {
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
        $("#check_all").prop("checked", true);
      }
      else
      {
        $("#check_all").prop("checked",false);
      }
    });

    $('#edit-selected').on('click', function() {
      var selectedVals = [];
      $('.checkbox:checked').each(function() {
        selectedVals.push($(this).attr('data-id'));
      });
      if(selectedVals.length <=0 ) {
        swal('No row selected','','warning');
      }else {
        var join_selected_vals = selectedVals.join(',');
        $(document).ajaxStart(function() {
          $("#edit-selected").text('Please wait...');
        }).ajaxStop(function() {
          $("#edit-selected").text('Edit selected');
        });
        $.ajax({
          url: '{{ url('admin/applicants/create') }}',
          type: 'GET',
          data: 'ids='+join_selected_vals,
        })
        .done(function(data) {
          $('.appendApplicants').html(data);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      }
    });
    $('#delete-selected').on('click', function() {

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
              url: '{{ url('admin/applicants/delete') }}',
              type: 'POST',
              data: {ids:join_selected_values,'_token':$('input[name=_token]').val()},
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
          } else {
            swal("Cancelled", "The row is safe 😊 :)", "error");
          }
        });  
      }  
    });
    $('#reject-selected').on('click',function(event) {
      var rejectVals = [];
      $('.checkbox:checked').each(function() {
        rejectVals.push($(this).attr('data-id'));
      });
      if(rejectVals.length <= 0) {
        swal('No applicant selected','','warning');
      }else {
        var join_rejected = rejectVals.join(',');
        $("#loader").modal('show');
        $.ajax({
          url: '{{ route('applicant.reject') }}',
          type: 'POST',
          data: {param1: join_rejected,'_token':$('input[name=_token]').val()},
        })
        .done(function(data) {
         $("#loader").modal('hide');

         $('#datatable').load(location.href + " #datatable>*","");

         window.location.href = '{{ url('admin/applicants') }}'
       })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      }
    });

    $(document).on('click', '#approve-selected', function(event) {
      var approveVals = [];
      $('.checkbox:checked').each(function() {
        approveVals.push($(this).attr('data-id'));
      });
      if(approveVals.length <= 0) {
        swal('No applicant selected for approval','','warning');
      }else {
        var join_approved = approveVals.join(',');
        $("#loader").modal('show');
        $.ajax({
          url: '{{ url('admin/students/create') }}',
          type: 'GET',
          data: {ids: join_approved},
        })
        .done(function(data) {
          $("#loader").modal('hide');

          if(data.ids >= 1) {
            $('#register-modal').modal('show');
            $('#r-surname').val(data.surname);
            $('#r-othernames').val(data.othernames);
            $('#course_length').val(data.course_length);
            $('#course_name').val(data.course_name);
            $('#pstudent_id').val(data.ids);
            var today = new Date();
            $('#r_admdate').val(today.toLocaleString('en-GB').replace(/,/i,'').replace(/\//g,'-'));
            year = today.getFullYear();
            day = today.getDate();
            month = today.getMonth();
            course_length = $('#course_length').val();
            graddate = parseInt(year)+parseInt(course_length) +'-'+month+'-'+day;
            $('#graddate').val(graddate);
            $('#save-registration').on('click', function(event) {
              admno = $('#registration_no').val()
              surname = $('#r-surname').val()
              othernames = $('#r-othernames').val()
              academic = $('#r_academic').val()
              trisemester = $('#r_trisemester').val()
              admdate = $('#r_admdate').val()
              graddate = $('#graddate').val()
              remarks = $('#remarks').val()
              $('#save').text('Saving...');
              $.ajax({
                url: '{{ route('applicant.register') }}',
                type: 'POST',
                data: {ids:data.ids,s_applicationno:admno,s_surname:surname,s_othernames:othernames,academic_id:academic,trisemester:trisemester,s_admdate:admdate,s_graddate:graddate,remarks:remarks},
              })
              .done(function(data) {
                $('#save').text('Save');
                $('#register-modal').modal('hide');
                swal(data.adm, data.name + ' approved and registered successfully','success');
                $('#datatable').load(location.href + " #datatable>*","");
                window.location.href = '{{ url('admin/applicants') }}'


              })
              .fail(function() {
                console.log("error");
              })
              .always(function() {
                console.log("complete");
              });

            });
          }else {
            $('#loader').modal('hide');

            $('.appendApplicants').html(data)
          }
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      }
    });
    $('#generate_adm').on('click', function() {
      $course_name = $('#course_name').val();
      $id = $('#pstudent_id').val();
      $.post('{{ route("applicant.generate") }}', {course_name: $course_name, id: $id}, function(data) {
        $('#registration_no').val(data);
      })
    })
  });
</script>