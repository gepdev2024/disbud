@extends('layouts/blankLayout')

@section('title', __('nav.judul') . ' - Lapor Temuan')

<!-- Template Main CSS File -->
<link href={{ asset('assets/landingPage/css/style.css') }} rel="stylesheet">
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
  $(document).ready(function ($) {
    const requiredFields = [
      'nama_lengkap',
      'nik',
      'nama_odcb',
      'foto_ktp',
      'foto_temuan'
    ];

    const validationRules = {};
    const validationMessages = {};

    requiredFields.forEach(field => {
      validationRules[field] = {
        required: true
      };
      validationMessages[field] = {
        required: `Tidak boleh kosong`
      };
    });

    validationRules.nik = {
      required: true,
      digits: true
    };
    validationMessages.nik = {
      required: "Tidak boleh kosong",
      digits: "NIK hanya angka"
    };

    $('#myForm').validate({
      rules: validationRules,
      messages: validationMessages,
      onkeyup: false,
      onfocusout: false,
      onkeypress: true,
      onkeyup: function (element) {
        $(element).valid();
      },
      highlight: function (element) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function (element) {
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
      <div class="mx-auto border border-2 rounded mb-3 border-success" style="width: 25%; margin-top:-10px"></div>
    </div>
    <form action="{{route('praTemuan.kirim')}}" method="POST" enctype="multipart/form-data" id="myForm">
      @csrf
      <!-- Identitas Pengirim -->
      <div class="row">
        <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-6">
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
            <input type="text" class="form-control" id="nik" name="nik"
                   value="{{ old('nik') }}">
            @error('nik')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-center">
            <div class="card mb-3 mx-auto" style="max-width: 400px;">
              <div class="position-relative d-inline-block py-4">
                <div>
                  <p id="fileDetailsKTP" class="mb-2">KTP</p>
                  <img id="previewImage" class="mb-3 d-none" style="max-width: 200px;"/>
                </div>
                <label for="foto_ktp" id="labelFotoKtp" class="file-label btn btn-info">+ Tambah Foto
                  KTP</label>
                <input type="file" id="foto_ktp" class="custom-file-input d-none" name="foto_ktp">
                @error('foto_ktp')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Lapor Temuan Pendahuluan -->
      <div class="row">
        <div class="border border-2 p-3 px-4 mb-4 mt-4 mx-auto col-md-6">
          <h3 class="text-center">Lapor Temuan</h3>
          <div class="mb-3">
            <label for="nama_odcb" class="form-label">Judul Temuan</label>
            <input type="text" class="form-control" id="nama_odcb" name="nama_odcb"
                   value="{{ old('nama_odcb') }}">
            @error('nama_odcb')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-center">
            <div class="card mb-3 mx-auto" style="max-width: 400px;">
              <div class="position-relative d-inline-block py-4">
                <div>
                  <p id="fileDetailsTemuan" class="mb-2">Foto Temuan</p>
                  <img id="previewTemuan" class="mb-3 d-none" style="max-width: 200px;"/>
                </div>
                <label for="foto_temuan" id="labelFotoTemuan" class="file-label btn btn-info">+ Tambah Foto
                  Temuan</label>
                <input type="file" id="foto_temuan" class="custom-file-input d-none" name="foto_temuan">
                @error('foto_temuan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="submit"
              class="btn btn-primary d-block mx-auto w-auto px-4 py-2 fw-bold rounded-pill">Kirim
      </button>
    </form>
  </section>

  <script type="text/javascript">
    document.querySelector('#foto_ktp').addEventListener('change', function (event) {
      const file = event.target.files[0];
      const fileDetails = document.querySelector('#fileDetailsKTP');
      const previewImage = document.querySelector('#previewImage');
      let labelInfo = document.querySelector('#labelFotoKtp');
      if (file) {
        fileDetails.textContent = `${file.name}`;
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function (e) {
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

    document.querySelector('#foto_temuan').addEventListener('change', function (event) {
      const file = event.target.files[0];
      const fileDetails = document.querySelector('#fileDetailsTemuan');
      const previewImage = document.querySelector('#previewTemuan');
      let labelInfo = document.querySelector('#labelFotoTemuan');
      if (file) {
        fileDetails.textContent = `${file.name}`;
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewImage.classList.remove('d-none');
          }
          reader.readAsDataURL(file);
        } else {
          previewImage.classList.add('d-none');
        }
        labelInfo.textContent = "Ubah Foto Temuan";
      } else {
        fileDetails.textContent = '';
        previewImage.classList.add('d-none');
        labelInfo.textContent = "+ Tambah Foto Temuan";
      }
    });
  </script>

  <!-- Template Main JS File -->
  <script src={{ asset('assets/landingPage/js/main.js') }}></script>
@endsection
