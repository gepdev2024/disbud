<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">
      <img width="25" src="{{ asset('assets/img/logo.png') }}" alt="">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Menu Item -->
    <li class="menu-item {{ request()->routeIs('kota.objek-wisata') ? 'active' : '' }}">
      <a href="{{ url('kota/objek-wisata') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div>Objek Wisata</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('data-foto') ? 'active' : '' }}">
      <a href="{{ url('foto') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-photo"></i>
        <div>Foto</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('logout') ? 'active' : '' }}">
      <a href="{{ url('logout') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-log-out"></i>
        <div>Logout</div>
      </a>
    </li>
  </ul>

</aside>
