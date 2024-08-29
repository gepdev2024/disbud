<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">
      <img width="25" src="{{ asset('assets/img/logo.png') }}" alt="">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Menu untuk role kota -->
    @if (auth()->user()->role == 'kota')
      <li class="menu-item {{ request()->routeIs('kota.objek-wisata') ? 'active' : '' }}">
        <a href="{{ url('kota/objek-wisata') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div>Objek Wisata</div>
        </a>
      </li>
      <li class="menu-item {{ request()->routeIs('kota.temuan') ? 'active' : '' }}">
        <a href="{{ url('kota/temuan') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-search"></i>
          <div>Temuan</div>
        </a>
      </li>
      {{-- <li class="menu-item {{ request()->routeIs('data-foto') ? 'active' : '' }}">
        <a href="{{ url('foto') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-photo"></i>
          <div>Foto</div>
        </a>
      </li> --}}
    @endif

    <!-- Menu untuk role provinsi -->
    @if (auth()->user()->role == 'provinsi')
      <li class="menu-item {{ request()->routeIs('provinsi.objek-wisata') ? 'active' : '' }}">
        <a href="{{ url('objek-wisata') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div>Objek Wisata</div>
        </a>
      </li>
      <li class="menu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <a href="{{ url('users') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div>User</div>
        </a>
      </li>
    @endif

    <!-- Menu umum yang bisa diakses oleh semua role -->
    <li class="menu-item {{ request()->routeIs('logout') ? 'active' : '' }}">
      <a href="{{ url('logout') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-log-out"></i>
        <div>Logout</div>
      </a>
    </li>
  </ul>

</aside>
