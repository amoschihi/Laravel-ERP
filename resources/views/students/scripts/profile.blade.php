<script type="text/javascript">
	function AreYouSure() {
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this student!",
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
				swal("Deleted!", "The student has been deleted.", "success");
			} else {
				swal("Cancelled", "The student is safe 😊 :)", "error");
			}
		});
	}
	$('#datatale').dataTable({
		dom:'Bfrtip',
		buttons: [
		'copyHtml5',
		'excelHtml5',
		'csvHtml5',
		'pdfHtml5',
		'print'
		]
	});
	$('#printSlip').click(function(event) {
		/* Act on the event */
		var mode = 'iframe'; //popup
		var close = mode == "popup";
		var options = { mode : mode, popClose : close };
		$('#dontprint').prop('hidden', true);
		$('div#printableSlip').printArea(options);
	});
	$('#check_all_units').on('click', function(event) {
		if($(this).is(':checked',true)) {
			$('.checked_units').prop('checked', true)
		}else {
			$('.checked_units').prop('checked', false)
		}
	});
	$('.checked_units').click(function() {
		if($('.checked_units').length == $('.checked_units:checked').length) {
			$('#check_all_units').prop('checked', true)
		}else {
			$('#check_all_units').prop('checked', false)
		}
	});
	$('#check_all_incidents').on('click', function(event) {
		if($(this).is(':checked',true)) {
			$('.checked_incidents').prop('checked', true)
		}else {
			$('.checked_incidents').prop('checked', false)
		}
	});
	$('.checked_incidents').click(function() {
		if($('.checked_incidents').length == $('.checked_incidents:checked').length) {
			$('#check_all_incidents').prop('checked', true)
		}else {
			$('#check_all_incidents').prop('checked', false)
		}
	});
	$('#edit_selected_units').on('click', function() {
		var selectedUnits = [];
		$('.checked_units:checked').each(function() {
			selectedUnits.push($(this).attr('data-id'));
		});
		if(selectedUnits.length <=0 ) {
			swal('No row selected','','warning');
		}else {
			var joinSelectedUnits = selectedUnits.join(',');
			var student_id = $('#student_id').val();
			$(document).ajaxStart(function() {
				$("#edit_selected_units").text('Please wait...');
			}).ajaxStop(function() {
				$("#edit_selected_units").text('Edit selected');
			});
			$.post('{{ route('edit.selectedUnits') }}', {ids:joinSelectedUnits,student_id:student_id}, function(data) {
				$('.appendUnits').html(data)
			});
		}
	});
	$('#edit_selected_incidents').on('click', function() {
		var selectedincidents = [];
		$('.checked_incidents:checked').each(function() {
			selectedincidents.push($(this).attr('data-id'));
		});
		if(selectedincidents.length <=0 ) {
			swal('No row selected','','warning');
		}else {
			var joinSelectedincidents = selectedincidents.join(',');
			$(document).ajaxStart(function() {
				$("#edit_selected_incidents").text('Please wait...');
			}).ajaxStop(function() {
				$("#edit_selected_incidents").text('Edit selected');
			});
			$.post('{{ route('edit.selectedincidents') }}', 'ids='+joinSelectedincidents, function(data) {
				$('.appendincidents').html(data)
			});
		}
	});
	$('#delete_selected_units').on('click', function() {
		var selected = [];  
		$(".checked_units:checked").each(function() {  
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
					$.post('{{ url('admin/units/delete') }}', {ids:join_selected_values,'_token':$('input[name=_token]').val()}, function(data) {
						if (data['success']) {
								$(".checked_units:checked").each(function() {  
									$(this).parents("tr").remove();
								});
								$('#deletedUnits').prop('hidden', false);
								$('#deletedUnits').html(data['success']);
						} else if (data['error']) {
								swal(data['error']);
						} else {
								swal("Error!",'Whoops Something went wrong',"error");
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
	$('#delete_selected_incidents').on('click', function() {
		var incidents = [];  
		$(".checked_incidents:checked").each(function() {  
			incidents.push($(this).attr('data-id'));
		});  

		if(incidents.length <=0)  
		{  
			swal("Please select a row.","","warning");  
		} else {  
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover selected row(s)!",
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
					var join_selected_values = incidents.join(","); 
					$.post('{{ url('admin/incidents/delete') }}', {ids:join_selected_values,'_token':$('input[name=_token]').val()}, function(data) {
						if (data['success']) {
							$(".checked_incidents:checked").each(function() {  
								$(this).parents("tr").remove();
							});
							$('#deletedincidents').prop('hidden', false);
							$('#deletedincidents').html(data['success']);
						} else if (data['error']) {
							swal(data['error']);
						} else {
							swal("Error!",'Whoops Something went wrong',"error");
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

	$(document).on('click', '#result', function(event) {
		var student_id = $('#result').attr('data-st');
		var level_id = $('#result').attr('data-level');
		// $(document).ajaxStart(function() {
			$("#loader").modal('show');
		// }).ajaxStop(function() {
		// });
		$.post('{{ route('get.slip') }}', {student_id:student_id,level_id:level_id}, function(data) {
			$("#loader").modal('hide');
			$('#getSlip').html(data);
			$('#slip').modal('show');
			$('[data-toggle="tooltip"]').tooltip();
			$('#printButton').click(function(event) {
				w=window.open();
				w.document.write($('div.printableArea').html());
				w.print();
				w.close();
			});
		});	
	});
	$(document).on('click', '#transcripts', function(event) {
		$('#academic-modal').modal()
		$('#aca').on('change',function() {
			$('#academic-modal').modal('hide')
      		academic_id = $(this).val()
      		student_id = $('#transcripts').data('slip')
      		level_id = $('#transcripts').data('level')
			$("#loader").modal('show');
			$.post('{{ route('get.transcript') }}', {student_id:student_id,academic_id:academic_id,level_id:level_id}, function(data) {
				$("#loader").modal('hide')
				$('#getTranscript').html(data);
				$('#transcript').modal('show');
				$('[data-toggle="tooltip"]').tooltip();
				$('#printTranscript').click(function(event) {
					w=window.open();
					w.document.write($('div.printTranscript').html());
					w.print();
					w.close();
				});
			})

    	})
	});
</script>