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
  .file-label {
    display: inline-block;
    padding: 6px 12px;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: #17a2b8;
    color: #fff;
  }

  .file-label:hover {
    background-color: #138496;
    /* Darker shade of Bootstrap info color */
  }

  .error {
    color: red;
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
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

{{-- validation --}}
<script>
    $(document).ready(function($) {
        const requiredFields = [
            'luas_tanah',
            'lebar',
            'diameter_kaki',
            'lulus_struktur',
            'foto_ktp',
            'foto_gambar',
            'status_pengelolaan',
            'nama_pengelola',
            'pengelolaan_provinsi',
            'pengelolaan_kota',
            'pengelolaan_kecamatan',
            'pengelolaan_kelurahan',
            'pengelolaan_alamat',
            'pengelolaan_latitude',
            'pengelolaan_longitude',
            'status_kepemilikan',
            'nama_pemilik',
            'status_perolehan',
            'kepemilikan_provinsi',
            'kepemilikan_kota',
            'kepemilikan_kecamatan',
            'kepemilikan_kelurahan',
            'kepemilikan_alamat',
            'kepemilikan_latitude',
            'kepemilikan_longitude',
            'keutuhan',
            'pemeliharaan',
            'pemugaran',
            'adaptasi',
            'warna_bangunan',
            'satuan_tinggi',
            'satuan_panjang',
            'satuan_diameter_bawah',
            'satuan_diameter_atas',
            'warna_bangunan',
            'tanda_bangunan',
            'ornamen_bangunan',
            'waktu_pembuatan',
            'periode_waktu_pembuatan',
            'satuan_waktu_pembuatan',
            'penemuan_provinsi',
            'penemuan_kota',
            'penemuan_kecamatan',
            'penemuan_kelurahan',
            'penemuan_alamat',
            'penemuan_latitude',
            'penemuan_longitude',
            'penemuan_ketinggian',
            'periode_struktur',
            'staf_struktur',
            'nama_lengkap',
            'fungsi_struktur',
            'nama_struktur',
            'alamat',
            'latitude',
            'longitude',
            'ketinggian',
            'bahan_bangunan',
            'waktu_pembuatan',
            'ornamen_bangunan',
            'tanda_bangunan',
            'panjang',
            'diameter_atas',
            'diameter_bawah',
            'tinggi',
            'deskripsi_sejarah',
            'batas_zonasi_utara',
            'batas_zonasi_barat',
            'batas_zonasi_selatan',
            'batas_zonasi_timur',
            'nik',
            'pengelolaan_alamat',
            'pengelolaan_latitude',
            'pengelolaan_longitude',
            'unit_panjang',
            'unit_diameter_atas',
            'unit_tinggi',
            'unit_diameter_bawah',
            'unit_luas_tanah',
            'unit_lebar',
            'unit_diameter_kaki',
            'unit_lulus_struktur',
        ];
    const validationRules = {};
    const validationMessages = {};
        requiredFields.forEach(field => {
            validationRules[field] = {
                required: true
            };
            validationMessages[field] = {
                // required: `${field.replace(/_/g, ' ')} tidak boleh kosong`
                required: ""
            };
        });


        validationRules.nik = {
            required: true,
            digits: true
        };
        validationMessages.nik = {
            required: "",
            digits: "NIK hanya angka"
        };

        $('#myForm').validate({
            rules: validationRules,
            messages: validationMessages,
            onkeyup: false,
            onfocusout: false,
            onkeypress: true,
            onkeyup: function(element) {
                $(element).valid();
            },
            highlight: function(element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");

            },
        });


    validationRules.nik = {
      required: true,
      digits: true
    };
    validationMessages.nik = {
      required: "NIK tidak boleh kosong",
      digits: "NIK hanya angka"
    };

    $('#myForm').validate({
      rules: validationRules,
      messages: validationMessages,
      onkeyup: false,
      onfocusout: false,
      onkeypress: true,
      onkeyup: function(element) {
        $(element).valid();
      },
      highlight: function(element) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element) {
        $(element).removeClass("is-invalid");
      },
    });
  });
