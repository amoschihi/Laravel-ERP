<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a href="" class="logo"><span class="lite">{{ config('app.name') }}</span></a>
  <!--logo end-->

  <ul class="nav pull-right top-menu">

    <!-- user login dropdown start-->
    <li class="dropdown">
      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="profile-ava">
          <img alt="" width="40" src="{{ asset('storage/profile.png') }}">
        </span>
        <span class="username">{{ Auth::user()->name }}</span>
        <b class="caret"></b>
      </a>
      <ul class="dropdown-menu extended logout">
        <div class="log-arrow-up"></div>
        <li class="eborder-top">
          <a href="{{ url('main_details') }}"><i class="fa fa-user"></i> My Profile</a>
        </li>
        <li>
          <a href="{{ url('news') }}"><i class="icon_mail_alt"></i> Messages</a>
        </li>
        <li>
          <a onclick="document.getElementById('logout').submit();"><i class="icon_key_alt"></i> Log Out</a>
          <form id="logout" action="{{ url('logout') }}" method="POST">
            {{ csrf_field() }}
          </form>
        </li>

      </ul>
    </li>
    <!-- user login dropdown end -->
  </ul>
  <!-- notificatoin dropdown end-->
</div>
</header>