@php
  $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Objek Cagar Budaya')

<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">

<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Cagar Budaya
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
          <h5 class=" col-9">Data Cagar Budaya Provinsi</h5>
          <div class="col-3 d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserForm">
              Tambah Data
            </button>
          </div>
        </div>
        <div class="card-body">

          @if (sizeof($users) > 0)
            <div class="table-responsive">
              <table id="dataTable" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $item)
                    <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->role }}</td>
                      <td>
                        <div class="d-flex">
                          <a class="text-primary" href="#" data-bs-toggle="modal" data-bs-target="#editUserForm"
                            data-bs-id="{{ $item->id }}" data-bs-name="{{ $item->name }}"
                            data-bs-email="{{ $item->email }}" data-bs-role="{{ $item->role }}"><i
                              class="bx bx-edit-alt me-2"></i></a>
                          <form action="{{ route('users.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger"><i
                                class="bx bx-trash me-2"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <h6 class="card-text">Data Objek Cagar Budaya Masih Kosong</h6>
          @endif
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Add User Modal -->
  <div class="modal fade" id="addUserForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="name" class="form-label">Nama</label>
                <input required type="text" name="name" id="name" class="form-control" placeholder="Nama">
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" name="email" id="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" name="password" id="password" class="form-control"
                  placeholder="Password">
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" required class="form-select" id="role" aria-label="Default select example">
                  <option selected>Pilih Role</option>
                  <option value="provinsi">provinsi</option>
                  <option value="kota">kota</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Edit User Modal -->
  <div class="modal fade" id="editUserForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.update', 'id') }}" method="POST">
          @csrf
          @method('PUT')
          <input required type="hidden" name="id" id="edit-id" class="form-control" placeholder="id">

          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="edit-name" class="form-label">Nama</label>
                <input required type="text" name="name" id="edit-name" class="form-control" placeholder="Nama">
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="edit-email" class="form-label">Email</label>
                <input required type="email" name="email" id="edit-email" class="form-control"
                  placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="edit-password" class="form-label">Password</label>
                <input type="password" name="password" id="edit-password" class="form-control"
                  placeholder="Password">
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="edit-role" class="form-label">Role</label>
                <select name="role" required class="form-select" id="edit-role"
                  aria-label="Default select example">
                  <option selected>Pilih Role</option>
                  <option value="provinsi">provinsi</option>
                  <option value="kota">kota</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('leaflet/leaflet.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
  <!-- Summernote JS -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

  <script>
    $('.summernote').summernote({
      tabsize: 2,
      height: 200
    });
    $('#dataTable').DataTable({
      responsive: true
    });

    var mapAddBenda = L.map('mapAddBenda', {
      zoomControl: false,
    }).setView([0.5933, 101.7068], 8, false);

    L.control.zoom({
      position: 'bottomright'
    }).addTo(mapAddBenda);

    var markerBenda = L.marker([0.5933, 101.7068], {
      draggable: true
    }).addTo(mapAddBenda);

    function setMarker() {
      markerBenda.setLatLng([$("#latitude").val(), $("#longitude").val()]);
    }

    mapAddBenda.on('click', function(event) {
      const lat = mapAddBenda.mouseEventToLatLng(event.originalEvent).lat
      const lng = mapAddBenda.mouseEventToLatLng(event.originalEvent).lng
      markerBenda.setLatLng([lat, lng])
      $("#latitude").val(lat);
      $("#longitude").val(lng);
    })

    $("#latitude").val(0.5933);
    $("#longitude").val(101.7068);

    markerBenda.on('dragend', function(e) {
      var position = markerBenda.getLatLng();
      $("#latitude").val(position.lat);
      $("#longitude").val(position.lng);
    })


    L.tileLayer('https://abcd.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    }).addTo(mapAddBenda);

    $(document).ready(function() {
      $(".sk").hide();
      $('#addForm').on('shown.bs.modal', function() {
        setTimeout(function() {
          mapAddBenda.invalidateSize();
        }, 300);
      });
    })
  </script>

  <script>
    function showSk() {
      if ($('#status').val() == 'Terima') {
        $('.sk').show();
      } else {
        $('.sk').hide();
      }
    }
    var mapEditBenda = L.map('mapEditBenda', {
      zoomControl: false,
    }).setView([0.5933, 101.7068], 8, false);

    L.control.zoom({
      position: 'bottomright'
    }).addTo(mapEditBenda);

    var markerEditBenda = L.marker([0.5933, 101.7068], {
      draggable: true
    }).addTo(mapEditBenda);

    function setMarkerEdit() {
      markerEditBenda.setLatLng([editModal.querySelector('#latitude').value, editModal.querySelector('#longitude')
        .value
      ]);
    }
    markerEditBenda.on('dragend', function(e) {
      var position = markerEditBenda.getLatLng();
      $("#latitude").val(position.lat);
      $("#longitude").val(position.lng);
    })

    L.tileLayer('https://abcd.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    }).addTo(mapEditBenda);


    $(document).ready(function() {
      $('#editForm').on('shown.bs.modal', function() {
        setTimeout(function() {
          mapEditBenda.invalidateSize();
        }, 300);
      });
    })

    const editModal = document.getElementById('editForm')
    if (editModal) {

      editModal.addEventListener('show.bs.modal', event => {


        mapEditBenda.on('click', function(event) {
          const lat = mapEditBenda.mouseEventToLatLng(event.originalEvent).lat
          const lng = mapEditBenda.mouseEventToLatLng(event.originalEvent).lng
          markerEditBenda.setLatLng([lat, lng])
          editModal.querySelector('#latitude').value = lat
          editModal.querySelector('#longitude').value = lng
        })

        $("#latitude").val(0.5933);
        $("#longitude").val(101.7068);

        markerEditBenda.on('dragend', function(e) {
          var position = markerBenda.getLatLng();
          editModal.querySelector('#latitude').value = lat
          editModal.querySelector('#longitude').value = lng
        })
        // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
        const button = event.relatedTarget
        // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing
        if (button.getAttribute('data-bs-status') === "Terima") {
          $(".skEdit").show();
        } else {
          $(".skEdit").show();
        }
        const id = button.getAttribute('data-bs-id')
        const nama = button.getAttribute('data-bs-nama')
        const no_sk = button.getAttribute('data-bs-noSk')
        const tgl_sk = button.getAttribute('data-bs-tglSk')
        const level_sk = button.getAttribute('data-bs-levelSk')
        const deskripsi = button.getAttribute('data-bs-deskripsi')
        const description = button.getAttribute('data-bs-description')
        const lokasi = button.getAttribute('data-bs-lokasi')
        const kategori = button.getAttribute('data-bs-kategori')
        const status = button.getAttribute('data-bs-status')
        const latitude = button.getAttribute('data-bs-latitude')
        const longitude = button.getAttribute('data-bs-longitude')
        const link = button.getAttribute('data-bs-link')
        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        editModal.querySelector('#id').value = id
        editModal.querySelector('#nama').value = nama
        editModal.querySelector('#no_sk').value = no_sk
        editModal.querySelector('#tgl_sk').value = tgl_sk
        editModal.querySelector('#level_sk').value = level_sk
        editModal.querySelector('#deskripsi').value = deskripsi
        $.getScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js',
          function() {
            $('#deskripsi').summernote("code", deskripsi);
            $('#description').summernote("code", description);
          })
        editModal.querySelector('#description').value = description
        editModal.querySelector('#lokasi').value = lokasi
        editModal.querySelector('#kategori').value = kategori
        editModal.querySelector('#status').value = status
        editModal.querySelector('#latitude').value = latitude
        editModal.querySelector('#longitude').value = longitude
        editModal.querySelector('#link').value = link

        markerEditBenda.setLatLng([latitude, longitude]);
      })
    }
  </script>

@endsection
