@extends('layouts/blankLayout')


@section('title', __('nav.judul') . ' - Lapor Temuan')


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
    <section>
        <h1 class="text-success mt-4 text-center">Lapor Temuan</h1>
        <form>
            <div class="border border-2 mx-5 p-3 mx-auto" style="max-width: 700px">
                <h3 class="text-center">Identitas Pengirim</h3>
                <div class="mb-3">
                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik">
                </div>
            </div>

            <div class="mt-3 border border-2 mx-5 p-3 mx-auto" style="max-width: 700px">
                <h3 class="text-center">Data Struktur</h3>
                <div class="row g-3 mb-3">
                    <div class="col-9">
                        <label for="namaStruktur" class="form-label">Nama ODCB/CB di Lapangan</label>
                        <input type="text" class="form-control" id="namaStruktur">
                    </div>
                    <div class="col-3">
                        <label for="stafStruktur" class="form-label">Staf Struktur</label>
                        <select class="form-select" aria-label="Default select example" id="stafStruktur">
                            <option selected value="1">Campuran</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-9">
                        <label for="fungsiStruktur" class="form-label">Fungsi Struktur</label>
                        <input type="text" class="form-control" id="fungsiStruktur">
                    </div>
                    <div class="col-3">
                        <label for="periodeStruktur" class="form-label">Periode Struktur</label>
                        <select class="form-select" aria-label="Default select example" id="periodeStruktur">
                            <option selected value="1">Kolonial</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-3 border border-2 mx-5 p-3 mx-auto" style="max-width: 700px">
                <h3 class="text-center">Lokasi Penemuan</h3>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-select" aria-label="Default select example" id="provinsi">
                            <option selected value="1">Riau</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kota" class="form-label">Kabupaten/Kota</label>
                        <select class="form-select" aria-label="Default select example" id="kota">
                            <option selected value="1">Pekanbaru</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select" aria-label="Default select example" id="kecamatan">
                            <option selected value="1">Payung Sekaki</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-select" aria-label="Default select example" id="kelurahan">
                            <option selected value="1">Sungai Sibam</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat">
                        </div>
                        <div class="col">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude">
                        </div>
                        <div class="col">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude">
                        </div>
                        <div class="col">
                            <label for="ketinggian" class="form-label">Ketinggian(mdpl)</label>
                            <input type="text" class="form-control" id="ketinggian">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 border border-2 mx-5 p-3 mx-auto" style="max-width: 700px">
                <h3 class="text-center">Data Fisik</h3>
                <div class="row g-3 mb-3">
                    <div class="col-4">
                        <label for="bahanBangunan" class="form-label">Bahan Bangunan</label>
                        <input type="text" class="form-control" id="bahanBangunan">
                    </div>
                    <div class="col">
                        <label for="satuanWaktuPembuatan" class="form-label">Satuan Waktu Pembuatan</label>
                        <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan">
                            <option selected value="1"></option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="periodeWaktuPembuatan" class="form-label">Periode Waktu Pembuatan</label>
                        <select class="form-select" aria-label="Default select example" id="periodeWaktuPembuatan">
                            <option selected value="1"></option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="waktuPembuatan" class="form-label">Waktu Pembuatan</label>
                        <input type="text" class="form-control" id="waktuPembuatan">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-4">
                            <label for="ornamenBangunan" class="form-label">Ornamen Bangunan</label>
                            <input type="text" class="form-control" id="alamat">
                        </div>
                        <div class="col-4">
                            <label for="tandaBangunan" class="form-label">Tanda Bangunan</label>
                            <input type="text" class="form-control" id="tandaBangunan">
                        </div>
                        <div class="col">
                            <label for="warnaBangunan" class="form-label">Warna Bangunan</label>
                            <select class="form-select" aria-label="Default select example" id="warnaBangunan">
                                <option selected value="1"></option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-3 border border-2 mx-5 p-3 mx-auto" style="max-width: 700px">
                <h3 class="text-center">Data Dimensi</h3>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="row g-0">
                          <label for="satuanWaktuPembuatan" class="form-label">Panjang</label>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example"
                                    id="satuanWaktuPembuatan">
                                    <option selected value="1">Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-4">
                            <label for="ornamenBangunan" class="form-label">Ornamen Bangunan</label>
                            <input type="text" class="form-control" id="alamat">
                        </div>
                        <div class="col-4">
                            <label for="tandaBangunan" class="form-label">Tanda Bangunan</label>
                            <input type="text" class="form-control" id="tandaBangunan">
                        </div>
                        <div class="col">
                            <label for="warnaBangunan" class="form-label">Warna Bangunan</label>
                            <select class="form-select" aria-label="Default select example" id="warnaBangunan">
                                <option selected value="1"></option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- End About Section -->

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
