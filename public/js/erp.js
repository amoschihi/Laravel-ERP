$(document).ready(function () {
	$('#datatable').dataTable({
		"sPaginationType":"full_numbers"
	});
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
			swal("Please select row.","","warning");  
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

// $.each(allVals, function( index, value ) {
//   $('table tr').filter("[data-row-id='" + value + "']").remove();
// });
} else {
	swal("Cancelled", "The row is safe 😊 :)", "error");
}
});  
		}  
	});

	$("#priviledges").select2({
		placeholder: "Click to select priviledges",
		allowClear: true
	});
	$("#icon").select2({
		allowClear: true
	});
	$('#sidebarCollapse').on('click', function () {
		$('.sidebar').toggleClass('active');
		$('#page-wrapper').toggleClass('active');
	});

	$('#dn').prop('checked', {{$app->notifications==1?'true':'false'}});
	$('#dn').change(function() {
		if($('#dn').prop('checked')==true) {
			state = 1;
		}else{
			state = 0;
		}
		setting = $('#dn').data("setting");
		$.ajax({
			url: '{{ route('update.notifications') }}',
			method: 'POST',
			data: {state:state,setting:setting,'_token':$('input[name=_token]').val()},
			success: function(data) {
				console.log(data);
			},
			error: function() {
				alert('error');
			}
		});
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
			$(document).ajaxStart(function() {
				$("#loader").modal('show');
			}).ajaxStop(function() {
				$("#loader").modal('hide');
			});

			$.ajax({
				url: '{{ route('applicant.reject') }}',
				type: 'POST',
				data: {param1: join_rejected,'_token':$('input[name=_token]').val()},
			})
			.done(function(data) {
				$('#myDiv').load(location.href + " #myDiv>*","");
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
});