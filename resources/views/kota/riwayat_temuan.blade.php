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
  <div class="card px-3">
    <h4 class="fw-bold py-3 mb-0">
      Detail Temuan {{ $temuan->dataStruktur->nama_odcb }}
    </h4>

    <div class="mb-4">

      <div class="">
        @if (session()->has('success'))
          <div class="alert alert-primary">
            {{ session()->get('success') }}
          </div>
        @endif
      </div>

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
          <td><img src="{{ asset('storage/' . $temuan->pengirim->foto_ktp) }}" alt="Foto KTP" style="width: 100px;">
          </td>
        </tr>
        </tbody>
      </table>


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
          <td>Sifat</td>
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
          <td><img src="{{ asset('storage/' . $temuan->dataSejarah->foto) }}" alt="Foto" style="width: 100px;"></td>
        </tr>
        <tr>
          <td>Dokumen Kajian</td>
          <td><a href="{{ asset('storage/' . $temuan->dataSejarah->dokumen_kajian) }}">Unduh</a></td>
        </tr>
        <tr>
          <td>Video</td>
          <td><a href="{{ asset('storage/' . $temuan->dataSejarah->video) }}">Unduh</a></td>
        </tr>
        <tr>
          <td>Dokumen Lainnya</td>
          <td><a href="{{ asset('storage/' . $temuan->dataSejarah->dokumen_lainnya) }}">Unduh</a></td>
        </tr>
        <tr>
          <td>Berkas Vektor</td>
          <td><a href="{{ asset('storage/' . $temuan->dataSejarah->berkas_vektor) }}">Unduh</a></td>
        </tr>
        <tr>
          <td>Berkas Raster</td>
          <td><a href="{{ asset('storage/' . $temuan->dataSejarah->berkas_raster) }}">Unduh</a></td>
        </tr>
        </tbody>
      </table>

      <div class="d-inline-flex">
        <form action="{{route('temuan.sinkron',$temuan->id)}}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="btn btn-success ms-2">
            <i class="bx bx-sync me-2"></i> Sinkron
          </button>
        </form>
        <div>
          <button type="button" class="btn btn-info ms-2" data-bs-toggle="modal"
                  data-bs-target="#viewRevisiTemuanModal{{$temuan->id}}">
            <i class="bx bx-edit me-2"></i> Revisi
          </button>
        </div>
        <div>
          <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                  data-bs-target="#viewTolakTemuanModal{{$temuan->id}}">
            <i class="bx bx-edit me-2"></i> Tolak
          </button>
          </button>
        </div>
      </div>
    </div>
  </div>

  {{--  Modal Revisi--}}
  <div class="modal fade" id="viewRevisiTemuanModal{{$temuan->id}}" tabindex="-1"
       aria-labelledy="viewRevisiTemuanModalLabel" aria-hidden="true">
    <form action="{{ route('temuan.revisi', $temuan->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-dialog px-5 modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="mb-3">
                <label for="catatan_revisi" class="form-label text-center mx-auto d-flex justify-content-center">Catatan
                  /
                  Revisi</label>
                <textarea class="form-control" id="catatan_revisi" name="catatan_revisi"
                          rows="4">{{ old('catatan_revisi') }}</textarea>
                @error('catatan_revisi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info ms-2 d-flex align-items-center">
              <i class="bx bx-edit me-1"></i> Revisi
            </button>
            <div>
              <button type="button" class="btn btn-secondary ms-2 d-flex align-items-center" data-bs-dismiss="modal">
                <i class="bx bx-x me-1"></i> Batal
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  {{--  Modal Tolak--}}
  <div class="modal fade" id="viewTolakTemuanModal{{$temuan->id}}" tabindex="-1"
       aria-labelledy="viewTolakTemuanModalLabel" aria-hidden="true">
    <form action="{{ route('temuan.tolak', $temuan->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-dialog px-5 modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="mb-3">
                <label for="catatan_tolak" class="form-label text-center mx-auto d-flex justify-content-center">Catatan
                  / Tolak</label>
                <textarea class="form-control" id="catatan_tolak" name="catatan_tolak"
                          rows="4">{{ old('catatan_tolak') }}</textarea>
                @error('catatan_tolak')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger ms-2 d-flex align-items-center">
              <i class="bx bx-x me-1"></i> Tolak
            </button>
            <div>
              <button type="button" class="btn btn-secondary ms-2 d-flex align-items-center" data-bs-dismiss="modal">
                <i class="bx bx-arrow-back me-1"></i> Batal
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

@endsection

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
