<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>::LOCKSCREEN::</title>
  <meta name='generator' content='CRUDBooster'/>
  <meta name='robots' content='noindex,nofollow'/>
  <link rel="shortcut icon" href="">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

      <link rel='stylesheet' href='{{asset("css/main.css")}}'/>
      <style type="text/css">
      .lockscreen {
        background: ;
        color: !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }  
    </style>

  </head>
  <body class="lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="lockscreen-logo">
            <h2 class="text-uppercase">{{$app->appname}}</h2>
          </div>
        </div>
        <div class="panel-body" style="background: #f5f5f5">
         <!-- User name -->
         <div class="lockscreen-name">{{ Auth::user()->name }}</div>

         <!-- START LOCK SCREEN ITEM -->
         <div class="lockscreen-item">
          <!-- lockscreen image -->
          <div class="lockscreen-image">
            <img src="{{ asset('storage/users/'.Auth::user()->picturefile) }}" alt="user image"/>
          </div>
          <!-- /.lockscreen-image -->

          <!-- lockscreen credentials (contains the form) -->
          <form class="lockscreen-credentials" method='post' action="{{url('admin/lockscreen')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="input-group">
              <input type="password" class="form-control" required name='password' placeholder="Password" />
              <div class="input-group-btn">
                <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
              </div>
            </div>
          </form><!-- /.lockscreen credentials -->

        </div><!-- /.lockscreen-item -->
      </div>
      <div class="panel-footer">
        <div class="text-center">
          Enter your password to retrieve your session
        </div>
        <div class="text-center">
          <a href="{{ url('/') }}">Or Sign In as a different user</a>
        </div>
        <div class='lockscreen-footer text-center'>
          Copyright &copy; {{date("Y")}}<br>
          All rights reserved
        </div>
      </div>
    </div>



  </div><!-- /.center -->



  <!-- jQuery 2.1.3 -->
  <script src="{{asset('js/jquery.js')}}"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
</body>
</html>