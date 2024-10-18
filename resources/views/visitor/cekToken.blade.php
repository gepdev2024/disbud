@extends('layouts/blankLayout')

@section('title', __('nav.judul'))

<!-- Template Main CSS File -->
<link href={{ asset('assets/landingPage/css/style.css') }} rel="stylesheet">

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

        @if(!session('message'))
          <div class="card text-center mb-5">
            <div class="card-header bg-info py-3">
              <h4 class="text-center fw-bold text-white m-0">Cek Proses Lapor Temuan Anda</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('cekHasilToken') }}" method="POST">
                @csrf

                <label for="nik" class="m-0 mt-3">Masukkan NIK anda.</label>
                <input type="text" name="nik" id="nik" class="form-control" required>
                @error('nik')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="token" class="m-0 mt-3">Masukkan Token.</label>
                <input type="text" name="token" id="token" class="form-control" required>
                @error('token')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary mt-3">Cek</button>
              </form>
            </div>
          </div>
        @endif
      </div>
    </div>

    @if (session('message'))
      <div class="row justify-content-center">
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
              <h5>Waktu dikirim: {{ $temuan->created_at->locale('id')->translatedFormat('l, d-m-Y, H:i') }}</h5>
              <h5>Status: <span
                  @switch($temuan->status)
                    @case('tolak_pra_temuan')
                    class="badge bg-danger text-capitalize">
                    Ditolak
                    @break
                    @case('terima_pra_temuan')
                    class="badge bg-success text-capitalize">
                    Diterima
                    @break
                    @default
                    class="badge bg-info text-capitalize">
                    Diproses
                  @endswitch
                </span></h5>
              @if($temuan->status == 'terima_pra_temuan')
                <h5><a href="{{route('praTemuan.lengkapi', $pengirim->token)}}" class="text-decoration-underline">Klik Link Ini Untuk Melengkapi Laporan</a></h5>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif
  </section>

  <!-- Template Main JS File -->
  <script src={{ asset('assets/landingPage/js/main.js') }}></script>
@endsection
