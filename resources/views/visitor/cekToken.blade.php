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
    @include('layouts/sections/navbar/nav')
    <section class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Display session error if available -->
                @if (session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-info mt-3">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card text-center">
                    <div class="card-header bg-info py-3">
                        <h4 class="text-center fw-bold text-white m-0">Cek Proses Lapor Temuan Anda!</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form starts here -->
                        <form action="{{ route('cekHasilToken') }}" method="POST">
                            @csrf
                            <label for="nik" class="m-0 mt-3">Masukkan NIK anda.</label>
                            <input type="text" name="nik" id="nik" class="form-control" required>

                            <label for="token" class="m-0 mt-3">Masukkan Token.</label>
                            <input type="text" name="token" id="token" class="form-control" required>

                            <button type="submit" class="btn btn-primary mt-3">Cek</button>
                        </form>
                        <!-- Form ends here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Display session message if available -->
        @if (session('message'))
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card text-center">
                        <div class="card-header bg-info py-3">
                            <h4 class="text-center fw-bold text-white m-0">Informasi Terkait Laporan Temuan Anda</h4>
                        </div>
                        @if (session('pengirim') && session('temuan'))
                            @php
                                $pengirim = session('pengirim');
                                $temuan = session('temuan');
                            @endphp
                        @endif
                        <div class="card-body text-start mt-3">
                            <h5>Nama pengirim: {{ $pengirim->nama }}</h5>
                            <h5>Tanggal: {{ $temuan->created_at }}</h5>
                            <h5>Status Lapor: <span
                                    class="bg-info rounded py-1 px-2 text-white">{{ $temuan->status }}</span> </h5>
                            {{-- <h5>Nama pengirim:frans</h5>
                        <h5>Tanggal: tes</h5>
                        <h5>Status Lapor:  <span class="bg-info rounded py-1 px-2 text-white">sudah didaftar</span></h5> --}}
                            <div class="d-block text-center">
                                <button class="btn btn-primary">Download Sertifikat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!-- Vendor JS Files -->
    <script src={{ asset('assets/landingPage/vendor/purecounter/purecounter_vanilla.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/aos/aos.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/glightbox/js/glightbox.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/isotope-layout/isotope.pkgd.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/swiper/swiper-bundle.min.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/waypoints/noframework.waypoints.js') }}></script>
    <script src={{ asset('assets/landingPage/vendor/php-email-form/validate.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


    <!-- Template Main JS File -->
    <script src={{ asset('assets/landingPage/js/main.js') }}></script>
@endsection
