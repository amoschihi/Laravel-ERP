<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/img/'.$app->favicon) }}">
  <input type="hidden" name="userId" value="{{  Auth::user()->id }}">

  <title>@yield('title', config('app.name', $app->appname))</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

  <!-- Select2 CSS -->
  <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">

  <!-- SweetAlert CSS -->
  <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}">
  <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">

  {!! Charts::styles() !!}
  @stack('head')
</head>

<body>
  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <button title="Toggle sidebar" data-toggle="tooltip" data-placement="bottom" type="button" 
                id="sidebarCollapse" class="btn btn-info btn-flat navbar-btn">
                <b class="lx"><i class="fa fa-arrow-left"></i></b>
                <b class="mx"><i class="fa fa-arrow-right"></i></b>
        </button>
        <a class="navbar-brand lx" 
            href="{{ session('whoIsLoggedIn')=='instructor'?url('/admin'):
            (session('whoIsLoggedIn')=='finance'?url('admin/dashboard'):url('admin/home')) }}">
            <img src="{{ asset('storage/img/'.$app->logo) }}"></a>
        <a class="navbar-brand mx" 
            href="{{ session('whoIsLoggedIn')=='instructor'?url('/admin'):
            (session('whoIsLoggedIn')=='finance'?url('admin/dashboard'):url('admin/home')) }}">
            @php preg_match_all("/(?<=\s|^)[a-z]/i", $app->appname, $matches ); @endphp 
            {{ strtoupper(implode('',$matches[0])) }} 
        </a>
        {{-- <a class="navbar-brand lx" href="{{ url('/admin') }}"><strong>{{strtoupper($app->appname)}}</strong></a> --}}
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <!-- Top links -->
        @include('partials.top.links')
      </ul>
      <!-- Sidebar -->
      @include('partials.sidebar')
    </nav>
    <!--User bar-->
    @include('partials.bar')

    <!-- Page-wrapper -->
    <div id="page-wrapper">
      @yield('content')
    </div>

    <!-- Page-footer -->
    <div id="page-footer">
      <!-- To the right -->
      <span class="pull-right hidden-xs">
        {{ $app->appname }}
      </span>
      <!-- Default to the left -->
      <strong>&copy; {{ date('Y') }}. All Rights Reserved</strong>
    </div>
    <!-- .Page-footer -->
  </div>
  <!-- /.wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/jszip.min.js') }}"></script>
  <script src="{{ asset('js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('js/buttons.print.min.js') }}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
  <script src="{{asset('js/jquery.PrintArea.js')}}"></script>
  <!-- Load items -->
  @include('scripts.preloaditems')
  @yield('script')
  @stack('bottom')

</body>
<!-- /.body -->
</html>
<!-- /.html -->

