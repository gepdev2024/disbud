@extends('layouts/blankLayout')

@section('title', __('nav.judul'))

@section('content')
  @include('layouts/sections/navbar/nav')
  <section class="container mt-4">

    @if(session('success'))
      <div class="alert alert-primary">
        {{ session('success') }}
      </div>
    @endif

    <div class="relative row h-75  flex justify-content-center align-items-center">
      <div class="col-8">
        <div class="card text-center">
          <div class="card-header bg-info py-3">
            <h4 class="text-center fw-bold text-white m-0">Informasi Temuan!</h4>
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
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const copyButton = document.getElementById('copyButton');
      const tokenText = document.getElementById('tokenText');

      copyButton.addEventListener('click', function () {
        const tempInput = document.createElement('input');
        tempInput.value = tokenText.textContent;
        document.body.appendChild(tempInput);

        tempInput.select();
        document.execCommand('copy');

        document.body.removeChild(tempInput);

        copyButton.textContent = 'Copied!';
        setTimeout(() => copyButton.textContent = 'Copy',
          2000);
      });
    });
  </script>

  <!-- Template Main JS File -->
  <script src={{ asset('assets/landingPage/js/main.js') }}></script>
@endsection
