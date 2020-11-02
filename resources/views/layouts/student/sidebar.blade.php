<ul class="sidebar-menu">
  <li class="active">
    <a class="" href="{{ url('home') }}">
      <i class="icon_house_alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- Dynamic links -->
  @foreach($studentMenus as $menus)
  <li class="sub-menu">
    <a href="javascript:;" class="">
      <i class="{{ $menus->icon->icon_path }}"></i> 
      <span>{{ $menus->menu_name }}</span>
      <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
      @foreach ($submenus->where('menu_id',$menus->id) as $menu)
      <li><a href="/{{ $menu->link }}"><i class="{{ $menu->icon->icon_path ?? null }}"></i>{{ $menu->menu_name }}</a></li>
      @endforeach
    </ul>
  </li>
  @endforeach
</ul>