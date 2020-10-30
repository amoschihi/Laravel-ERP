@extends('layouts.header')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li class="active"><i class="fa fa-dashboard"> Dashboard</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		Admin Dashboard
	</div>
	<div class="panel-body">
		You are logged in as Admin!
	</div>
</div>
@endsection