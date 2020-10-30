@extends('layouts.app')

@section('content') 
<div class="alert alert-warning">
	<h1>Your token has Expired</h1>
	<h1>You will be redirected in <span id="counter">10</span> second(s) to register again.</h1>
</div>
@endsection
@section('script') 
<script type="text/javascript">
	function countdown() {
		var i = document.getElementById('counter');
		if (parseInt(i.innerHTML)==2) {
			location.href = '{{ url('register') }}';
		}
		i.innerHTML = parseInt(i.innerHTML)-1;
	}
	setInterval(function(){ countdown(); },1000);
</script>
@endsection