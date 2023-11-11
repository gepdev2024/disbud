<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/"><img width="100%" src="{{asset('assets/img/logo.png')}}" alt=""></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link " href="/">{{__("nav.Beranda")}}</a></li>
                <li><a class="nav-link" href="/cagarBudaya">{{__("nav.cagarBudaya")}}</a></li>
                @if ( App::getlocale()== 'id')
                <li class="nav-item  rounded-circle d-flex justify-content-center align-items-center">
                    <a class="rounded-circle active" href="locale/id"><img width="28" class="d-block  object-fit-cover"
                            src="{{asset('assets/img/id.png')}}" /></a>
                </li>
                <li class="nav-item rounded-circle">
                    <a class=" rounded-circle" href="locale/en"><img width="28" class="d-block  object-fit-cover"
                            src="{{asset('assets/img/en.png')}}" /></a>
                </li>
                @else
                <li class="nav-item rounded-circle d-flex justify-content-center align-items-center">
                    <a class="rounded-circle" href="locale/id"><img width="28" class="d-block  object-fit-cover"
                            src="{{asset('assets/img/id.png')}}" /></a>
                </li>
                <li class="nav-item rounded-circle">
                    <a class="rounded-circle active" href="locale/en"><img width="28" class="d-block  object-fit-cover"
                            src="{{asset('assets/img/en.png')}}" /></a>
                </li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->