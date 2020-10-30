@extends('layouts.app')

@section('content') 
@component('components.alert')
    @slot('type')
        success
    @endslot
    <h1>You have been registered successfully.</h1>
	<h1>Check your email and Verify to activate your account</h1>
@endcomponent
@endsection