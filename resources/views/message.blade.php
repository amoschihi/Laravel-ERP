@extends('layouts.header')

@section('content')
{{-- expr --}}
<div class="panel panel-info">
	<div class="panel-heading">
		Message your customers
		@if (session('response'))
		@component('components.alert')
		@slot('type')
		success
		@endslot
		{{ session('response') }}
		@endcomponent
		@endif
	</div>
	<div class="panel-body">
		<form action="{{ url('notification/send') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="recipient">Recipients</label>
				<input type="text" class="form-control" name="contacts" id="contacts">
			</div>
			<div class="form-group">
				<label for="message">Your Message</label>
				<textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
			</div>
			<button type="submit" class="btn btn-success">Send Message</button>
		</form>	
	</div>
</div>
@endsection