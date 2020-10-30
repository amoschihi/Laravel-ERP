@extends('layouts.header')

@section('content')
@section('title','Profile - '.$st->s_othernames)
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
  <li><i class="fa fa-home"> Home</i></li>
  <li><i class="fa fa-graduation-cap"> Students</i></li>
  <li class="active"><i class="fa fa-user"> Profile</i></li>
</ol>
@endsection
@include('students.popups.unit')
@include('students.popups.incident')
@include('students.popups.slip')
@include('students.popups.transcript')
@component('components.loading')
    <h2>Loading...</h2>
@endcomponent
<div class="tabs" >
	<div class="tab-links">
		<ul>
			<li><a href="#tabs-1">Profile</a></li>
			<li><a href="#tabs-2">Grade/Units</a></li>
			<li><a href="#tabs-3">Perfomance</a></li>
			<li><a href="#tabs-4">Displinary</a></li>
			<li><a href="#tabs-5">Fee Status</a></li>
		</ul>
	</div>
	@if(session('nofile') || session('uploadError'))
	@component('components.alert')
	    @slot('type')
	        warning
	    @endslot
		{{ session('nofile') ? session('nofile') : session('uploadError') }}
	@endcomponent
	@endif
	<div class="tab-content">
		<div id="tabs-1" class="tab active">
			@include('students.tabs.tab-1')
		</div>
		<div id="tabs-2" class="tab appendUnits">
			@include('students.tabs.tab-2')
		</div>
		<div id="tabs-3" class="tab">
			@include('students.tabs.tab-3')
		</div>
		<div id="tabs-4" class="tab appendincidents">
			@include('students.tabs.tab-4')
		</div>
		<div id="tabs-5" class="tab">
			@include('students.tabs.tab-5')
		</div>
	</div>
</div>
@endsection
@section('script')
@include('students.scripts.profile')
@endsection