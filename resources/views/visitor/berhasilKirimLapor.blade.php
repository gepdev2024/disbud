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

<style>
    .btn-primary {
        color: #fff;
        background-color: #106eea !important;
        border-color: #106eea !important;
        box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4) !important;
    }

    .btn-check:checked+.btn-primary,
    .btn-check:active+.btn-primary,
    .btn-primary:active,
    .btn-primary.active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #FF9209 !important;
        border-color: #FF9209 !important;
    }

    @media (max-width: 767px) {
        h2 {
            font-size: 16px !important;
            /* Gunakan !important untuk memastikan aturan ini memiliki prioritas */
        }
    }
</style>

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

        <div class="relative row h-75  flex justify-content-center align-items-center">
            <div class="col-8">
                <div class="card text-center">
                    <div class="card-header bg-info py-3">
                        <h4 class="text-center fw-bold text-white m-0">Berhasil Kirim Lapor Temuan!</h4>
                    </div>
                    <div class="card-body">
                        <p class="m-0 mt-3">Terimakasih karena sudah mengirim lapor temuan cagar budaya.</p>
                        <h5 class="m-0 mt-3 mb-1">Token Anda</h5>
                        <div class="d-inline-block rounded align-items-center justify-content-center p-2"
                            style="border: 2px dashed black">
                            <h5 class="card-title m-0 d-inline">
                                <span class="fw-bold" id="tokenText">{{ $pengirim->token }}</span>
                                <button id="copyButton" class="btn btn-info btn-sm ms-2">Copy</button>
                            </h5>
                        </div>

                        <p class="card-text m-0 mt-3 mb-1">Simpan token anda untuk mengecek proses laporan temuan anda.</p>
                        <a href="/cekToken" class="btn btn-primary">Cek Proses Laporan Temuan Anda</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const copyButton = document.getElementById('copyButton');
                const tokenText = document.getElementById('tokenText');

                copyButton.addEventListener('click', function() {
                    // Create a temporary input element
                    const tempInput = document.createElement('input');
                    tempInput.value = tokenText.textContent;
                    document.body.appendChild(tempInput);

                    // Select and copy the text
                    tempInput.select();
                    document.execCommand('copy');

                    // Remove the temporary input element
                    document.body.removeChild(tempInput);

                    // Optionally, display a message or change button text
                    copyButton.textContent = 'Copied!';
                    setTimeout(() => copyButton.textContent = 'Copy',
                        1500); // Reset button text after 1.5 seconds
                });
            });
        </script>

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
