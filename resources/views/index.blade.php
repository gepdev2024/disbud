@extends('layouts/blankLayout')

@section('title', __('nav.judul'))
<link href={{ asset('assets/landingPage/img/logo1.png') }} rel="icon">
<link href={{ asset('assets/landingPage/img/apple-touch-icon.png') }} rel="apple-touch-icon">

<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href={{ asset('assets/landingPage/vendor/aos/aos.css') }} rel="stylesheet">
<link href={{ asset('assets/landingPage/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
<link href={{ asset('assets/landingPage/vendor/bootstrap-icons/bootstrap-icons.css') }} rel="stylesheet">
<link href={{ asset('assets/landingPage/vendor/boxicons/css/boxicons.min.css') }} rel="stylesheet">
<link href={{ asset('assets/landingPage/vendor/glightbox/css/glightbox.min.css') }} rel="stylesheet">
<link href={{ asset('assets/landingPage/vendor/swiper/swiper-bundle.min.css') }} rel="stylesheet">

<!-- Template Main CSS File -->
<link href={{ asset('assets/landingPage/css/style.css') }} rel="stylesheet">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9LD1NDKPRC"></script>
<style>
    @import url("https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css");

    .card:hover {
        background-color: #FFD099;
        /* Change to your desired background color */
        color: #fff;
        /* Change to your desired text color */
        transition: background-color 0.3s ease;
        /* Add a smooth transition effect */
    }

    .card-body:hover .badge {
        background-color: #2B3499;
        /* Change to your desired text color on hover */
        transition: background-color 0.3s ease;
        /* Add a smooth transition effect */
    }
</style>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-9LD1NDKPRC');
</script>
@section('page-script')
    <script src="{{ asset('assets/js/ui-popover.js') }}"></script>
@endsection

@section('content')
    <div class="position-relative pt-8">
        @include('layouts/sections/navbar/nav')

        <button style="z-index: 5000" type="button" class="btn btn-light text-nowrap position-fixed border bottom-0 end-0 "
            data-bs-toggle="popover" data-bs-offset="0,14" data-bs-placement="left" data-bs-html="true"
            data-bs-content="<p>{{ $visitor }}</p>" title="{{ __(' landing.visitor') }}">
            {{ $visitor }}<i class="bx bx-user"></i>
        </button>

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex">
            <div class="container text-center" data-aos="zoom-out" style="margin-top:80px">
                <h6 st>{{__('landing.welcome')}}</h6>
                <h2 style="color: #FF9209;font-size: 40px;font-weight: bold">{{__('landing.judul')}}
                </h2>
                <div class="d-inline"
                    style="font-size: 20px; background-color:#2B3499; padding: 16px; color: white;border-radius: 8px">
                    {{__('landing.deskripsi')}}
                </div>

            </div>
        </section><!-- End Hero -->
        <section>
            <div class="section-title">
                <h2>{{__('landing.kategori')}}</h2>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fi fi-rr-bank" style="font-size: 32px; color: #FF9209; "></i>
                            <div style="font-size: 16px;margin-top: 10px;margin-bottom: 10px">{{__('landing.bangunan')}}</div>
                            <span class="badge bg-secondary">{{ $bangunan }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fi fi-rr-coins" style="font-size: 32px; color: #FF9209; "></i>
                            <div style="font-size: 16px;margin-top: 10px;margin-bottom: 10px">{{__('landing.benda')}}</div>
                            <span class="badge bg-secondary">{{ $benda }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fi fi-rr-layers" style="font-size: 32px; color: #FF9209; "></i>
                            <div style="font-size: 16px;margin-top: 10px;margin-bottom: 10px">{{__('landing.struktur')}}</div>
                            <span class="badge bg-secondary">{{ $struktur }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fi fi-rr-home-location-alt" style="font-size: 32px; color: #FF9209; "></i>
                            <div style="font-size: 16px;margin-top: 10px;margin-bottom: 10px">{{__('landing.situs')}}</div>
                            <span class="badge bg-secondary">{{ $situs }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fi fi-rr-school" style="font-size: 32px; color: #FF9209; "></i>
                            <div style="font-size: 16px;margin-top: 10px;margin-bottom: 10px">{{__('landing.kawasan')}}</div>
                            <span class="badge bg-secondary">{{ $kawasan }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <main id="main">
            <!-- ======= About Section ======= -->
            <section id="about" class="about section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>{{ __('landing.profil') }}</h2>
                        <h3>{{ __('landing.profil1') }}</h3>
                        <p>
                            {{ __('landing.profil2') }}
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <img src={{ asset('assets/img/logo1.png') }} class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                            data-aos="fade-up" data-aos-delay="100">
                            <h3>{{ __('landing.visiMisi') }}</h3>
                            <ul>
                                <li>
                                    <i class="bx bx-analyse"></i>
                                    <div>
                                        <h5>{{ __('landing.visi') }}</h5>
                                        <p>
                                            {{ __('landing.visi1') }}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-bullseye"></i>
                                    <div>
                                        <h5>{{ __('landing.misi') }}</h5>
                                        <p>
                                            {{ __('landing.misi1') }}
                                        </p>
                                        <p>
                                            {{ __('landing.misi2') }}
                                        </p>
                                        <p>
                                            {{ __('landing.misi3') }}
                                        </p>
                                        <p>
                                            {{ __('landing.misi4') }}
                                        </p>
                                        <p>
                                            {{ __('landing.misi5') }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section><!-- End About Section -->


            <!-- ======= Services Section ======= -->
            <section id="KabupatenKota" class="services">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>
                            {{ __('landing.kabkot') }}
                        </h2>
                        <h3>
                            {{ __('landing.kabkot1') }}
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/pekanbaru.jpg') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/120">Pekanbaru</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/dumai.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/313">Dumai</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/bengkalis.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/444">Bengkalis</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/indragiri_hilir.jpg') }}
                                        alt="">
                                </div>
                                <h4><a href="objekWisata/472">Indragiri Hilir</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/indragiri_hulu.png') }}
                                        alt="">
                                </div>
                                <h4><a href="objekWisata/421">Indragiri Hulu</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/kampar.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/363">Kampar</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40"
                                        src={{ asset('assets/img/kuantan_singingi.png') }} alt="">
                                </div>
                                <h4><a href="objekWisata/139">Kuantan Singingi</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/meranti.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/445">Meranti</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/pelalawan.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/361">Pelalawan</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/rokan_hilir.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/197">Rokan Hilir</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/rokan_hulu.jpg') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/364">Rokan Hulu</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box w-100">
                                <div class="icon"><img width="40" src={{ asset('assets/img/siak.png') }}
                                        alt=""></div>
                                <h4><a href="objekWisata/362">Siak</a></h4>
                                {{-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
                            </div>
                        </div>
                    </div>

                </div>

        </main>
        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 footer-contact">
                            <img src={{ asset('assets/img/logo1.png') }} class="img-fluid w-50" alt="">
                            <p class="mt-4">
                                <i class="bx bx-map"></i>
                                Jalan Sudirman No. 194 Tangkerang, Pekanbaru 28282 <br>
                            </p>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('landing.beranda') }}</a>
                                </li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#about">{{ __('landing.profil') }}</a>
                                </li>
                                <li><i class="bx bx-chevron-right"></i> <a
                                        href="#KabupatenKota">{{ __('landing.kabkot1') }}</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>{{ __('landing.sosmed') }}</h4>
                            <p>{{ __('landing.sosmed1') }}</p>
                            <div class="social-links mt-3">
                                <a href="https://m.facebook.com/p/Dinas-Kebudayaan-Provinsi-Riau-100069055995152/?locale=id_ID"
                                    target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/disbud.provriau/" target="_blank" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container py-4">
                <div class="copyright">
                    &copy; Copyright <strong><span>Dinas Kebudayaan Provinsi Riau</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                </div>
            </div>
        </footer><!-- End Footer -->
    </div>
    </section><!-- End Services Section -->

    <!-- Vendor JS Files -->
    <script src={{ asset('assets/landingPage/vendor/purecounter/purecounter_vanilla.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/aos/aos.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/glightbox/js/glightbox.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/isotope-layout/isotope.pkgd.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/swiper/swiper-bundle.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/waypoints/noframework.waypoints.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/php-email-form/validate.js') }}></script>

    <!-- Template Main JS File -->
    <script src={{ asset('assets/landingPage/js/main.js') }}></script>
@endsection
