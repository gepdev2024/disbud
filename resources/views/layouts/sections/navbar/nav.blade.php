<nav class="navbar  navbar-expand-lg navbar-light bg-primary justify-content-between">
    <div class="container ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">{{__('nav.Beranda')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cagarBudaya">{{__('nav.cagarBudaya')}}</a>
                </li>

            </ul>
        </div>
        <ul class="navbar-nav mr-auto">
            @if ( App::getlocale()== 'id')
            <li class="nav-item bg-white rounded-circle d-flex justify-content-center align-items-center">
                <a class="bg-light rounded-circle" href="locale/id"><img width="28"
                        class="d-block  object-fit-cover" src="{{asset('assets/img/id.png')}}" /></a>
            </li>
            <li class="nav-item mx-2 rounded-circle">
                <a class="bg-light rounded-circle" href="locale/en"><img width="30"
                        class="d-block  object-fit-cover" src="{{asset('assets/img/en.png')}}" /></a>
            </li>
            @else
            <li class="nav-item rounded-circle d-flex justify-content-center align-items-center">
                <a class="bg-light rounded-circle" href="locale/id"><img width="28"
                        class="d-block  object-fit-cover" src="{{asset('assets/img/id.png')}}" /></a>
            </li>
            <li class="nav-item mx-2 bg-white rounded-circle">
                <a class="bg-light rounded-circle" href="locale/en"><img width="30"
                        class="d-block  object-fit-cover" src="{{asset('assets/img/en.png')}}" /></a>
            </li>
            @endif
        </ul>
    </div>
</nav>