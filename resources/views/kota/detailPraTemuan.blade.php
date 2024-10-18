@php
  $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Data Temuan')

<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}"/>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">

<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Detail Pra Temuan
  </h4>


  <div class="mb-4">
    <div class="">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="fw-semibold">Identitas Pengirim</h5>
          <p>Nama Pengirim: {{ $temuan->pengirim->nama }}</p>
          <p>NIK: {{ $temuan->pengirim->nik }}</p>
          <p>Foto KTP:</p>
          <img src="{{ asset('storage/' . $temuan->pengirim->foto_ktp)}}" class="w-25 border " alt="foto-ktp">
          <h5 class="fw-semibold mt-5">Temuan</h5>
          <p>Judul Temuan: {{ $temuan->dataStruktur->nama_odcb }}</p>
          <p>Foto Temuan:</p>
          <img src="{{ asset('storage/' . $temuan->dataSejarah->foto) }}" class="w-25 border" alt="foto-temuan">
        </div>
      </div>
    </div>


    <!-- Modal for Revisi -->
    <div class="modal fade" id="revisiModal" tabindex="-1" aria-labelledby="revisiModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="revisiModalLabel">Revisi Catatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('temuan.revisi', $temuan->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-body">
              <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="3" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-warning">Simpan Revisi</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 200
      });
      $('#dataTable').DataTable({
        responsive: true
      });
    </script>

@endsection
