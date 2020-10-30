<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Invoice</title>
	<style type="text/css">
	html, body {padding: 0;margin: 0;width: 100%;background: #fff;font-family: Arial, 'San Serif','Time News Roman';font-size: 10pt;}
	table {width: 700px;margin: 0 auto;text-align: left;border-collapse: collapse;}
	th { padding-left: 2px; }
	td { padding: 2px; }

	.aeu { text-align: right;padding-right: 10px; font-family: 'Times News Roman', 'Khmer OS Mool Light'; }
	.line-top { border-left: 1px solid; padding-left: 10px; font-family: 'Times News Roman','Khmer OS Muol Light'; }
	.verify { font-family: 'Times News Roman','Khmer OS Muol Light'; }
	.imageAeu { width: 50px; height: 70px; }
	.th { background-color: #ddd; border: 1px solid; text-align: center; }
	.line-row { background-color: #fff; border: 1px solid; text-align: center; }
	#container { width: 100%;margin: 0 auto; }
	.khm-os { font-family: 'Times News Roman'; }
	.divide { width: 100%; margin: 0 auto; }
	hr { width: 100%;margin-right: 0;margin-left: 0;padding: 0;margin-top: 20px;border: 0 none;border-top: 1px dashed #322f32;background: none;height: 0; }
	button { margin: 0 auto;text-align: center;height: 100%;width: 100%;cursor: pointer;font-weight: bold; }
	.length-limit { max-height: 350px; min-height: 350px; }
	.div-button { width: 100%;margin-top: 0px;height: 50px;text-align: center;margin-bottom: 10px;border-bottom: 1px solid;background: #ccc; }
</style>
</head>
<body>
	<div class="div-button"><button onclick="printContent('divide')">Print</button></div>

	<div id="divide">
		@for ($i = 0; $i < 2; $i++)
		<div id="container">
			<div class="length-limit">
				<table>
					<tr>
						<td style="padding-left:40px;width:50px;">
							<img src="{{ asset('storage/img/'.$app->logo) }}">
						</td>
						<td class="aeu">
							<b style="font-weight:normal;">{{ env('APP_NAME') }}</b><br>
							<b>P.O. BOX 8394</b><br>
							<b>NAIROBI</b>
						</td>
						<td class="line-top">
							<b style="font-weight:normal;">PAYMENT RECEIPT</b>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:right;"></td>
						<td colspan="0" style="text-align:right;padding-left:80px;">
							<b>Receipt N<sup>o</sup>: {{ sprintf("%05d",$invoice->receipt_id) }}</b>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:right;"></td>
						<td colspan="0" style="text-align:right;padding-left:80px;">
							<b>Date: </b> {{ date('d-M-Y', strtotime($invoice->transaction_date)) }}
						</td>
					</tr>
				</table>

				<table>
					<tr>
						<td style="width: 120px;padding: 5px 0px;">
							StudenID: <b>{{ $invoice->s_applicationno }}</b>
						</td>
						<td style="width: 200px;padding: 5px 0px;">
							Surname: <b>{{ $invoice->s_surname }}</b>
						</td>
						<td style="width: 200px; padding: 5px 0px;">
							Othernames: <b>{{$invoice->s_othernames }}</b>
						</td>
						<td>Gender:
							<b>
								@if($invoice->s_gender=='F') Female @else Male @endif
							</b>
						</td>
					</tr>
				</table>
				<table>
					<thead>
						<tr>
							<th class="th" style="text-align: left;">Description</th>
							<th class="th" style="width: 70px;">Fees</th>
							<th class="th" style="width: 70px;">Paid</th>
							<th class="th" style="width: 70px;">Balance</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="line-row" style="text-align: left;">{{ $invoice->description }}</td>
							<td class="line-row">{{ number_format($invoice->fee_amount,2) }}</td>
							<td class="line-row">{{ number_format($invoice->amount_paid,2) }}</td>
							<td class="line-row">{{ number_format($invoice->fee_amount - $totalPaid,2) }}</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tr>
						<td>
							<b class="verify">Note:</b>
							<p style="display: inline-block;">
								All payments are not refundable or transferable
							</p>
						</td>
						<td>
							<b style="margin-bottom: 5px">Cashier: {{ $invoice->name }}</b>
							<br><br>
							Printed: {{ date('d-M-Y g:i:s A') }}
						</td>
						<td style="vertical-align: top;">
							Printed By: {{ Auth::user()->name }}
						</td>
					</tr>
				</table>
			</div>
			<table>
				<tr>
					<td style="font-size:10pt;text-align:center;">#332, YSP Programmers, Postal Code: 3298</td>
					<td style="font-size:10pt;text-align:center;">
						Phone: (254) 725 044135 Email: {{ env('MAIL_USERNAME') }}
					</td>
				</tr>
			</table>
		</div>
		@if ($i==0)
		<br>
		<hr>
		@endif
		@endfor
	</div>
	<script type="text/javascript">
		function printContent(el)
		{
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
			window.close();
		}
	</script>
</body>
</html>