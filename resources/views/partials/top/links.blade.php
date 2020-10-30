<!-- /.dropdown -->
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <!-- User Account Menu -->
    <li class="dropdown">
      <a class="dropdown-toggle" id="c_dropdown" data-toggle="dropdown" href="#">
        <div class="button"><i class="fa fa-envelope"></i><span id="c_count" class="button__badge label"></span></div><i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-messages">
        
      </ul>
      <!-- /.dropdown-messages -->
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" id="n_dropdown" data-toggle="dropdown" href="#">
        <div class="button"><i class="fa fa-bell"></i><span id="n_count" class="button__badge label"></span></div><i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-alerts">
        
      </ul>
      <!-- /.dropdown-alerts -->
    </li>
    
    <li class="dropdown user user-menu">
      <!-- Menu Toggle Button -->
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="{{ asset("storage/users/".Auth::user()->picturefile) }}" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
          <img src="{{ asset('storage/users/'.Auth::user()->picturefile) }}" class="img-circle" alt="User Image">

          <p style="color: black">
            Hello {{ Auth::user()->name }}
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
         @if (Auth::guest())
         <div class="pull-left">
          <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
        </div>
        @else
        <div class="pull-left">
          <a class="btn btn-primary btn-flat" href="{{ url('admin/profile') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a>
        </div>
        <div class="pull-right">
          <a data-toggle="tooltip" title="Sign out" class="btn btn-default btn-flat" href="{{ url('admin/lockscreen') }}"><i class="fa fa-key"></i></a>
          <a data-toggle="tooltip" title="Log out" class="btn btn-danger btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
        @endif
      </li>
    </ul>
  </li>
</ul>
</div>
<!-- /.dropdown -->