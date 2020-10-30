<script type="text/javascript">
	// $.get('https://sms.movesms.co.ke/api/balance',{api_key: 'TsijQu1E6YDWOlC1AiiKbZixKIeJC37DadZuHeNVQOsIzwpoLY'}, function(data){
	// 	console.log(data);
	// })

	$.ajax({
          url: 'https://sms.movesms.co.ke/api/balance',
		  contentType: 'application/json',
		  
          type: 'GET',
		  dataType: 'json',
          data: {api_key: 'TsijQu1E6YDWOlC1AiiKbZixKIeJC37DadZuHeNVQOsIzwpoLY'},
        })
        .done(function(data) {
         console.log(data);
       })
        .fail(function() {
          console.log("fail");
        })
        .always(function() {
          console.log("complete");
        });

	$(document).on('click','#sms-selected',function() {
		var contacts = [];
		$('.checkbox:checked').each(function() {
			code = $('#code').val()
			contacts.push(code+$(this).closest('tr').children(':eq(5)').text().substring(1));
		});
		if(contacts.length <=0 ) {
			swal('Select atleast one applicant to a send message','','warning');
		}else{
			var joinSelected = contacts.join(',')
			$('#messageModal').modal();
			$('#recipients').val(joinSelected);
		}
		$('#code').on('change',function() {
			$('#recipients').val(this.value).focus();
		})
	})
</script>