<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="{{ config('app.name') }}">
  <meta name="author" content="{{ config('app.name') }}">
  <meta name="keyword" content="{{ config('app.name') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('storage/img/'.$app->favicon) }}">

  <title>@yield('title',config('app.name'))</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles -->
  <link href="{{ asset('css/studentStyle.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('js/jquery-ui-1.10.4.min.css') }}" rel="stylesheet" />
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--header start-->
    @include('layouts.student.header')
    <!-- header end -->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        @include('layouts.student.sidebar')
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!-- sidebar end -->

    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        @yield('content')
        <!-- overview end -->
      </section>
    </section>
  </section>
  <!-- container section end -->

  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{asset('js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- nice scroll -->
  <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="{{ asset('assets/jquery-knob/js/jquery.knob.js') }}"></script>
  <!--custome script for all page-->
  <script src="{{ asset('js/scripts.js') }}"></script>
  @stack('scripts')
  
  <script>
    //knob
    $(".knob").knob();
    $(".vin").tabs();
  </script>
</body>
</html>