<script type="text/javascript">
	showClassInfo();
	$('#academic').on('change',function() {
		showClassInfo()
	})
	$('#cor').on('change',function() {
		showClassInfo()
	})
	$('#lvl').on('change',function() {
		showClassInfo()
		level_id = $(this).val();
		course_id = $('#cor').val();
		showUnits(course_id, level_id)
	})
	$('#start-date,#end-date').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd'
	})
	$('#frm-create-class').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url = $(this).attr('action');
		$.post(url, data, function(data) {
			if(data.msg) 
			{
				$('p#msg').html(data.msg+'<span class="close" data-dismiss="alert">&times;</span>').addClass('alert alert-warning');
			}
			showClassInfo();
		});
		$(this).trigger('reset')
	})
	$(document).on('click', '.class-edit', function(data) {
		var program_id = $(this).data('id');
		$.get('{{ route('editClass') }}',{program_id:program_id}, function(data) {
			$('#lvl').val(data.level_id);
			$('#cor').val(data.course_id);
			$('#atype').val(data.admissiontype_id);
			$('#program_id').val(data.program_id);
			$('#start-date').val(data.start_date);
			$('#end-date').val(data.end_date);
		});
	});
	$('.btn-update-class').on('click',function(e) {
		e.preventDefault();
		var data = $('#frm-create-class').serialize();
		$.post('{{ route('updateClassInfo') }}',data, function(data) {
			showClassInfo();
		});
	})
	{{-- ======================== --}}
	$(document).on('click', '.del-class', function(e) {
		program_id = $(this).val()
		$.post('{{ route('deleteClass') }}', {program_id:program_id}, function(data) {
			showClassInfo();
		});
	});
	function showClassInfo()
	{
		var data = $('#frm-create-class').serialize();

		$.get('{{ route('showClassInformation') }}',data,function(data) {
			$('#add-class-info').empty().append(data);
			$('th#hd,td#hd').addClass('hidden');
			MergeCommonRows($('#table-class-info'));
			// SummerizeTable($('#table-class-info'));
		});
	}
	function MergeCommonRows(table) 
	{
		var firstColumnBreaks = [];
		$.each(table.find('th'),function(i) {
			var previous = null, cellToExtend = null, rowspan = 1;
			table.find("td:nth-child(" + i + ")").each(function(index, e) {
				var jthis = $(this), content = jthis.text();
				if(previous == content && content !== "" && $.inArray(index, firstColumnBreaks) === -1) {
					jthis.addClass('hidden');
					cellToExtend.attr("rowspan", (rowspan = rowspan + 1));
				}else {
					if(i === 1) firstColumnBreaks.push(index);
					rowspan = 1;
					previous = content;
					cellToExtend = jthis;
				}
			});
		});
		$('td.hidden').remove();
	}

	$('#frm-create-class #sch').on('change',function() {
		var school_id = $(this).val();
		var department = $('#dep');
		$(department).empty();
		$.get('{{ route('showDepartment') }}',{school_id:school_id},function(data) {
			$.each(data, function(index, val) {
				$(department).append($('<option/>',{
					value:val.department_id,
					text:val.department_name
				}))
			});
		});
	})

	$('#frm-create-class #dep').on('change',function() {
		var department_id = $(this).val();
		var course = $('#cor');
		$(course).empty();
		$.get('{{ route('showCourse') }}',{department_id:department_id},function(data) {
			$.each(data, function(index, val) {
				$(course).append($('<option/>',{
					value:val.course_id,
					text:val.course_name
				}))
			});
		});
	})
	$('#frm-create-class #cor').on('change',function() {
		var course_id = $(this).val();
		var level_id = $('#lvl').val();
		showUnits(course_id, level_id)
	})
	var showUnits = function(course_id,level_id) {
		var units = $('#unt');
		$(units).empty();
		$.get('{{ route('showUnits') }}',{course_id:course_id,level_id:level_id},function(data) {
			$.each(data, function(index, val) {
				$(units).append($('<option/>',{
					value:val.unit_id,
					text:val.unit_name
				}));
			});
		});
	}

		/**
		* 
		*inserting new course
		* 
		*/
		$(document).on('click', '#add-more-course', function() {
			departments = $('#dep option');
			department = $('#course-modal').find('#department');
			$(department).empty();
			$.each(departments, function(i, v) {
				$(department).append($('<option/>',{
					value:$(v).val(),
					text:$(v).text(),
				}))
			});
			$('#course-modal').modal('show');
		});	
		$(document).on('click', '#save-course', function(event) {
			var course_name = $('#course_name').val();
			var department_id = $('#department').val();
			var course_length = $('#course_length').val();
			var course_description = $('#course_description').val();
			$.post('{{ route('new.course') }}', {course_name:course_name,department_id:department_id,course_length:course_length,course_description:course_description}, function(data) {
				$('#cor').append($('<option/>',{
					value:data.course_id,
					text:data.course_name
				}));
			});
			$('#course-modal').modal('hide');
		});	
		/**
		* 
		*inserting new college
		* 
		*/

		$(document).on('click', '#add-more-college', function(event) {
			event.preventDefault();
			$('#college-modal').modal('show');
		});
		$(document).on('click', '#save-college', function(event) {
			var college_name = $('#college_name').val();
			var college_location = $('#college_location').val();
			$.post('{{ route('new.college') }}', {college_name:college_name,college_location:college_location}, function(data) {
				$('#col').append($('<option/>',{
					value:data.college_id,
					text:data.college_name
				}));
			});
			$('#college-modal').modal('hide');
		});	
		/**
		* 
		*inserting new school
		* 
		*/

		$(document).on('click', '#add-more-school', function() {
			colleges = $('#col option');
			college = $('#school-modal').find('#college');
			$(college).empty();
			$.each(colleges, function(i, pro) {
				$(college).append($("<option/>",{
					value : $(pro).val(),
					text : $(pro).text(),
				}))
			});
			$('#school-modal').modal('show');
		});	
		$(document).on('click', '#save-school', function(event) {
			var school_name = $('#school_name').val();
			var college_id = $('#college').val();
			var school_director = $('#school_director').val();
			$.post('{{ route('new.school') }}', {school_name:school_name,college_id:college_id,school_director:school_director}, function(data) {
				$('#sch').append($('<option/>',{
					value:data.college_id,
					text:data.school_name
				}));
			});
			$('#school-modal').modal('hide');
		});
		/**
		* 
		*inserting new department
		* 
		*/
		$(document).on('click', '#add-more-department', function() {
			schools = $('#sch option');
			school = $('#department-modal').find('#school');
			$(school).empty();
			$.each(schools, function(i, pro) {
				$(school).append($("<option/>",{
					value : $(pro).val(),
					text : $(pro).text(),
				}))
			});
			$('#department-modal').modal('show');
		});	
		$(document).on('click', '#save-department', function(event) {
			var department_name = $('#department_name').val();
			var school_id = $('#school').val();
			$.post('{{ route('new.department') }}', {department_name:department_name,school_id:school_id}, function(data) {
				$('#dep').append($('<option/>',{
					value:data.department_id,
					text:data.department_name
				}));
			});
			$('#department-modal').modal('hide');
		});
		/**
		* 
		*inserting new mode
		* 
		*/

		$(document).on('click', '#add-more-mode', function(event) {
			event.preventDefault();
			$('#mode-modal').modal('show');
			$('#admtype-modal').modal('hide');
		});	
		$(document).on('click', '#save-mode', function(event) {
			var mode_name = $('#mode_name').val();
			$.post('{{ route('new.mode') }}', {mode_name:mode_name}, function(data) {
				$('#mode_id').append($('<option/>',{
					value:data.mode_id,
					text:data.mode_name
				}));
			});
			$('#mode-modal').modal('hide');
		});
		/**
		 * inserting new level
		 *
		 *
		 */
		 $(document).on('click','#add-more-level',function() {
		 	$('#level-modal').modal();
		 });
		 $(document).on('click','#save-level',function() {
		 	var academic_id = $('#academic').val();
		 	var year_id = $('#yr').val();
		 	var semester_id = $('#sem').val();
		 	var level_name = year_id + '^' +semester_id;
		 	var level_description ='Year ' + year_id + ' Sem ' +semester_id;
		 	$.post('{{ route('new.level') }}', {year_id:year_id,academic_id:academic_id,semester_id:semester_id,level_name:level_name,level_description:level_description}, function(data) {
		 		if(data.msg) 
		 		{
		 			$('#level-modal p').text(data.msg).addClass('alert alert-info');
		 		}else {
		 			$('#lvl').append($('<option/>',{
		 				value: data.level_id,
		 				text: data.level_description
		 			}))
		 			$('#level-modal').modal('hide')
		 		}
		 	});
		 })
		/**
		* 
		*inserting new academic year
		* 
		*/

		$(document).on('click', '#add-more-academic', function(event) {
			event.preventDefault();
			$('#academic-modal').modal('show');
			$('#level-modal').modal('hide')
		});	
		$(document).on('click', '#save-academic', function(event) {
			var academic_name = $('#academic_name').val();
			$.post('{{ route('new.academic') }}', {academic_name:academic_name}, function(data) {
				$('#academic').append($('<option/>',{
					value:data.academic_id,
					text:data.academic_name
				}));
			});
			$('#academic-modal').modal('hide');
		});
		/**
		* 
		*inserting new academic year
		* 
		*/

		$(document).on('click', '#add-more-semester', function() {
			$('#semester-modal').modal('show');
			$('#level-modal').modal('hide')
		});	
		$(document).on('click', '#save-semester', function(event) {
			var semester = $('#semester').val();
			var s_description = $('#s_description').val();
			$.post('{{ route('new.semester') }}', {semester:semester,s_description:s_description}, function(data) {
				$('#sem').append($('<option/>',{
					value:data.id,
					text:data.semester
				}));
			});
			$('#semester-modal').modal('hide');
			$('#level-modal').modal('show');
		});
		/**
		* 
		*inserting new year
		* 
		*/

		$(document).on('click', '#add-more-year', function() {
			$('#year-modal').modal('show');
			$('#level-modal').modal('hide')
		});	
		$(document).on('click', '#save-year', function(event) {
			var year = $('#year').val();
			var description = 'Year '+year;
			$.post('{{ route('new.year') }}', {year:year,description:description}, function(data) {
				$('#yr').append($('<option/>',{
					value:data.id,
					text:data.year
				}));
			});
			$('#year-modal').modal('hide');
			$('#level-modal').modal('show');
		});
		/**
		* 
		*Inserting new Admission Type
		* 
		*/

		$(document).on('click', '#add-more-admtype', function() {
			$('#admtype-modal').modal('show');
		});	
		$(document).on('click', '#save-admtype', function(event) {
			var admtype_name = $('#admtype_name').val();
			var admtype_description = $('#admtype_description').val();
			var mode_id = $('#mode_id').val();
			$.post('{{ route('new.admtype') }}', {admissiontype_name:admtype_name,admissiontype_description:admtype_description,mode_id:mode_id}, function(data) {
				$('#atype').append($('<option/>',{
					value:data.admissiontype_id,
					text:data.admissiontype_name
				}));
			});
			$('#admtype-modal').modal('hide');
		});
		/**
		* 
		*Enrolling New Unit
		* 
		*/
		$(document).on('click', '#add-more-unit', function() {
			courses = $('#cor option');
			course = $('#unit-modal').find('#course');
			$(course).empty();
			$.each(courses, function(i, v) {
				$(course).append($('<option/>',{
					value:$(v).val(),
					text:$(v).text()
				}))
			});
			levels = $('#lvl option');
			level = $('#unit-modal').find('#levl');
			$(level).empty();
			$.each(levels, function(index, val) {
				$(level).append($('<option/>',{
					value:$(val).val(),
					text:$(val).text()
				}))
			});
			$('#unit-modal').modal('show');
		});	
		$(document).on('click', '#save-unit', function(event) {
			var course_id = $('#course').val();
			var level_id = $('#levl').val();
			var unit_code = $('#unit_code').val();
			var unit_name = $('#unit_name').val();
			var unit_hours = $('#unit_hours').val();
			var unit_description = $('#unit_description').val();
			$.post('{{ route('new.unit') }}', {course_id:course_id,level_id:level_id,unit_code:unit_code,unit_name:unit_name,unit_hours:unit_hours,unit_description:unit_description}, function(data) {
				$('#unt').append($('<option/>',{
					value:data.unit_id,
					text:data.unit_name
				}));
			});
			$('#frm-create-unit').trigger('reset')
		});
	</script>