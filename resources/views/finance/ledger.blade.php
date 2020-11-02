@extends('layouts.header')
@section('title','Ledger')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-dashboard"> Ledger Account</i></li>
</ol>
@endsection
@push('head')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-minimal.css">
<!-- morris -->
<link rel="stylesheet" href="{{ asset('css/morris.css') }}">

<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
<link href="//cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css" rel="stylesheet">

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<script type="text/javascript">
  // display pace on ajax start
  $(document).ajaxStart(function() { Pace.restart(); });

  // enable tooltip
  $('[data-toggle="tooltip"]').tooltip();

</script>
  @include('finance.js.index')
@endpush