@php
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Foto')

@section('content')

<h4 class="fw-bold py-3 mb-4">
    Foto
</h4>


<div class="card">
    @if (session()->has('success'))
    <div class="alert alert-primary">
        {{ session()->get('success') }}
    </div>
    @endif

    <div>
        <h5 class="fw-bold card-header">Data Foto Objek Wisata</h5>
    </div>
    <div class="card-body">
        @foreach ($data as $item)
        <div class="row border py-3 align-middle" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseExample{{$item->id}}" aria-expanded="false" aria-controls="collapseExample">
            <h6 class="col-9 fw-bold ">{{$item->nama}}</h6>
            <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#addForm"
                data-bs-objek_wisata_id="{{$item->id}}">
                Tambah Foto
            </button>
            <div class="col-1 text-end ">
                <i class=" menu-icon tf-icons bx bx-down-arrow"></i>
            </div>
        </div>
        <div class="collapse" id="collapseExample{{$item->id}}">
            <div class="d-grid d-sm-flex p-3">
                @if (sizeof($item->fotos)>0)
                <table class="table">

                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->fotos as $foto)

                        <tr>
                            <td>
                                {{$foto->nama}}
                            </td>
                            <td>
                                <img  class="bd-placeholder-img object-fit-cover" height="100" width="150" src="{{'storage/foto/'.$foto->url}}">
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                                    href="foto/{{$foto->id}}/delete" class="text-danger">
                                    hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                @else
                <h6 class="card-text">Data foto belum ada</h6>
                @endif
            </div>
        </div>

        @endforeach
    </div>
</div>

<div class="modal fade" id="addForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="foto" method="POST" enctype="multipart/form-data">
                @csrf
                <input required type="hidden" name="objek_wisata_id" id="objek_wisata_id" class="form-control"
                    placeholder="id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama</label>
                            <input required type="text" name="nama" id="nameBasic" class="form-control"
                                placeholder="Nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col input-group mb-3">
                            <input name="foto" required type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Foto Popup</label>
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
    const editModal = document.getElementById('addForm')
    if (editModal) {
        editModal.addEventListener('show.bs.modal', event => {
            // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
            const button = event.relatedTarget
            // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
            const objek_wisata_id = button.getAttribute('data-bs-objek_wisata_id')
            //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
            editModal.querySelector('#objek_wisata_id').value=objek_wisata_id
        })
    }
</script>

@endsection