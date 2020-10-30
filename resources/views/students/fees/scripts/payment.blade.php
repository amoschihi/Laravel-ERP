<script type="text/javascript">
	var n = $('#disabled').val();
	$('#save-fee').on('click',function(e) {
		e.preventDefault();
		enableFormElement($('.createFeeForm'));
		$('.createFeeForm').submit();
		
	})

	function enableFormElement(frmName) {
		$.each($(frmName).find('input,select'),function(i,element) {
			$(element).attr('disabled',false);
		})
	}

	$('.btn-paid').on('click',function(e) {
		e.preventDefault();
		fee_finance_detail_id = $(this).data('id-paid');
		student_id = $(this).data('st-id');
		balance = $(this).val();
		$.get("{{ route('extra.pay') }}",{fee_finance_detail_id:fee_finance_detail_id,student_id:student_id}, function(data) {
			$('.lid').val(data.level_id);
			$('.sid').val(data.semester_id);
			@if(count($student_fee)!=0)
				$('#fee').val(balance);
			@else
				$('#fee').val(data.amount_due);
			@endif
			$('.famt').val(balance);
			$('.famt').focus();
			$('.famt').select();
			$('#b').val(balance);

		})
	})


	function disabled_input() {
		$.each($('body').find('.d'),function(i,item) {
			$(item).attr('disabled',true).css({'backgroud':'#f5f5f5','border':'1px solid #ccc'});
			$(item).attr('readonly',false);
		})
	}

	$(document).ready(function() {
		if(n==0) {
			disabled_input();
		}
	})

	//disable input class name = d
</script>