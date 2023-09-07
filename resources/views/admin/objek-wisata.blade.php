@php
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Objek Wisata')

@section('content')

<h4 class="fw-bold py-3 mb-4">
    Objek Wisata
</h4>

<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">Benda</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile"
                aria-controls="navs-top-profile" aria-selected="false">Tak Benda</button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">

            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-primary">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="row">
                    <h5 class="card-header col-10">Data Objek Wisata Benda</h5>
                    <div class="col-2 pt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if (sizeof($benda) > 0)
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Lokasi</th>
                                    <th>Kategori</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Link 360</th>
                                    <th>Status Kondisi</th>
                                    <th>gambar popup</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($benda as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td class="d-inline-block text-truncate" style="max-width: 300px;">
                                        {{$item->deskripsi}}</td>
                                    <td>{{$item->kabupaten}}</td>
                                    <td>{{$item->sub_kategori}}</td>
                                    <td>{{$item->latitude}}</td>
                                    <td>{{$item->longitude}}</td>
                                    <td>{{$item->link_360}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xs pull-up">
                                                <img src="{{storage_path('app/public/gambarPopup/$item->gambar_popup')}}" alt="Avatar"
                                                    class="rounded-circle">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <a class="text-primary" href="" data-bs-toggle="modal"
                                            data-bs-target="#editForm" data-bs-id="{{$item->id}}"
                                            data-bs-nama="{{$item->nama}}" data-bs-deskripsi="{{$item->deskripsi}}"
                                            data-bs-status="{{$item->status}}" data-bs-kategori="{{$item->idS}}"
                                            data-bs-lokasi="{{$item->idK}}" data-bs-latitude="{{$item->latitude}}"
                                            data-bs-longitude="{{$item->longitude}}"
                                            data-bs-link="{{$item->link_360}}"><i class="bx bx-edit-alt me-2"></i>
                                        </a>
                                        |
                                        <a class="text-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                                            href="objek-wisata/{{$item->id}}/delete"><i class="bx bx-trash me-2"></i>
                                        </a>
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
        <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-primary">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="row">
                    <h5 class="card-header col-10">Data Objek Wisata Tak Benda</h5>
                    <div class="col-2 pt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFormTB">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if (sizeof($takbenda) > 0)
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Lokasi</th>
                                    <th>Kategori</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Link 360</th>
                                    <th>gambar popup</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($takbenda as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td class="d-inline-block text-truncate" style="max-width: 300px;">
                                        {{$item->deskripsi}}</td>
                                    <td>{{$item->kabupaten}}</td>
                                    <td>{{$item->sub_kategori}}</td>
                                    <td>{{$item->latitude}}</td>
                                    <td>{{$item->longitude}}</td>
                                    <td>{{$item->link_360}}</td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xs pull-up">
                                                <img src="{{asset('storage/gambarPopup/'.$item->gambar_popup)}}" alt="Avatar"
                                                    class="rounded-circle">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <a class="text-primary" href="" data-bs-toggle="modal"
                                            data-bs-target="#editForm" data-bs-id="{{$item->id}}"
                                            data-bs-nama="{{$item->nama}}" data-bs-deskripsi="{{$item->deskripsi}}"
                                            data-bs-lokasi="{{$item->idK}}" data-bs-latitude="{{$item->latitude}}"
                                            data-bs-longitude="{{$item->longitude}}"
                                            data-bs-link="{{$item->link_360}}"><i class="bx bx-edit-alt me-2"></i>
                                        </a>
                                        |
                                        <a class="text-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                                            href="objek-wisata/{{$item->id}}/delete"><i class="bx bx-trash me-2"></i>
                                        </a>
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
                            <textarea name="deskripsi" required type="text" id="emailBasic" class="form-control"
                                placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="status" class="form-label">Status Kondisi</label>
                            <select name="status" required class="form-select" id="lokasi"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Terawat">Terawat</option>
                                <option value="Utuh">Utuh</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
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
                                $@foreach ($kabupaten as $item)
                                <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Latitude</label>
                            <input name="latitude" required type="text" id="emailBasic" class="form-control"
                                placeholder="Latitude">
                        </div>
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Longitude</label>
                            <input name="longitude" required type="text" id="emailBasic" class="form-control"
                                placeholder="Longitude">
                        </div>
                    </div>
                    <div class="row">
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
<div class="modal fade" id="addFormTB" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Objek Wisata Tak Benda</h5>
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
                            <textarea name="deskripsi" required type="text" id="emailBasic" class="form-control"
                                placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                            <select name="kategori" required class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                $@foreach ($kategoriTakbenda as $item)
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
                                $@foreach ($kabupaten as $item)
                                <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Latitude</label>
                            <input name="latitude" required type="text" id="emailBasic" class="form-control"
                                placeholder="Latitude">
                        </div>
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">Longitude</label>
                            <input name="longitude" required type="text" id="emailBasic" class="form-control"
                                placeholder="Longitude">
                        </div>
                    </div>
                    <div class="row">
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
                            <label for="status" class="form-label">Status Kondisi</label>
                            <select name="status" required class="form-select" id="status"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Terawat">Terawat</option>
                                <option value="Utuh">Utuh</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
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
                            <input name="latitude" required type="text" id="latitude" class="form-control"
                                placeholder="Latitude">
                        </div>
                        <div class="col mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input name="longitude" required type="text" id="longitude" class="form-control"
                                placeholder="Longitude">
                        </div>
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


<script>
    const editModal = document.getElementById('editForm')
    if (editModal) {
        editModal.addEventListener('show.bs.modal', event => {
            // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
            const button = event.relatedTarget
            // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
            const id = button.getAttribute('data-bs-id')
            const nama = button.getAttribute('data-bs-nama')
            const deskripsi = button.getAttribute('data-bs-deskripsi')
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
            editModal.querySelector('#lokasi').value=lokasi
            editModal.querySelector('#kategori').value=kategori
            editModal.querySelector('#status').value=status
            editModal.querySelector('#latitude').value=latitude
            editModal.querySelector('#longitude').value=longitude
            editModal.querySelector('#link').value=link
        })
    }
</script>
@endsection