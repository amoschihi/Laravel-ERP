@extends('layouts.student.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="#">Home</a></li>
      <li><i class="fa fa-laptop"></i>Dashboard</li>
    </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="info-box blue-bg">
      <div class="count">MESSAGES</div>
      <div class="title">2(msg)</div>
    </div>
    <!--/.info-box-->
  </div>
  <!--/.col-->

  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="info-box brown-bg">

      <div class="count">HOSTELS</div>
      <div class="title">B103</div>
    </div>
    <!--/.info-box-->
  </div>
  <!--/.col-->

  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="info-box dark-bg">

      <div class="count">SESSION </div>
      <div class="title">22/3/2018</div>
    </div>
    <!--/.info-box-->
  </div>
  <!--/.col-->

  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="info-box green-bg">
      <div class="count">TIME TABLE</div>
      <div class="title">will be uploaded soon</div>
    </div>
    <!--/.info-box-->
  </div>
  <!--/.col-->

</div>
<!--/.row-->
<div class="row">
  <div class="col-md-6 ">

    <div class="panel panel-info">
      <div class="panel-heading">
        <h2><i class="fa fa-bell "></i><strong>NEW NOTIFICATIONS</strong></h2>
        <div class="panel-actions">
          <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
          <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
        </div>
      </div>

      <div class="panel-body " style="height:220px; padding: 0px;">
        
      </div>


    </div>
  </div>
  <div class="col-md-6 ">

    <div class="panel panel-info">
      <div class="panel-heading">
        <h2><i class="fa fa-home "></i><strong>HOSTELS</strong></h2>
        <div class="panel-actions">
          <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
          <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
        </div>
      </div>

      <div class="panel-body" style="height:220px; padding: 0px;" >
       
      </div>


    </div>
  </div>
</div>
@endsection