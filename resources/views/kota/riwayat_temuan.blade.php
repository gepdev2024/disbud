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
    Detail Temuan {{ $temuan->dataStruktur->nama_odcb }}
  </h4>

  <div class="mb-4">
    <div class="">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="d-flex justify-content-center flex-grow-1">
            <h5 class="mb-0">{{ $temuan->dataStruktur->nama_odcb }}</h5>
          </div>
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewTemuanModal"
            data-id="{{ $temuan->id }}" data-nama="{{ $temuan->dataStruktur->nama_odcb }}"
            data-jenis="{{ $temuan->dataStruktur->sifat }}" data-status="{{ $temuan->status }}"
            data-periode="{{ $temuan->dataStruktur->periode }}" data-tanggal="{{ $temuan->created_at }}">
            <i class="bx bx-show me-2"></i> View
          </button>
        </div>
      </div>
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

          @if ($temuan->count() > 0)
            <div class="table-responsive">
              <table id="dataTable" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $temuan->tanggal }}</td>
                    <td>{{ $temuan->catatan }}</td>
                    <td>{{ $temuan->status }}</td>
                  </tr>

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

  <!-- View Temuan Modal -->
  <div class="modal fade" id="viewTemuanModal" tabindex="-1" aria-labelledby="viewTemuanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewTemuanModalLabel">Detail Temuan {{ $temuan->dataStruktur->nama_odcb }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Data Struktur -->
          <h6>Data Struktur</h6>
          <table class="table table-striped table-bordered mb-4">

            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nama</td>
                <td>{{ $temuan->dataStruktur->nama_odcb }}</td>
              </tr>
              <tr>
                <td>Jenis</td>
                <td>{{ $temuan->dataStruktur->sifat }}</td>
              </tr>
              <tr>
                <td>Fungsi</td>
                <td>{{ $temuan->dataStruktur->fungsi }}</td>
              </tr>
              <tr>
                <td>Periode</td>
                <td>{{ $temuan->dataStruktur->periode }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Data Pengirim -->
          <h6>Data Pengirim</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nama</td>
                <td>{{ $temuan->pengirim->nama }}</td>
              </tr>
              <tr>
                <td>NIK</td>
                <td>{{ $temuan->pengirim->nik }}</td>
              </tr>
              <tr>
                <td>Foto KTP</td>
                <td><img src="{{ asset('storage/' . $temuan->pengirim->foto_ktp) }}" alt="Foto KTP"
                    style="width: 100px;"></td>
              </tr>
            </tbody>
          </table>

          <!-- Lokasi Penemuan -->
          <h6>Lokasi Penemuan</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Provinsi</td>
                <td>{{ $temuan->lokasiPenemuan->provinsi }}</td>
              </tr>
              <tr>
                <td>Kota</td>
                <td>{{ $temuan->lokasiPenemuan->kota }}</td>
              </tr>
              <tr>
                <td>Kecamatan</td>
                <td>{{ $temuan->lokasiPenemuan->kecamatan }}</td>
              </tr>
              <tr>
                <td>Kelurahan</td>
                <td>{{ $temuan->lokasiPenemuan->kelurahan }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{ $temuan->lokasiPenemuan->alamat }}</td>
              </tr>
              <tr>
                <td>Latitude</td>
                <td>{{ $temuan->lokasiPenemuan->latitude }}</td>
              </tr>
              <tr>
                <td>Longitude</td>
                <td>{{ $temuan->lokasiPenemuan->longitude }}</td>
              </tr>
              <tr>
                <td>Ketinggian</td>
                <td>{{ $temuan->lokasiPenemuan->ketinggian }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Data Fisik -->
          <h6>Data Fisik</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bahan</td>
                <td>{{ $temuan->dataFisik->bahan }}</td>
              </tr>
              <tr>
                <td>Waktu Pembuatan</td>
                <td>{{ $temuan->dataFisik->waktu_pembuatan }}</td>
              </tr>
              <tr>
                <td>Ornamen</td>
                <td>{{ $temuan->dataFisik->ornamen }}</td>
              </tr>
              <tr>
                <td>Tanda</td>
                <td>{{ $temuan->dataFisik->tanda }}</td>
              </tr>
              <tr>
                <td>Warna</td>
                <td>{{ $temuan->dataFisik->warna }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Data Dimensi -->
          <h6>Data Dimensi</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Panjang</td>
                <td>{{ $temuan->dataDimensi->panjang }}</td>
              </tr>
              <tr>
                <td>Tinggi</td>
                <td>{{ $temuan->dataDimensi->tinggi }}</td>
              </tr>
              <tr>
                <td>Lebar</td>
                <td>{{ $temuan->dataDimensi->lebar }}</td>
              </tr>
              <tr>
                <td>Diameter Atas</td>
                <td>{{ $temuan->dataDimensi->dia_atas }}</td>
              </tr>
              <tr>
                <td>Diameter Badan</td>
                <td>{{ $temuan->dataDimensi->dia_badan }}</td>
              </tr>
              <tr>
                <td>Diameter Kaki</td>
                <td>{{ $temuan->dataDimensi->dia_kaki }}</td>
              </tr>
              <tr>
                <td>Luas Tanah</td>
                <td>{{ $temuan->dataDimensi->luas_tanah }}</td>
              </tr>
              <tr>
                <td>Luas Struktur</td>
                <td>{{ $temuan->dataDimensi->luas_struktur }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Kondisi Terkini -->
          <h6>Kondisi Terkini</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Keutuhan</td>
                <td>{{ $temuan->kondisiTerkini->keutuhan }}</td>
              </tr>
              <tr>
                <td>Pemeliharaan</td>
                <td>{{ $temuan->kondisiTerkini->pemeliharaan }}</td>
              </tr>
              <tr>
                <td>Pemugaran</td>
                <td>{{ $temuan->kondisiTerkini->pemugaran }}</td>
              </tr>
              <tr>
                <td>Adaptasi</td>
                <td>{{ $temuan->kondisiTerkini->adaptasi }}</td>
              </tr>
              <tr>
                <td>Riwayat Pemugaran</td>
                <td>{{ $temuan->kondisiTerkini->riwayat_pemugaran }}</td>
              </tr>
              <tr>
                <td>Riwayat Adaptasi</td>
                <td>{{ $temuan->kondisiTerkini->riwayat_adaptasi }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Data Kepemilikan -->
          <h6>Data Kepemilikan</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Status Kepemilikan</td>
                <td>{{ $temuan->dataKepemilikan->status_kepemilikan }}</td>
              </tr>
              <tr>
                <td>Nama Pemilik</td>
                <td>{{ $temuan->dataKepemilikan->nama_pemilik }}</td>
              </tr>
              <tr>
                <td>Status Perolehan</td>
                <td>{{ $temuan->dataKepemilikan->status_perolehan }}</td>
              </tr>
              <tr>
                <td>Provinsi</td>
                <td>{{ $temuan->dataKepemilikan->provinsi }}</td>
              </tr>
              <tr>
                <td>Kota</td>
                <td>{{ $temuan->dataKepemilikan->kota }}</td>
              </tr>
              <tr>
                <td>Kecamatan</td>
                <td>{{ $temuan->dataKepemilikan->kecamatan }}</td>
              </tr>
              <tr>
                <td>Kelurahan</td>
                <td>{{ $temuan->dataKepemilikan->kelurahan }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{ $temuan->dataKepemilikan->alamat }}</td>
              </tr>
              <tr>
                <td>Latitude</td>
                <td>{{ $temuan->dataKepemilikan->latitude }}</td>
              </tr>
              <tr>
                <td>Longitude</td>
                <td>{{ $temuan->dataKepemilikan->longitude }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Data Pengelolaan -->
          <h6>Data Pengelolaan</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nama Pengelola</td>
                <td>{{ $temuan->dataPengelolaan->nama_pengelola }}</td>
              </tr>
              <tr>
                <td>Provinsi</td>
                <td>{{ $temuan->dataPengelolaan->provinsi }}</td>
              </tr>
              <tr>
                <td>Kota</td>
                <td>{{ $temuan->dataPengelolaan->kota }}</td>
              </tr>
              <tr>
                <td>Kecamatan</td>
                <td>{{ $temuan->dataPengelolaan->kecamatan }}</td>
              </tr>
              <tr>
                <td>Kelurahan</td>
                <td>{{ $temuan->dataPengelolaan->kelurahan }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{ $temuan->dataPengelolaan->alamat }}</td>
              </tr>
              <tr>
                <td>Latitude</td>
                <td>{{ $temuan->dataPengelolaan->latitude }}</td>
              </tr>
              <tr>
                <td>Longitude</td>
                <td>{{ $temuan->dataPengelolaan->longitude }}</td>
              </tr>
            </tbody>
          </table>

          <!-- Data Sejarah -->
          <h6>Data Sejarah</h6>
          <table class="table table-striped table-bordered mb-4">
            <thead>
              <tr>
                <th>Kolom</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Deskripsi</td>
                <td>{{ $temuan->dataSejarah->deskripsi }}</td>
              </tr>
              <tr>
                <td>Batas Utara</td>
                <td>{{ $temuan->dataSejarah->batas_utara }}</td>
              </tr>
              <tr>
                <td>Batas Selatan</td>
                <td>{{ $temuan->dataSejarah->batas_selatan }}</td>
              </tr>
              <tr>
                <td>Batas Barat</td>
                <td>{{ $temuan->dataSejarah->batas_barat }}</td>
              </tr>
              <tr>
                <td>Batas Timur</td>
                <td>{{ $temuan->dataSejarah->batas_timur }}</td>
              </tr>
              <tr>
                <td>Foto</td>
                <td><img src="{{ asset('storage/' . $temuan->dataSejarah->foto) }}" alt="Foto" style="width: 100px;">
                </td>
              </tr>
              <tr>
                <td>Dokumen Kajian</td>
                <td><a href="{{ asset('storage/' . $temuan->dataSejarah->dokumen_kajian) }}">Unduh</a></td>
              </tr>
              <tr>
                <td>Video</td>
                <td><a href="{{ asset('storage/' . $temuan->dataSejarah->video) }}">Tonton</a></td>
              </tr>
              <!-- Tambahkan baris tambahan sesuai kebutuhan -->
            </tbody>
          </table>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Tutup
          </button>
          <button type="button" class="btn btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#revisiModal">
            <i class="bx bx-edit-alt me-1"></i> Revisi
          </button>
          <form action="{{ route('temuan.valid', $temuan->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success ms-2">
              <i class="bx bx-check me-1"></i> Valid
            </button>
          </form>
        </div>
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
