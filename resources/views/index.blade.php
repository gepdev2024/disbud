@extends('layouts/blankLayout')

@section('title', __('nav.judul'))
<link href={{asset("assets/landingPage/img/logo1.png")}} rel="icon">
<link href={{asset("assets/landingPage/img/apple-touch-icon.png")}} rel="apple-touch-icon">

<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href={{asset("assets/landingPage/vendor/aos/aos.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/bootstrap-icons/bootstrap-icons.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/boxicons/css/boxicons.min.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/glightbox/css/glightbox.min.css")}} rel="stylesheet">
<link href={{asset("assets/landingPage/vendor/swiper/swiper-bundle.min.css")}} rel="stylesheet">

<!-- Template Main CSS File -->
<link href={{asset("assets/landingPage/css/style.css")}} rel="stylesheet">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9LD1NDKPRC"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9LD1NDKPRC');
</script>
@section('page-script')
<script src="{{asset('assets/js/ui-popover.js')}}"></script>
@endsection

@section('content')
<div class="position-relative">
    @include('layouts/sections/navbar/nav')

    <button style="z-index: 5000" type="button" class="btn btn-light text-nowrap position-fixed border bottom-0 end-0 " data-bs-toggle="popover" data-bs-offset="0,14"
        data-bs-placement="left" data-bs-html="true"
        data-bs-content="<p>{{$visitor}}</p>"
        title="{{__("landing.visitor")}}">
        {{$visitor}}<i class="bx bx-user"></i>
    </button>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex     align-items-center">
        <div class="container" data-aos="zoom-out">
            <h1>{{__("landing.judul")}}</h1>
            <h2>{{__("landing.deskripsi")}}</h2>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">{{__("landing.lanjut")}}</a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{__("landing.profil")}}</h2>
                    <h3>{{__("landing.profil1")}}</h3>
                    <p>
                        {{__("landing.profil2")}}
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src={{ asset('assets/img/logo1.png') }} class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <h3>{{__("landing.visiMisi")}}</h3>
                        <ul>
                            <li>
                                <i class="bx bx-analyse"></i>
                                <div>
                                    <h5>{{__("landing.visi")}}</h5>
                                    <p>
                                        {{__("landing.visi1")}}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="bx bx-bullseye"></i>
                                <div>
                                    <h5>{{__("landing.misi")}}</h5>
                                    <p>
                                        {{__("landing.misi1")}}
                                    </p>
                                    <p>
                                        {{__("landing.misi2")}}
                                    </p>
                                    <p>
                                        {{__("landing.misi3")}}
                                    </p>
                                    <p>
                                        {{__("landing.misi4")}}
                                    </p>
                                    <p>
                                        {{__("landing.misi5")}}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>
                        {{__("landing.kabkot")}}
                    </h2>
                    <h3>
                        {{__("landing.kabkot1")}}
                    </h3>
                </div>

                <div class="row">
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/pekanbaru.jpg")}} alt=""></div>
                            <h4><a href="objekWisata/120">Pekanbaru</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/dumai.png")}} alt=""></div>
                            <h4><a href="objekWisata/313">Dumai</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/bengkalis.png")}} alt=""></div>
                            <h4><a href="objekWisata/444">Bengkalis</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/indragiri_hilir.jpg")}} alt="">
                            </div>
                            <h4><a href="objekWisata/472">Indragiri Hilir</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/indragiri_hulu.png")}} alt="">
                            </div>
                            <h4><a href="objekWisata/421">Indragiri Hulu</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/kampar.png")}} alt=""></div>
                            <h4><a href="objekWisata/363">Kampar</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/kuantan_singingi.png")}} alt="">
                            </div>
                            <h4><a href="objekWisata/139">Kuantan Singingi</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/meranti.png")}} alt=""></div>
                            <h4><a href="objekWisata/445">Meranti</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/pelalawan.png")}} alt=""></div>
                            <h4><a href="objekWisata/361">Pelalawan</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/rokan_hilir.png")}} alt=""></div>
                            <h4><a href="objekWisata/197">Rokan Hilir</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/rokan_hulu.jpg")}} alt=""></div>
                            <h4><a href="objekWisata/364">Rokan Hulu</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box w-100">
                            <div class="icon"><img width="40" src={{asset("assets/img/siak.png")}} alt=""></div>
                            <h4><a href="objekWisata/362">Siak</a></h4>
                            {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- Vendor JS Files -->
        <script src={{asset("assets/landingPage/vendor/purecounter/purecounter_vanilla.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/aos/aos.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/glightbox/js/glightbox.min.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/isotope-layout/isotope.pkgd.min.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/swiper/swiper-bundle.min.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/waypoints/noframework.waypoints.js")}}></script>
        <script src={{asset("assets/landingPage/vendor/php-email-form/validate.js")}}></script>

        <!-- Template Main JS File -->
        <script src={{asset("assets/landingPage/js/main.js")}}></script>
    </main>
</div>
@endsection