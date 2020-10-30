<script type="text/javascript">
	$('#save-payment').on('click',function() { $('#balance').prop('disabled', false)});
	$('#create-fee').on('click',function() { $('#create-fee-modal').modal('show')});
	$(document).on('change keyup', '#fee_amount', function(event) {
		var fee = $('#fee').val();
		var amt = $(this).val();
		var paid = $('#paid').val(amt);

		if(paid != '' && amt != '') 
		{
			paid = parseFloat(amt)
			$('#balance').val(parseFloat(fee)-parseFloat(paid));
		}
		if(amt=='' && paid == '') 
		{
			$('#paid').val()
		}

		if($('#balance').val()<0) {
			$('#balance').css('color', 'red');
		}else {
			$('#balance').css('color', 'black');
		}
	});

</script>