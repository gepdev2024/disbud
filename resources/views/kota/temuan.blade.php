@php
  $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Data Temuan')

<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">

<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Data Temuan
  </h4>

  <div class="mb-4">
    <div class="">

      <div class="card">
        @if (session()->has('success'))
          <div class="alert alert-primary">
            {{ session()->get('success') }}
          </div>
        @endif
        <div class="row card-header">
          <h5 class="col-9">Data Temuan</h5>

        </div>
        <div class="card-body">

          @if ($temuans->count() > 0)
            <div class="table-responsive">
              <table id="dataTable" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Periode</th>
                    <th>Tanggal Penemuan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($temuans as $index => $item)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $item->dataStruktur->nama_odcb }}</td>
                      <td>{{ $item->dataStruktur->sifat }}</td>
                      <td>{{ $item->status }}</td>
                      <td>{{ $item->dataStruktur->periode }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                        <form action="{{ route('temuan.show', $item->id) }}" method="GET" style="display: inline;">
                          <button type="submit" class="btn btn-primary">
                            <i class="bx bx-show me-2"></i> View
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <h6 class="card-text">Data Temuan masih kosong</h6>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for Viewing Temuan Details -->
  <div class="modal fade" id="viewTemuanModal" tabindex="-1" aria-labelledby="viewTemuanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewTemuanModalLabel">Detail Temuan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Details will be loaded here dynamically -->
          <div class="row">
            <div class="col-12 mb-3">
              <strong>ID:</strong> <span id="modal-id"></span>
            </div>
            <div class="col-12 mb-3">
              <strong>Nama:</strong> <span id="modal-nama"></span>
            </div>
            <div class="col-12 mb-3">
              <strong>Jenis:</strong> <span id="modal-jenis"></span>
            </div>
            <div class="col-12 mb-3">
              <strong>Status:</strong> <span id="modal-status"></span>
            </div>
            <div class="col-12 mb-3">
              <strong>Periode:</strong> <span id="modal-periode"></span>
            </div>
            <div class="col-12 mb-3">
              <strong>Tanggal Penemuan:</strong> <span id="modal-tanggal"></span>
            </div>
            <div class="col-12 mb-3">
              <strong>Catatan:</strong> <span id="modal-catatan"></span>
            </div>
            <!-- Add more fields as needed -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var viewTemuanModal = document.getElementById('viewTemuanModal');
      viewTemuanModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var id = button.getAttribute('data-id');
        var nama = button.getAttribute('data-nama');
        var jenis = button.getAttribute('data-jenis');
        var status = button.getAttribute('data-status');
        var periode = button.getAttribute('data-periode');
        var tanggal = button.getAttribute('data-tanggal');
        var catatan = button.getAttribute('data-catatan');

        var modalId = viewTemuanModal.querySelector('#modal-id');
        var modalNama = viewTemuanModal.querySelector('#modal-nama');
        var modalJenis = viewTemuanModal.querySelector('#modal-jenis');
        var modalStatus = viewTemuanModal.querySelector('#modal-status');
        var modalPeriode = viewTemuanModal.querySelector('#modal-periode');
        var modalTanggal = viewTemuanModal.querySelector('#modal-tanggal');
        var modalCatatan = viewTemuanModal.querySelector('#modal-catatan');

        modalId.textContent = id;
        modalNama.textContent = nama;
        modalJenis.textContent = jenis;
        modalStatus.textContent = status;
        modalPeriode.textContent = periode;
        modalTanggal.textContent = tanggal;
        modalCatatan.textContent = catatan;
      });
    });
  </script>


@endsection
