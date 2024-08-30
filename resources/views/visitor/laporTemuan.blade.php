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
<script>
  $(document).ready(function($) {
    const requiredFields = [
      'luas_tanah',
      'lebar',
      'diameter_kaki',
      'lulus_struktur',
      'foto_ktp',
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
      'satuan_diameter_bawah',
      'satuan_diameter_atas',
      'satuan_panjang',
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
      'pengelolaan_longitude'
    ];

    const validationRules = {};
    const validationMessages = {};

    requiredFields.forEach(field => {
      validationRules[field] = {
        required: true
      };
      validationMessages[field] = {
        // required: `${field.replace(/_/g, ' ')} tidak boleh kosong`
        required: `Tidak boleh kosong`
      };
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
      <h1 class="">Lapor Temuan Cagar Budaya</h1>
      <div class="mx-auto border border-2 rounded mb-3 border-success" style="width: 25%; margin-top:-10px"> </div>
    </div>
    <form action="laporTemuan" method="POST" enctype="multipart/form-data" id="myForm">
      @csrf
      <!-- Identitas Pengirim -->
      <div class="row">
        <div class="">
          <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
            <h3 class="text-center">Identitas Pengirim</h3>
            <div class="mb-3">
              <label for="namaLengkap" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap"
                value="{{ old('nama_lengkap') }}">
              @error('nama_lengkap')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nik" class="form-label">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
              @error('nik')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="text-center">
              <div class="card mb-3 mx-auto" style="max-width: 400px;">
                <div class="position-relative d-inline-block py-4">
                  <div>
                    <p id="fileDetails" class="mb-2">KTP</p>
                    <img id="previewImage" class="mb-3 d-none" style="max-width: 200px;" />
                  </div>
                  <label for="foto_ktp" id="labelFotoKtp" class="file-label btn btn-info">+ Tambah Foto
                    KTP</label>
                  <input type="file" id="foto_ktp" class="custom-file-input d-none" name="foto_ktp">
                  @error('foto_ktp')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>
              </div>
              {{-- <button class="btn btn-primary" type="submit">kirim</button> --}}
            </div>
          </div>
          <script type="text/javascript">
            document.querySelector('#foto_ktp').addEventListener('change', function(event) {
              const file = event.target.files[0];
              const fileDetails = document.querySelector('#fileDetails');
              const previewImage = document.querySelector('#previewImage');
              let labelInfo = document.querySelector('#labelFotoKtp');
              if (file) {
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
          </script>

        </div>
      </div>

      <!-- Data Struktur -->
      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Data Struktur</h3>
        <div class="row g-3 mb-3">
          <div class="col-md-9">
            <label for="namaStruktur" class="form-label">Nama ODCB/CB di Lapangan</label>
            <input type="text" class="form-control" id="namaStruktur" name="nama_struktur">
          </div>
          <div class="col-md-3">
            <label for="stafStruktur" class="form-label">Staf Struktur</label>
            <select class="form-select" aria-label="Default select example" id="stafStruktur" name="staf_struktur">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>
            </select>
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-9">
            <label for="fungsiStruktur" class="form-label">Fungsi Struktur</label>
            <input type="text" class="form-control" id="fungsiStruktur" name="fungsi_struktur">
          </div>
          <div class="col-md-3">
            <label for="periodeStruktur" class="form-label">Periode Struktur</label>
            <select class="form-select" aria-label="Default select example" id="periodeStruktur" name="periode_struktur">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>
            </select>
          </div>
        </div>
      </div>


      <!-- Lokasi Penemuan -->
      <div class="border border-2 p-3 mb-4">
        <h3 class="text-center">Lokasi Penemuan</h3>
        <div class="row g-3 mb-3">
          <div class="col-md-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" aria-label="Default select example" id="provinsi" name="penemuan_provinsi">
              <option selected value="">Pilih</option>
              <option value="Riau">Riau</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="kota" class="form-label">Kabupaten/Kota</label>
            <select class="form-select" aria-label="Default select example" id="kota" name="penemuan_kota">
              <option selected value="">Pilih</option>
              <option value="Kota Pekanbaru">Kota Pekanbaru</option>
              <option value="Kota Dumai">Kota Dumai</option>
              <option value="Kabupaten Siak">Kabupaten Siak</option>
              <option value="Kabupaten Rokan Hulu">Kabupaten Rokan Hulu</option>
              <option value="Kabupaten Rokan Hilir">Kabupaten Rokan Hilir</option>
              <option value="Kabupaten Pelalawan">Kabupaten Pelalawan</option>
              <option value="Kabupaten Kuantan Singingi">Kabupaten Kuantan Singingi</option>
              <option value="Kabupaten Kepulauan Meranti">Kabupaten Kepulauan Meranti</option>
              <option value="Kabupaten Kampar">Kabupaten Kampar</option>
              <option value="Kabupaten Indragiri Hulu">Kabupaten Indragiri Hulu</option>
              <option value="Kabupaten Indragiri Hilir">Kabupaten Indragiri Hilir</option>
              <option value="Kabupaten Bengkalis">Kabupaten Bengkalis</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <select class="form-select" aria-label="Default select example" id="kecamatan" name="penemuan_kecamatan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <select class="form-select" aria-label="Default select example" id="kelurahan" name="penemuan_kelurahan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>
            </select>
          </div>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="penemuan_alamat">
            </div>
            <div class="col-md-3">
              <label for="latitude" class="form-label">Latitude</label>
              <input type="text" class="form-control" id="latitude" name="penemuan_latitude">
            </div>
            <div class="col-md-3">
              <label for="longitude" class="form-label">Longitude</label>
              <input type="text" class="form-control" id="longitude" name="penemuan_longitude">
            </div>
            <div class="col-md-3">
              <label for="ketinggian" class="form-label">Ketinggian (mdpl)</label>
              <input type="text" class="form-control" id="ketinggian" name="penemuan_ketinggian">
            </div>
          </div>
        </div>
      </div>



      <!-- Data Fisik -->
      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Data Fisik</h3>
        <div class="row g-3 mb-3">
          <div class="col-md-4">
            <label for="bahanBangunan" class="form-label">Bahan Bangunan</label>
            <input type="text" class="form-control" id="bahanBangunan" name="bahan_bangunan">
          </div>
          <div class="col-md-4">
            <label for="satuanWaktuPembuatan" class="form-label">Satuan Waktu Pembuatan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="satuan_waktu_pembuatan">
              <option selected value=""></option>
              <option value="tes">tes</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="periodeWaktuPembuatan" class="form-label">Periode Waktu Pembuatan</label>
            <select class="form-select" aria-label="Default select example" id="periodeWaktuPembuatan"
              name="periode_waktu_pembuatan">
              <option selected value=""></option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col-md-4">
            <label for="waktuPembuatan" class="form-label">Waktu Pembuatan</label>
            <input type="text" class="form-control" id="waktuPembuatan" name="waktu_pembuatan">
          </div>
          <div class="col-md-4">
            <label for="ornamenBangunan" class="form-label">Ornamen Bangunan</label>
            <input type="text" class="form-control" id="ornamenBangunan" name="ornamen_bangunan">
          </div>
          <div class="col-md-4">
            <label for="tandaBangunan" class="form-label">Tanda Bangunan</label>
            <input type="text" class="form-control" id="tandaBangunan" name="tanda_bangunan">
          </div>
          <div class="col-md-4">
            <label for="warnaBangunan" class="form-label">Warna Bangunan</label>
            <select class="form-select" aria-label="Default select example" id="warnaBangunan" name="warna_bangunan">
              <option selected value=""></option>
              <option value="tes">tes</option>

            </select>
          </div>
        </div>
      </div>


      <!-- Data Dimensi -->
      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Data Dimensi</h3>
        <div class="row g-3 mb-3">
          <div class="col-md-4">
            <label for="panjang" class="form-label">Panjang</label>
            <div class="input-group">
              <input type="text" class="form-control" id="panjang" name="panjang">
              <span class="input-group-text">satuan</span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="diameterAtas" class="form-label">Diameter Atas</label>
            <div class="input-group">
              <input type="text" class="form-control" id="diameterAtas" name="diameter_atas">
              <span class="input-group-text">satuan</span>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <label for="tinggi" class="form-label">Tinggi</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tinggi" name="tinggi">
                <span class="input-group-text">satuan</span>
              </div>
            </div>
            <div class="col-md-4">
              <label for="diameterBawah" class="form-label">Diameter Badan</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diameterBawah" name="diameter_bawah">
                <span class="input-group-text">satuan</span>
              </div>
            </div>
            <div class="col-md-4">
              <label for="diameterBawah" class="form-label">Luas Tanah</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diameterBawah" name="luas_tanah">
                <span class="input-group-text">satuan</span>
              </div>
            </div>
            <div class="col-md-4">
              <label for="diameterBawah" class="form-label">Lebar</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diameterBawah" name="lebar">
                <span class="input-group-text">satuan</span>
              </div>
            </div>
            <div class="col-md-4">
              <label for="diameterBawah" class="form-label">Diameter Kaki</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diameterBawah" name="diameter_kaki">
                <span class="input-group-text">satuan</span>
              </div>
            </div>
            <div class="col-md-4">
              <label for="diameterBawah" class="form-label">Lulus Struktur</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diameterBawah" name="lulus_struktur">
                <span class="input-group-text">satuan</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Kondisi Terkini</h3>
        <div class="row g-3 mb-3">
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Keutuhan</label>
            <select class="form-select" aria-label="Default select example" id="keutuhan" name="keutuhan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Pemeliharaan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="pemeliharaan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Pemugaran</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="pemugaran">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Adaptasi</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan" name="adaptasi">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>

        </div>
      </div>

      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Data Kepemilikan</h3>
        <div class="row g-3 mb-3">
          <div class="col">
            <label for="satuanKepemilikan" class="form-label">Status Kepemilikan</label>
            <select class="form-select" aria-label="Default select example" id="satuanKepemilikan"
              name="status_kepemilikan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="namaLengkap" class="form-label">Nama Pemilik (Orang/Instansi)</label>
            <input type="text" class="form-control" id="namaLengkap" name="nama_pemilik">
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Status Perolehan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="status_perolehan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Provinsi</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="kepemilikan_provinsi">
              <option selected value="">Pilih Provinsi</option>
              <option value="Riau">Riau</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Kabupaten/Kota</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="kepemilikan_kota">
              <option selected value="">Pilih</option>
              <option value="Kota Pekanbaru">Kota Pekanbaru</option>
              <option value="Kota Dumai">Kota Dumai</option>
              <option value="Kabupaten Siak">Kabupaten Siak</option>
              <option value="Kabupaten Rokan Hulu">Kabupaten Rokan Hulu</option>
              <option value="Kabupaten Rokan Hilir">Kabupaten Rokan Hilir</option>
              <option value="Kabupaten Pelalawan">Kabupaten Pelalawan</option>
              <option value="Kabupaten Kuantan Singingi">Kabupaten Kuantan Singingi</option>
              <option value="Kabupaten Kepulauan Meranti">Kabupaten Kepulauan Meranti</option>
              <option value="Kabupaten Kampar">Kabupaten Kampar</option>
              <option value="Kabupaten Indragiri Hulu">Kabupaten Indragiri Hulu</option>
              <option value="Kabupaten Indragiri Hilir">Kabupaten Indragiri Hilir</option>
              <option value="Kabupaten Bengkalis">Kabupaten Bengkalis</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Kecamatan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="kepemilikan_kecamatan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Desa/Kelurahan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="kepemilikan_kelurahan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col">
            <label for="namaLengkap" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="namaLengkap" name="kepemilikan_alamat">
          </div>
          <div class="col">
            <label for="namaLengkap" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="namaLengkap" name="kepemilikan_latitude">
          </div>
          <div class="col">
            <label for="namaLengkap" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="namaLengkap" name="kepemilikan_longitude">
          </div>
        </div>
      </div>


      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Data Pengelolaan</h3>
        <div class="row g-3 mb-3">
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Status Pengolahan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="status_pengelolaan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="namaLengkap" class="form-label">Nama Pengelola (Orang/Instansi)</label>
            <input type="text" class="form-control" id="namaLengkap" name="nama_pengelola">
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Provinsi</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="pengelolaan_provinsi">
              <option selected value="">Pilih</option>
              <option value="Riau">Riau</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Kabupaten/Kota</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="pengelolaan_kota">
              <option selected value="">Pilih</option>
              <option value="Kota Pekanbaru">Kota Pekanbaru</option>
              <option value="Kota Dumai">Kota Dumai</option>
              <option value="Kabupaten Siak">Kabupaten Siak</option>
              <option value="Kabupaten Rokan Hulu">Kabupaten Rokan Hulu</option>
              <option value="Kabupaten Rokan Hilir">Kabupaten Rokan Hilir</option>
              <option value="Kabupaten Pelalawan">Kabupaten Pelalawan</option>
              <option value="Kabupaten Kuantan Singingi">Kabupaten Kuantan Singingi</option>
              <option value="Kabupaten Kepulauan Meranti">Kabupaten Kepulauan Meranti</option>
              <option value="Kabupaten Kampar">Kabupaten Kampar</option>
              <option value="Kabupaten Indragiri Hulu">Kabupaten Indragiri Hulu</option>
              <option value="Kabupaten Indragiri Hilir">Kabupaten Indragiri Hilir</option>
              <option value="Kabupaten Bengkalis">Kabupaten Bengkalis</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Kecamatan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="pengelolaan_kecamatan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
          <div class="col">
            <label for="satuanWaktuPembuatan" class="form-label">Desa/Kelurahan</label>
            <select class="form-select" aria-label="Default select example" id="satuanWaktuPembuatan"
              name="pengelolaan_kelurahan">
              <option selected value="">Pilih</option>
              <option value="tes">tes</option>

            </select>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col">
            <label for="namaLengkap" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="namaLengkap" name="pengelolaan_alamat">
          </div>
          <div class="col">
            <label for="namaLengkap" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="namaLengkap" name="pengelolaan_latitude">
          </div>
          <div class="col">
            <label for="namaLengkap" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="namaLengkap" name="pengelolaan_longitude">
          </div>
        </div>
      </div>

      <!-- Data Sejarah -->
      <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-12">
        <h3 class="text-center">Data Sejarah</h3>
        <div class="mb-3">
          <label for="deskripsiSejarah" class="form-label">Deskripsi Sejarah</label>
          <textarea class="form-control" id="deskripsiSejarah" name="deskripsi_sejarah" rows="4"></textarea>
        </div>
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label for="batasZonasiUtara" class="form-label">Batas Zonasi Utara</label>
            <input type="text" class="form-control" id="batasZonasiUtara" name="batas_zonasi_utara">
          </div>
          <div class="col-md-6">
            <label for="batasZonasiBarat" class="form-label">Batas Zonasi Barat</label>
            <input type="text" class="form-control" id="batasZonasiBarat" name="batas_zonasi_barat">
          </div>
          <div class="col-md-6">
            <label for="batasZonasiSelatan" class="form-label">Batas Zonasi Selatan</label>
            <input type="text" class="form-control" id="batasZonasiSelatan" name="batas_zonasi_selatan">
          </div>
          <div class="col-md-6">
            <label for="batasZonasiTimur" class="form-label">Batas Zonasi Timur</label>
            <input type="text" class="form-control" id="batasZonasiTimur" name="batas_zonasi_timur">
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <div class="card text-center">
              <div class="card-header">
                Foto / Gambar
              </div>
              <div class="card-body position-relative d-inline-block">
                <label for="foto" class="file-label">+ Tambah Foto / Gambar</label>
                <input type="file" id="foto" class="custom-file-input d-none" name="foto">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card text-center">
              <div class="card-header">
                Dokumen Kajian (.pdf)
              </div>
              <div class="card-body position-relative d-inline-block">
                <label for="dokumen_kajian" class="file-label">+ Tambah Dokumen Kajian (.pdf)</label>
                <input type="file" id="dokumen_kajian" class="custom-file-input d-none" name="dokumen_kajian">
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="card text-center">
              <div class="card-header">
                Tautan Video
              </div>
              <div class="card-body position-relative d-inline-block">
                <label for="tautan_video" class="file-label">+ Tambah Tautan Video</label>
                <input type="file" id="tautan_video" class="custom-file-input d-none" name="tautan_video">
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="card text-center">
              <div class="card-header">
                Dokumen Lainnya (.pdf)
              </div>
              <div class="card-body position-relative d-inline-block">
                <label for="dokumen_lainnya" class="file-label">+ Tambah Dokumen Lainnya (.pdf)</label>
                <input type="file" id="dokumen_lainnya" class="custom-file-input d-none" name="dokumen_lainnya">
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="card text-center">
              <div class="card-header">
                Berkas Vektor
              </div>
              <div class="card-body position-relative d-inline-block">
                <label for="berkas_vektor" class="file-label">+ Tambah Berkas Vektor</label>
                <input type="file" id="berkas_vektor" class="custom-file-input d-none" name="berkas_vektor">
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="card text-center">
              <div class="card-header">
                Berkas Raster
              </div>
              <div class="card-body position-relative d-inline-block">
                <label for="berkas_raster" class="file-label">+ Tambah Berkas Raster</label>
                <input type="file" id="berkas_raster" class="custom-file-input d-none" name="berkas_raster">
              </div>
            </div>
          </div>
        </div>


        <button type="submit" class="btn btn-primary d-block mx-auto mt-3">Kirim</button>
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