</script>

@section('content')
    @include('layouts/sections/navbar/nav')
    <section class="container mt-4">
        <div class="text-center">
            <h1 class="mt-3">Lapor Temuan Cagar Budaya</h1>
            <div class="mx-auto border border-2 rounded mb-3 border-success" style="width: 25%; margin-top:-10px"> </div>
        </div>
        <form action="laporTemuan" method="POST" enctype="multipart/form-data" id="myForm">
            @csrf
            <!-- Identitas Pengirim -->

            <div class="border border-1 border-secondary py-4 px-4 mb-4 mt-4 mx-auto rounded">
                <h3 class="text-center">Identitas Pengirim</h3>
                <div class="row">
                    <div class="col-md-5 mx-auto text-center">
                        <div class="mb-3 ">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}">
                            {{-- @error('nama_lengkap')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ old('nik') }}">
                            {{-- @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror --}}
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <label for="nik" class="form-label">KTP</label>
                    <div class="card mb-1 mx-auto" style="max-width: 400px;">
                        <div class="position-relative d-inline-block py-4">
                            <div>
                                <p id="fileDetails" class="mb-2 d-none"></p>
                                <img id="previewImage" class="mb-3 d-none" style="max-width: 200px;" />
                            </div>
                            <label for="foto_ktp" id="labelFotoKtp" class="file-label btn btn-info ">+ Tambah Foto
                                KTP</label>
                            <input type="file" id="foto_ktp" class="custom-file-input d-none " name="foto_ktp">
                            @error('foto_ktp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Struktur -->
            <div class="border border-secondary rounded border-1 py-4 mb-4">
                <div class="row">
                    <div class="col-md-7 mx-auto text-center">
                        <h3 class="text-center">Data Struktur</h3>
                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-8">
                                <label for="namaStruktur" class="form-label">Nama ODCB/CB di Lapangan</label>
                                <input type="text" class="form-control" id="namaStruktur" name="nama_struktur"
                                    value="{{ old('nama_struktur') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="stafStruktur" class="form-label">Staf Struktur</label>
                                <select class="form-select" aria-label="Default select example" id="stafStruktur"
                                    name="staf_struktur">
                                    <option selected value="" {{ old('staf_struktur') == '' ? 'selected' : '' }}>Pilih
                                    </option>
                                    <option value="Campuran"
                                        {{ old('staf_struktur') == 'Campuran' ? 'selected' : '' }}>Campuran</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gy-3 gx-4 mb-2">
                            <div class="col-md-8">
                                <label for="fungsiStruktur" class="form-label">Fungsi Struktur</label>
                                <input type="text" class="form-control" id="fungsiStruktur" name="fungsi_struktur"
                                    value="{{ old('fungsi_struktur') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="periodeStruktur" class="form-label">Periode Struktur</label>
                                <select class="form-select" aria-label="Default select example" id="periodeStruktur"
                                    name="periode_struktur">
                                    <option selected value="" {{ old('periode_struktur') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Kolonial" {{ old('periode_struktur') == 'Kolonial' ? 'selected' : '' }}>
                                        Kolonial</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Lokasi Penemuan -->
            <div class="border border-secondary rounded border-1 py-4 mb-4">
                <div class="row">
                    <div class="col-md-10 mx-auto text-center">
                        <h3 class="text-center">Lokasi Penemuan</h3>
                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select class="form-select" aria-label="Default select example" id="provinsi"
                                    name="penemuan_provinsi">
                                    <option selected value=""
                                        {{ old('penemuan_provinsi') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Riau"{{ old('penemuan_provinsi') == 'Riau' ? 'selected' : '' }}>
                                        Riau</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="kota" class="form-label">Kabupaten/Kota</label>
                                <select class="form-select" aria-label="Default select example" id="kota"
                                    name="penemuan_kota">
                                    <option selected value=""{{ old('penemuan_kota') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Pekanbaru"{{ old('penemuan_kota') == 'Pekanbaru' ? 'selected' : '' }}>
                                        Pekanbaru</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label="Default select example" id="kecamatan"
                                    name="penemuan_kecamatan">
                                    <option selected
                                        value=""{{ old('penemuan_kecamatan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Payung Sekaki"{{ old('penemuan_kecamatan') == 'Payung Sekaki' ? 'selected' : '' }}>
                                        Payung Sekaki</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <select class="form-select" aria-label="Default select example" id="kelurahan"
                                    name="penemuan_kelurahan">
                                    <option selected value=""
                                        {{ old('penemuan_kelurahan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Sungaisibam"{{ old('penemuan_kelurahan') == 'Sungaisibam' ? 'selected' : '' }}>
                                        Sungaisibam</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="penemuan_alamat"
                                    value="{{ old('penemuan_alamat') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="penemuan_latitude"
                                    value="{{ old('penemuan_latitude') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="penemuan_longitude"
                                    value="{{ old('penemuan_longitude') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="ketinggian" class="form-label">Ketinggian (mdpl)</label>
                                <input type="text" class="form-control" id="ketinggian" name="penemuan_ketinggian"
                                    value="{{ old('penemuan_ketinggian') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Data Fisik -->
            <div class="border border-secondary rounded border-1 py-4 mb-4">
                <div class="row">
                    <div class="col-md-9 mx-auto text-center">
                        <h3 class="text-center">Data Fisik</h3>
                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-4">
                                <label for="bahanBangunan" class="form-label">Bahan Bangunan</label>
                                <input type="text" class="form-control" id="bahanBangunan" name="bahan_bangunan"
                                    value="{{ old('nama_lengkap') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Satuan Waktu Pembuatan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="satuan_waktu_pembuatan">
                                    <option selected value=""
                                        {{ old('satuan_waktu_pembuatan') == '' ? 'selected' : '' }}>Pilih
                                    </option>
                                    <option value="Tahun"
                                        {{ old('satuan_waktu_pembuatan') == 'Tahun' ? 'selected' : '' }}>
                                        Tahun</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="periodeWaktuPembuatan" class="form-label">Periode Waktu Pembuatan</label>
                                <select class="form-select" aria-label="Default select example"
                                    id="periodeWaktuPembuatan" name="periode_waktu_pembuatan">
                                    <option selected value=""
                                        {{ old('periode_waktu_pembuatan') == '' ? 'selected' : '' }}>Pilih
                                    </option>
                                    <option value="1"{{ old('periode_waktu_pembuatan') == '1' ? 'selected' : '' }}>
                                        1</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="waktuPembuatan" class="form-label">Waktu Pembuatan</label>
                                <input type="text" class="form-control" id="waktuPembuatan" name="waktu_pembuatan"
                                    value="{{ old('waktu_pembuatan') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="ornamenBangunan" class="form-label">Ornamen Bangunan</label>
                                <input type="text" class="form-control" id="ornamenBangunan" name="ornamen_bangunan"
                                    value="{{ old('ornamen_bangunan') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="tandaBangunan" class="form-label">Tanda Bangunan</label>
                                <input type="text" class="form-control" id="tandaBangunan" name="tanda_bangunan"
                                    value="{{ old('tanda_bangunan') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="warnaBangunan" class="form-label">Warna Bangunan</label>
                                <select class="form-select" aria-label="Default select example" id="warnaBangunan"
                                    name="warna_bangunan">
                                    <option selected value="" {{ old('warna_bangunan') == '' ? 'selected' : '' }}>
                                        Pilih
                                    </option>
                                    <option value="Biru" {{ old('warna_bangunan') == 'Biru' ? 'selected' : '' }}>
                                        Biru</option>
                                    <option value="Kuning" {{ old('warna_bangunan') == 'Kuning' ? 'selected' : '' }}>
                                        Kuning</option>
                                    <option value="Hijau"{{ old('warna_bangunan') == 'Hijau' ? 'selected' : '' }}>
                                        Hijau</option>
                                    <option value="Oranye"{{ old('warna_bangunan') == 'Oranye' ? 'selected' : '' }}>
                                        Oranye</option>
                                    <option value="Ungu"{{ old('warna_bangunan') == 'Ungu' ? 'selected' : '' }}>
                                        Ungu</option>
                                    <option value="Putih"{{ old('warna_bangunan') == 'Putih' ? 'selected' : '' }}>
                                        Putih</option>
                                    <option value="Abu">{{ old('warna_bangunan') == 'Abu' ? 'selected' : '' }}>
                                        Abu</option>
                                    <option value="Cokelat"{{ old('warna_bangunan') == 'Cokelat' ? 'selected' : '' }}>
                                        Cokelat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>


            <!-- Data Dimensi -->
            <div class="border border-secondary rounded border-1 py-4 mb-4">
                <div class="row ">
                    <div class="col-md-9 mx-auto text-center">
                        <h3 class="text-center">Data Dimensi</h3>
                        <div class="row gy-3 gx-4 mb-3 ">
                            <div class="col-md-4">
                                <label for="panjang" class="form-label">Panjang</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="panjang" name="panjang">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_panjang">
                                            <option value=""{{ old('unit_panjang') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm"{{ old('unit_panjang') == 'cm' ? 'selected' : '' }}>
                                                cm</option>
                                            <option value="m"{{ old('unit_panjang') == 'm' ? 'selected' : '' }}>
                                                m</option>
                                            <option value="km"{{ old('unit_panjang') == 'km' ? 'selected' : '' }}>
                                                km</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="diameterAtas" class="form-label">Diameter Atas</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="diameterAtas"
                                            name="diameter_atas" value="{{ old('diameter_atas') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_diameter_atas">
                                            <option value=""
                                                {{ old('unit_diameter_atas') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm"
                                                {{ old('unit_diameter_atas') == 'cm' ? 'selected' : '' }}>
                                                cm</option>
                                            <option value="m"
                                                {{ old('unit_diameter_atas') == 'm' ? 'selected' : '' }}>
                                                m</option>
                                            <option value="km"
                                                {{ old('unit_diameter_atas') == 'km' ? 'selected' : '' }}>
                                                km</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="tinggi" class="form-label">Tinggi</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="tinggi" name="tinggi"
                                            value="{{ old('tinggi') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_tinggi">
                                            <option value=""{{ old('unit_tinggi') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm"{{ old('unit_tinggi') == 'cm' ? 'selected' : '' }}>
                                                cm</option>
                                            <option value="m"{{ old('unit_tinggi') == 'm' ? 'selected' : '' }}>
                                                m</option>
                                            <option value="km"{{ old('unit_tinggi') == 'km' ? 'selected' : '' }}>
                                                km</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="diameterBawah" class="form-label">Diameter Badan</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="diameter_bawah"
                                            name="diameter_bawah" value="{{ old('diameter_bawah') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_diameter_bawah">
                                            <option value=""
                                                {{ old('unit_diameter_bawah') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm"
                                                {{ old('unit_diameter_bawah') == 'cm' ? 'selected' : '' }}>
                                                cm</option>
                                            <option value="m"
                                                {{ old('unit_diameter_bawah') == 'm' ? 'selected' : '' }}>
                                                m</option>
                                            <option value="km"
                                                {{ old('unit_diameter_bawah') == 'km' ? 'selected' : '' }}>
                                                km</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="diameterBawah" class="form-label">Luas Tanah </label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="luas_tanah" name="luas_tanah"
                                            value="{{ old('luas_tanah') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_luas_tanah">
                                            <option value=""{{ old('unit_luas_tanah') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm2"
                                                {{ old('unit_luas_tanah') == 'cm2' ? 'selected' : '' }}>
                                                cm2</option>
                                            <option value="m2"{{ old('unit_luas_tanah') == 'm2' ? 'selected' : '' }}>
                                                m2</option>
                                            <option value="km2"
                                                {{ old('unit_luas_tanah') == 'km2' ? 'selected' : '' }}>
                                                km2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="diameterBawah" class="form-label">Lebar</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="lebar" name="lebar"
                                            value="{{ old('lebar') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_lebar">
                                            <option value=""{{ old('unit_lebar') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm"{{ old('unit_lebar') == 'cm' ? 'selected' : '' }}>
                                                cm</option>
                                            <option value="m"{{ old('unit_lebar') == 'm' ? 'selected' : '' }}>
                                                m</option>
                                            <option value="km"{{ old('unit_lebar') == 'km' ? 'selected' : '' }}>
                                                km</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="diameterBawah" class="form-label">Diameter Kaki</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="diameter_kaki"
                                            name="diameter_kaki" value="{{ old('diameter_kaki') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_diameter_kaki">
                                            <option value=""
                                                {{ old('unit_diameter_kaki') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm"
                                                {{ old('unit_diameter_kaki') == 'cm' ? 'selected' : '' }}>
                                                cm</option>
                                            <option value="m"
                                                {{ old('unit_diameter_kaki') == 'm' ? 'selected' : '' }}>
                                                m</option>
                                            <option value="km"
                                                {{ old('unit_diameter_kaki') == 'km' ? 'selected' : '' }}>
                                                km</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="diameterBawah" class="form-label">Luas Struktur</label>
                                <div class="row g-0">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="lulus_struktur"
                                            name="lulus_struktur" value="{{ old('lulus_struktur') }}">
                                    </div>
                                    <div class="col-5">
                                        <select class="form-select" id="unit" name="unit_lulus_struktur">
                                            <option value=""
                                                {{ old('unit_lulus_struktur') == '' ? 'selected' : '' }}>
                                                Pilih</option>
                                            <option value="cm2"
                                                {{ old('unit_lulus_struktur') == 'cm2' ? 'selected' : '' }}>
                                                cm2</option>
                                            <option value="m2"
                                                {{ old('unit_lulus_struktur') == 'm2' ? 'selected' : '' }}>
                                                m2</option>
                                            <option value="km2"
                                                {{ old('unit_lulus_struktur') == 'km2' ? 'selected' : '' }}>
                                                km2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 border border-secondary rounded border-1 py-4 mb-4">
                <div class="row">
                    <div class="col-md-10 text-center mx-auto">
                        <h3 class="text-center">Kondisi Terkini</h3>
                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Keutuhan</label>
                                <select class="form-select" aria-label="Default select example" id="keutuhan"
                                    name="keutuhan">
                                    <option selected value="" {{ old('keutuhan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Utuh" {{ old('keutuhan') == 'Utuh' ? 'selected' : '' }}>
                                        Utuh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Pemeliharaan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="pemeliharaan">
                                    <option selected value=""{{ old('pemeliharaan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Terpelihara"
                                        {{ old('pemeliharaan') == 'Terpelihara' ? 'selected' : '' }}>
                                        Terpelihara</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Pemugaran</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="pemugaran">
                                    <option selected value=""{{ old('pemugaran') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Belum pernah"{{ old('satuan_waktu_pembuatan') == 'Belum pernah' ? 'selected' : '' }}>
                                        Belum pernah</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Adaptasi</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="adaptasi">
                                    <option selected value=""{{ old('adaptasi') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Tidak ada" {{ old('adaptasi') == 'Tidak ada' ? 'selected' : '' }}>
                                        Tidak ada</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="mt-3 border border-secondary rounded border-1 py-4 mb-4">
                <div class="row">
                    <div class="col-md-9 mx-auto text-center">
                        <h3 class="text-center">Data Kepemilikan</h3>
                        <div class="row gy-3 gx-4 mb-3 ">
                            <div class="col-md-4">
                                <label for="satuanKepemilikan" class="form-label">Status Kepemilikan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanKepemilikan"
                                    name="status_kepemilikan">
                                    <option selected
                                        value=""{{ old('status_kepemilikan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Sah" {{ old('status_kepemilikan') == 'Sah' ? 'selected' : '' }}>
                                        Sah</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="namaLengkap" class="form-label">Nama Pemilik (Orang/Instansi)</label>
                                <input type="text" class="form-control" id="namaLengkap" name="nama_pemilik"
                                    value="{{ old('nama_pemilik') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Status Perolehan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="status_perolehan">
                                    <option selected value=""{{ old('status_perolehan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Aktif"{{ old('satuan_waktu_pembuatan') == 'Aktif' ? 'selected' : '' }}>
                                        Aktif</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Provinsi</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="kepemilikan_provinsi">
                                    <option selected value=""
                                        {{ old('kepemilikan_provinsi') == '' ? 'selected' : '' }}>
                                    </option>
                                    <option value="Riau" {{ old('kepemilikan_provinsi') == 'Riau' ? 'selected' : '' }}>
                                        Riau</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Kabupaten/Kota</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="kepemilikan_kota">
                                    <option selected value=""
                                        {{ old('kepemilikan_kota') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Pekanbaru"
                                        {{ old('kepemilikan_kota') == 'Pekanbaru' ? 'selected' : '' }}>
                                        Pekanbaru</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="kepemilikan_kecamatan">
                                    <option selected value=""
                                        {{ old('kepemilikan_kecamatan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Payung Sekaki"
                                        {{ old('kepemilikan_kecamatan') == 'Payung Sekaki' ? 'selected' : '' }}>
                                        Payung Sekaki</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="satuanWaktuPembuatan" class="form-label">Desa/Kelurahan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="kepemilikan_kelurahan">
                                    <option selected value=""
                                        {{ old('kepemilikan_kelurahan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Sungaisibam"
                                        {{ old('kepemilikan_kelurahan') == 'Sungaisibam' ? 'selected' : '' }}>
                                        Sungaisibam</option>
                                </select>
                            </div>


                            <div class="col-md-3">
                                <label for="namaLengkap" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="namaLengkap" name="kepemilikan_alamat"
                                    value="{{ old('kepemilikan_alamat') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="namaLengkap" class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="namaLengkap" name="kepemilikan_latitude"
                                    value="{{ old('kepemilikan_latitude') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="namaLengkap" class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="namaLengkap" name="kepemilikan_longitude"
                                    value="{{ old('kepemilikan_longitude') }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="mt-3 border border-secondary rounded border-1 py-4 mb-4">
                <div class="row">
                    <div class="col-md-9 text-center mx-auto">
                        <h3 class="text-center">Data Pengelolaan</h3>
                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Status Pengolahan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="status_pengelolaan">
                                    <option selected value=""
                                        {{ old('status_pengelolaan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Dikelola"{{ old('status_pengelolaan') == 'Dikelola' ? 'selected' : '' }}>
                                        Dikelola</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="namaLengkap" class="form-label">Nama Pengelola (Orang/Instansi)</label>
                                <input type="text" class="form-control" id="namaLengkap" name="nama_pengelola"
                                    value="{{ old('nama_pengelola') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Provinsi</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="pengelolaan_provinsi">
                                    <option selected value=""
                                        {{ old('pengelolaan_provinsi') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Riau" {{ old('pengelolaan_provinsi') == 'Riau' ? 'selected' : '' }}>
                                        Riau</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Kabupaten/Kota</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="pengelolaan_kota">
                                    <option selected value=""{{ old('pengelolaan_kota') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Pekanbaru"{{ old('pengelolaan_kota') == 'Pekanbaru' ? 'selected' : '' }}>
                                        Pekanbaru</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="pengelolaan_kecamatan">
                                    <option selected value=""
                                        {{ old('pengelolaan_kecamatan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option
                                        value="Payung Sekaki"{{ old('pengelolaan_kecamatan') == 'Payung Sekaki' ? 'selected' : '' }}>
                                        Payung Sekaki</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="satuanWaktuPembuatan" class="form-label">Desa/Kelurahan</label>
                                <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
                                    name="pengelolaan_kelurahan">
                                    <option selected
                                        value=""{{ old('pengelolaan_kelurahan') == '' ? 'selected' : '' }}>
                                        Pilih</option>
                                    <option value="Sungaisibam"
                                        {{ old('pengelolaan_kelurahan') == 'Sungaisibam' ? 'selected' : '' }}>
                                        Sungaisibam</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="namaLengkap" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="namaLengkap" name="pengelolaan_alamat"
                                    value="{{ old('pengelolaan_alamat') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="namaLengkap" class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="namaLengkap" name="pengelolaan_latitude"
                                    value="{{ old('pengelolaan_latitude') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="namaLengkap" class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="namaLengkap" name="pengelolaan_longitude"
                                    value="{{ old('pengelolaan_longitude') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Data Sejarah -->
            <div class="border border-secondary rounded border-1 py-4 ">
                <div class="row">
                    <div class="col-md-8 text-center mx-auto">
                        <h3 class="text-center">Data Sejarah</h3>
                        <div class="mb-3">
                            <label for="deskripsiSejarah" class="form-label">Deskripsi Sejarah</label>
                            <textarea class="form-control" id="deskripsiSejarah" name="deskripsi_sejarah" rows="4"></textarea>
                        </div>
                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-6">
                                <label for="batasZonasiUtara" class="form-label">Batas Zonasi Utara</label>
                                <input type="text" class="form-control" id="batasZonasiUtara"
                                    name="batas_zonasi_utara" value="{{ old('batas_zonasi_utara') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="batasZonasiBarat" class="form-label">Batas Zonasi Barat</label>
                                <input type="text" class="form-control" id="batasZonasiBarat"
                                    name="batas_zonasi_barat" value="{{ old('batas_zonasi_barat') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="batasZonasiSelatan" class="form-label">Batas Zonasi Selatan</label>
                                <input type="text" class="form-control" id="batasZonasiSelatan"
                                    name="batas_zonasi_selatan" value="{{ old('batas_zonasi_selatan') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="batasZonasiTimur" class="form-label">Batas Zonasi Timur</label>
                                <input type="text" class="form-control" id="batasZonasiTimur"
                                    name="batas_zonasi_timur" value="{{ old('batas_zonasi_timur') }}">
                            </div>
                        </div>

                        <div class="row gy-3 gx-4 mb-3">
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Foto / Gambar
                                    </div>
                                    <div class="card-body position-relative d-inline-block">
                                        <p id="details_foto_gambar" class="mb-2 d-none"></p>
                                        <label for="foto_gambar" id="label_foto_gambar" class="file-label btn btn-info">+
                                            Tambah Foto /
                                            Gambar</label>
                                        <input type="file" id="foto_gambar" class="custom-file-input d-none"
                                            name="foto_gambar">
                                        @error('foto_gambar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Dokumen Kajian (.pdf)
                                    </div>
                                    <div class="card-body position-relative d-inline-block">
                                        <p id="details_dokumen_kajian" class="mb-2 d-none"></p>
                                        <label for="dokumen_kajian" id="label_dokumen_kajian"
                                            class="file-label btn btn-info">
                                            + Tambah Dokumen Kajian
                                            (.pdf)</label>
                                        <input type="file" id="dokumen_kajian" class="custom-file-input d-none"
                                            name="dokumen_kajian">
                                        @error('dokumen_kajian')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Tautan Video
                                    </div>
                                    <div class="card-body position-relative d-inline-block">
                                        <p id="details_tautan_video" class="mb-2 d-none"></p>
                                        <label for="tautan_video" id="label_tautan_video"
                                            class="file-label btn btn-info">
                                            + Tambah Tautan Video</label>
                                        <input type="file" id="tautan_video" class="custom-file-input d-none"
                                            name="tautan_video">
                                        @error('tautan_video')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Dokumen Lainnya (.pdf)
                                    </div>
                                    <div class="card-body position-relative d-inline-block">
                                        <p id="details_dokumen_lainnya" class="mb-2 d-none"></p>
                                        <label for="dokumen_lainnya" id="label_dokumen_lainnya"
                                            class="file-label btn btn-info">
                                            + Tambah Dokumen Lainnya (.pdf)</label>
                                        <input type="file" id="dokumen_lainnya" class="custom-file-input d-none"
                                            name="dokumen_lainnya">
                                        @error('dokumen_lainnya')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Berkas Vektor
                                    </div>
                                    <div class="card-body position-relative d-inline-block">
                                        <p id="details_berkas_vektor" class="mb-2 d-none"></p>
                                        <label for="berkas_vektor" id="label_berkas_vektor"
                                            class="file-label btn btn-info">
                                            + Tambah Berkas Vektor</label>
                                        <input type="file" id="berkas_vektor" class="custom-file-input d-none"
                                            name="berkas_vektor">
                                        @error('berkas_vektor')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Berkas Raster
                                    </div>
                                    <div class="card-body position-relative d-inline-block">
                                        <p id="details_berkas_raster" class="mb-2 d-none"></p>
                                        <label for="berkas_raster" id="label_berkas_raster"
                                            class="file-label btn btn-info">
                                            + Tambah Berkas Raster</label>
                                        <input type="file" id="berkas_raster" class="custom-file-input d-none"
                                            name="berkas_raster">
                                        @error('berkas_raster')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mt-4 mx-auto">
                <button type="submit"
                    class="btn btn-primary d-block mx-auto w-100 py-3 fw-bold rounded-pill">Kirim</button>
            </div>
        </form>
    </section>
    {{-- image preview --}}
    <script type="text/javascript">
        document.querySelector('#foto_ktp').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileDetails = document.querySelector('#fileDetails');
            const previewImage = document.querySelector('#previewImage');
            let labelInfo = document.querySelector('#labelFotoKtp');
            if (file) {
                fileDetails.classList.remove('d-none');
                fileDetails.textContent = `${file.name}`;
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('d-none');
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewImage.classList.add('d-none');
                }
                labelInfo.textContent = "Ubah Foto KTP";
            } else {
                fileDetails.textContent = '';
                previewImage.classList.add('d-none');
                labelInfo.textContent = "+ Tambah Foto KTP";
            }
        });
        document.querySelector('#foto_gambar').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileDetails = document.querySelector('#details_foto_gambar');
            let labelInfo = document.querySelector('#label_foto_gambar');
            if (file) {
                fileDetails.classList.remove('d-none');
                fileDetails.textContent = `${file.name}`;
                labelInfo.textContent = "Ubah Foto / Gambar";
            } else {
                fileDetails.textContent = '';
                labelInfo.textContent = "+ Tambah Foto KTP";
            }
        });
        document.querySelector('#dokumen_kajian').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileDetails = document.querySelector('#details_dokumen_kajian');
            let labelInfo = document.querySelector('#label_dokumen_kajian');
            if (file) {
                fileDetails.classList.remove('d-none');
                fileDetails.textContent = `${file.name}`;
                labelInfo.textContent = "Ubah Dokumen Kajian (.pdf)";
            } else {
                fileDetails.textContent = '';
                labelInfo.textContent = "+ Tambah Dokumen Kajian (.pdf)";
            }
        });
        document.querySelector('#tautan_video').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileDetails = document.querySelector('#details_tautan_video');
            let labelInfo = document.querySelector('#label_tautan_video');
            if (file) {
                fileDetails.classList.remove('d-none');
                fileDetails.textContent = `${file.name}`;
                labelInfo.textContent = "Ubah Tautan Video";
            } else {
                fileDetails.textContent = '';
                labelInfo.textContent = "+ Tambah Tautan Video";
            }
        });
        document.querySelector('#berkas_vektor').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileDetails = document.querySelector('#details_berkas_vektor');
            let labelInfo = document.querySelector('#label_berkas_vektor');
            if (file) {
                fileDetails.classList.remove('d-none');
                fileDetails.textContent = `${file.name}`;
                labelInfo.textContent = "Ubah Berkas Vektor";
            } else {
                fileDetails.textContent = '';
                labelInfo.textContent = "+ Tambah Berkas Vektor";
            }
        });
        document.querySelector('#berkas_raster').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileDetails = document.querySelector('#details_berkas_raster');
            let labelInfo = document.querySelector('#label_berkas_raster');
            if (file) {
                fileDetails.classList.remove('d-none');
                fileDetails.textContent = `${file.name}`;
                labelInfo.textContent = "Ubah Berkas Vektor";
            } else {
                fileDetails.textContent = '';
                labelInfo.textContent = "+ Tambah Berkas Vektor";
            }
        });
    </script>


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
