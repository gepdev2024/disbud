<!-- Template Main CSS File -->
<link href={{ asset('assets/landingPage/css/style.css') }} rel="stylesheet">

<!-- ======= Header ======= -->

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="d-flex">
            <img width="30px" src="{{ asset('assets/img/logo.png') }}" alt="" style="margin-right: 10px">
            <img width="30px" src="{{ asset('assets/img/logo1.png') }}" alt="" style="margin-right: 10px">
            <div class="">
                <div style="font-weight: 900;font-size: 20px;">Cagar Budaya</div>
                <div style="font-weight: 200;font-size: 12px;">Dinas Kebudayaan Provinsi Riau</div>
            </div>
        </div>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link " href="/">{{ __('nav.Beranda') }}</a></li>
                <li><a class="nav-link" href="/cagarBudaya">{{ __('nav.cagarBudaya') }}</a></li>
                <li><a class="nav-link" href="/data">Data</a></li>
                <li><a class="nav-link" href="/laporTemuan">{{ __('nav.laporTemuan') }}</a></li>
                @if (App::getlocale() == 'id')
                    <li class="nav-item  rounded-circle d-flex align-items-center">
                        <a class="rounded-circle active" href="locale/id"><img width="28"
                                class="d-block  object-fit-cover" src="{{ asset('assets/img/id.png') }}" /></a>
                    </li>
                    <li class="nav-item rounded-circle">
                        <a class=" rounded-circle" href="locale/en"><img width="28"
                                class="d-block  object-fit-cover" src="{{ asset('assets/img/en.png') }}" /></a>
                    </li>
                @else
                    <li class="nav-item rounded-circle d-flex align-items-center">
                        <a class="rounded-circle" href="locale/id"><img width="28" class="d-block  object-fit-cover"
                                src="{{ asset('assets/img/id.png') }}" /></a>
                    </li>
                    <li class="nav-item rounded-circle">
                        <a class="rounded-circle active" href="locale/en"><img width="28"
                                class="d-block  object-fit-cover" src="{{ asset('assets/img/en.png') }}" /></a>
                    </li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- Template Main JS File -->
<script src={{ asset('assets/landingPage/js/main.js') }}></script>
