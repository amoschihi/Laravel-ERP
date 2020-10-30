@extends('layouts.header')
@section('title','Agents - '.$agent->name)
@section('breadcrumb')
	<ol class="breadcrumb pull-right text-primary">
		<li><i class="fa fa-home"> Home</i></li>
		<li><i class="fa fa-users"> Agents</i></li>
		<li class="active"><i class="fa fa-user"> {{ $agent->name }}</i></li>
	</ol>
@endsection
@section('content')
<div class="tabs">
	<div class="tab-links">
		<ul>
			<li><a href="#tabs-1">Profile</a></li>
			<li><a href="#tabs-2">Contracts</a></li>
			<li><a href="#tabs-3">Payments</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div id="tabs-1" class="tab active">
			@include('agents.tabs.tabs-1')
		</div>
		<div id="tabs-2" class="tab">
			@include('agents.tabs.tabs-2')
		</div>
		<div id="tabs-3" class="tab">
			@include('agents.tabs.tabs-3')
		</div>
	</div>
</div>
@endsection