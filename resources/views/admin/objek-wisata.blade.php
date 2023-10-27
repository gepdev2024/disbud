@php
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Objek Wisata')

<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="{{asset('DataTables/datatables.min.css')}}" rel="stylesheet">

<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>


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
                <h5 class=" col-9">Data Cagar Budaya</h5>
                <div class="col-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm">
                        Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">

                @if (sizeof($benda) > 0)
                <div class="">
                    <table id="dataTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Klasifikasi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Kategori</th>
                                <th>gambar popup</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($benda as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->kabupaten}}</td>
                                <td>{{$item->sub_kategori}}</td>
                                <td>{{$item->latitude}}</td>
                                <td>{{$item->longitude}}</td>
                                <td>
                                    @if ($item->status=="Terima")
                                    Cagar Budaya
                                    @else
                                    Objek Diduga Cagar Budaya
                                    @endif
                                </td>
                                <td>
                                    <ul class="list-unstyled align-items-center">
                                        <li class="avatar avatar-xs">
                                            <img src="{{asset('storage/gambarPopup/'.$item->gambar_popup)}}"
                                                alt="Avatar" class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="text-primary" href="" data-bs-toggle="modal"
                                            data-bs-target="#editForm" data-bs-id="{{$item->id}}"
                                            data-bs-nama="{{$item->nama}}" data-bs-deskripsi="{{$item->deskripsi}}"
                                            data-bs-status="{{$item->status}}"
                                            data-bs-description="{{$item->description}}"
                                            data-bs-kategori="{{$item->idS}}" data-bs-lokasi="{{$item->idK}}"
                                            data-bs-latitude="{{$item->latitude}}"
                                            data-bs-longitude="{{$item->longitude}}"
                                            data-bs-link="{{$item->link_360}}"><i class="bx bx-edit-alt me-2"></i>
                                        </a>
                                        <a class="text-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                                            href="objek-wisata/{{$item->id}}/delete"><i class="bx bx-trash me-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h6 class="card-text">Data Objek Wisata Masih Kosong</h6>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="addForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Objek Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="objek-wisata" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama</label>
                            <input required type="text" name="nama" id="nameBasic" class="form-control"
                                placeholder="Nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" required type="text" id="emailBasic"
                                class="form-control summernote" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Description</label>
                            <textarea name="description" required type="text" id="emailBasic"
                                class="form-control summernote" placeholder="Description"></textarea>
                        </div>
                    </div>
                    {{-- Ganti jadi radio button --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label for="status" class="form-label">Kategori</label>
                            <select name="status" required class="form-select" id="lokasi"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Terima">Cagar budaya</option>
                                <option value="Belum">Objek Diduga Cagar Budaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Klasifikasi</label>
                            <select name="kategori" required class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                $@foreach ($kategoriBenda as $item)
                                <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Lokasi</label>
                            <select name="lokasi" required class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($kabupaten as $item)
                                <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Latitude</label>
                            <input onchange="setMarker()" name="latitude" required type="text" id="latitude"
                                class="form-control" placeholder="Latitude">
                        </div>
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Longitude</label>
                            <input onchange="setMarker()" name="longitude" required type="text" id="longitude"
                                class="form-control" placeholder="Longitude">
                        </div>
                        <div id="mapAddBenda" style="height: 300px"></div>


                    </div>

                    <div class="row mt-4">
                        <div class="col input-group mb-3">
                            <input name="foto" required type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Foto Popup</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Link 360</label>
                            <input name="link" required type="text" id="nameBasic" class="form-control"
                                placeholder="Link">
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
<div class="modal fade" id="editForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Objek Wisata Benda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="objek-wisata/update" method="POST" enctype="multipart/form-data">
                @csrf
                <input required type="hidden" name="id" id="id" class="form-control" placeholder="id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input required type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" required type="text" id="deskripsi" class="form-control"
                                placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" required type="text" id="description" class="form-control"
                                placeholder="Description"></textarea>
                        </div>
                    </div>
                    {{-- ganti jadi radio button --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label for="status" class="form-label">Kategori</label>
                            <select name="status" required class="form-select" id="status"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Terima">Cagar budaya</option>
                                <option value="Belum">Objek Diduga Cagar Budaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Klasifikasi</label>
                            <select name="kategori" required class="form-select" id="kategori"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                $@foreach ($kategoriBenda as $item)
                                <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select name="lokasi" required class="form-select" id="lokasi"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                $@foreach ($kabupaten as $item)
                                <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input onchange="setMarkerEdit()" name="latitude" required type="text" id="latitude"
                                class="form-control" placeholder="Latitude">
                        </div>
                        <div class="col mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input onchange="setMarkerEdit()" name="longitude" required type="text" id="longitude"
                                class="form-control" placeholder="Longitude">
                        </div>
                        <div id="mapEditBenda" class="mb-4" style="height: 300px"></div>

                    </div>
                    <div class="row">
                        <div class="col input-group mb-3">
                            <input name="foto" type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Foto Popup</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="link" class="form-label">Link 360</label>
                            <input name="link" required type="text" id="link" class="form-control" placeholder="Link">
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

<script src="{{asset('DataTables/datatables.min.js')}}"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $('.summernote').summernote({
            tabsize: 2,
            height: 200
    });
    $('#dataTable').DataTable( {
        responsive: true
    } );
   
    var mapAddBenda = L.map('mapAddBenda',{
            zoomControl: false,
        }).setView([0.5933, 101.7068], 8, false);

        L.control.zoom({
            position: 'bottomright'
        }).addTo(mapAddBenda);

    var markerBenda = L.marker([0.5933, 101.7068], {draggable: true}).addTo(mapAddBenda);

    function setMarker(){
        markerBenda.setLatLng([ $("#latitude").val(), $("#longitude").val()]);
    }

    mapAddBenda.on('click', function(event){
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

    $(document).ready(function(){
        $('#addForm').on('shown.bs.modal', function(){
            setTimeout(function() {
                mapAddBenda.invalidateSize();
            }, 300);
        });
    })
</script>

<script>
    var mapEditBenda = L.map('mapEditBenda',{
            zoomControl: false,
        }).setView([0.5933, 101.7068], 8, false);

        L.control.zoom({
            position: 'bottomright'
        }).addTo(mapEditBenda);

    var markerEditBenda = L.marker([0.5933, 101.7068], {draggable: true}).addTo(mapEditBenda);

    function setMarkerEdit(){
        markerEditBenda.setLatLng([editModal.querySelector('#latitude').value, editModal.querySelector('#longitude').value]);
    }
    markerEditBenda.on('dragend', function(e) {
        var position = markerEditBenda.getLatLng();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng);
    })

    L.tileLayer('https://abcd.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    }).addTo(mapEditBenda);


    $(document).ready(function(){
        $('#editForm').on('shown.bs.modal', function(){
            setTimeout(function() {
                mapEditBenda.invalidateSize();
            }, 300);
        });
    })

    const editModal = document.getElementById('editForm')
            if (editModal) {
                editModal.addEventListener('show.bs.modal', event => {

                mapEditBenda.on('click', function(event){
                    const lat = mapEditBenda.mouseEventToLatLng(event.originalEvent).lat
                    const lng = mapEditBenda.mouseEventToLatLng(event.originalEvent).lng
                    markerEditBenda.setLatLng([lat, lng])
                    editModal.querySelector('#latitude').value=lat
                    editModal.querySelector('#longitude').value=lng
                })

                $("#latitude").val(0.5933);
                $("#longitude").val(101.7068);

                markerEditBenda.on('dragend', function(e) {
                    var position = markerBenda.getLatLng();
                    editModal.querySelector('#latitude').value=lat
                    editModal.querySelector('#longitude').value=lng
                })
            // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
            const button = event.relatedTarget
            // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
            const id = button.getAttribute('data-bs-id')
            const nama = button.getAttribute('data-bs-nama')
            const deskripsi = button.getAttribute('data-bs-deskripsi')
            const description = button.getAttribute('data-bs-description')
            const lokasi = button.getAttribute('data-bs-lokasi')
            const kategori = button.getAttribute('data-bs-kategori')
            const status = button.getAttribute('data-bs-status')
            const latitude = button.getAttribute('data-bs-latitude')
            const longitude = button.getAttribute('data-bs-longitude')
            const link = button.getAttribute('data-bs-link')
            //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
            editModal.querySelector('#id').value=id
            editModal.querySelector('#nama').value=nama
            editModal.querySelector('#deskripsi').value=deskripsi
            $.getScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js', function () 
            {
                    $('#deskripsi').summernote("code", deskripsi);
                    $('#description').summernote("code", description);
            })
            editModal.querySelector('#description').value=description
            editModal.querySelector('#lokasi').value=lokasi
            editModal.querySelector('#kategori').value=kategori
            editModal.querySelector('#status').value=status
            editModal.querySelector('#latitude').value=latitude
            editModal.querySelector('#longitude').value=longitude
            editModal.querySelector('#link').value=link

            markerEditBenda.setLatLng([ latitude, longitude ]);
        })
    }
</script>



@endsection