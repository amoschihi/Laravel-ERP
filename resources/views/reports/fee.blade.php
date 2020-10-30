@extends('layouts.header')
@section('content')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-home"><a href=""> Home</a></i></li>
	<li><i class="fa fa-money"> Fees</i></li>
	<li class="active"><i class="fa fa-file-text-o"> Report</i></li>
</ol>
@endsection
<div class="panel panel-info">
	<div class="panel-heading">
		<table>
			<tr>
				<td><b><i class="fa fa-apple"></i> Fee Information</b></td>
				<td><input type="text" name="from" id="from" placeholder="yy-mm-dd" required class="form-control"></td>
				<td><input type="text" name="to" id="to" placeholder="yy-mm-dd" required class="form-control" value="{{ date('Y-m-d') }}"></td>
			</tr>
		</table>
	</div>
	<div class="panel-body" style="padding-bottom:4px;">
		<p style="text-align: center;font-size: 20px;font-weight: bold;">Fee Report</p>
		<p id="img" style="text-align: center; display: none;"><img src="{{ asset('img/loading-image.gif') }}"></p>
		<div class="show-fee-info">

		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('#from').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		onSelect: function(frm)
		{
			showFee(frm,$('#to').val())
		}
	})
	$('#to').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		onSelect: function(to)
		{
			showFee($('#from').val(),to)
		}
	})

	function showFee(frm,to) {
		$('#img').css('display','block')
		$.get('{{ route('showFeeReport') }}',{frm:frm,to:to}, function(data) {
			$('#img').css('display','none')
			$('.show-fee-info').empty().append(data)
		});
	}
</script>
@endsection