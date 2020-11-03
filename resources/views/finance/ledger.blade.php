@extends('layouts.header')
@section('title','Ledger')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-dashboard"> Ledger Account</i></li>
</ol>
@endsection
@push('head')
<link rel="stylesheet" href="{{ asset('css/pace-theme-minimal.css') }} ">
<!-- morris -->
<link rel="stylesheet" href="{{ asset('css/morris.css') }}">

<link href="{{ asset('css/dataTables.bootstrap.min.css') }} " rel="stylesheet">
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.dataTables.min.css') }} " rel="stylesheet">

<style type="text/css">
#table-ledger_length{
  float: left;
}
</style>

<style type="text/css">
#current-balance {
  font-weight: bold;
}
button, .btn:focus, .btn:focus:active, .paginate_button a:focus, .paginate_button a:focus:active{
  outline-color:white !important;
}
</style>
@endpush

@section('content')
<div class="row">

    <div class="col-md-4 col-sm-12">
      @include('finance.panels.account-summary')
    </div>

    <div class="col-md-4 col-sm-12">
      @include('finance.panels.new-debit')
    </div>        

    <div class="col-md-4 col-sm-12">
      @include('finance.panels.new-credit')
    </div>

    <div class="col-md-12 col-sm-12">
      @include('finance.panels.transaction-history')
    </div>

  </div>

  @include('finance.panels.table-ledger')

@endsection

@push('bottom')

<script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('js/pace.min.js') }}"></script>
<script type="text/javascript">
  // display pace on ajax start
  $(document).ajaxStart(function() { Pace.restart(); });

  // enable tooltip
  $('[data-toggle="tooltip"]').tooltip();

</script>
  @include('finance.js.index')
@endpush