@php
  $isNavbar = false ;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Data Temuan')

<link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ui-modals.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

@section('content')

  <div class="mb-4">
    <div class="">
      <div class="card">

        @if (session()->has('success'))
          <div class="alert alert-primary">
            {{ session()->get('success') }}
          </div>
        @endif

        <div class="row card-header">
          <div class="col-6">
            <h5> {{(url()->current() == route('pra-temuan') ? 'Data Pra Temuan' : 'Riwayat Data Pra Temuan')}}</h5>
          </div>
          <div class="col-6 d-flex justify-content-end">
            @if(url()->current() == route('pra-temuan'))
              <form action="{{ route('pra-temuan.riwayat') }}" style="display: inline;">
                <button type="submit" class="btn btn-outline-secondary py-auto px-auto">
                  <i class="bx bx-show me-2"></i> Riwayat
                </button>
              </form>
            @else
              <form action="{{ route('pra-temuan') }}" style="display: inline;">
                <button type="submit" class="btn btn-outline-secondary py-auto px-auto">
                  <i class="bx bx-arrow-back me-2"></i> Kembali
                </button>
              </form>
            @endif
          </div>
        </div>
        <div class="card-body">

          @if ($temuans->count() > 0)
            <div class="table-responsive">
              <table id="dataTable" class="display" style="width:100%">
                <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">ID Temuan</th>
                  <th class="text-center">Judul</th>
                  <th class="text-center">Waktu Dikirim</th>
                  @if(url()->current() == route('pra-temuan.riwayat'))
                    <th class="text-center">Status</th>
                  @endif
                  <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($temuans as $index => $item)
                  <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $item->id  }}</td>
                    <td class="text-center">{{ $item->dataStruktur->nama_odcb }}</td>
                    <td class="text-center">{{ $item->created_at }}</td>
                    @if(url()->current() == route('pra-temuan.riwayat'))
                      @if($item->status == 'terima_pra_temuan')
                        <td class="text-center">
                          <span class="badge bg-success">Diterima</span>
                        </td>
                      @else
                        <td class="text-center">
                          <span class="badge bg-danger">Ditolak</span>
                        </td>
                      @endif
                    @endif
                    <td class="text-center">
                      <button type="button" class="btn btn-primary py-auto px-auto" data-bs-toggle="modal"
                              data-bs-target="#viewPraTemuanModal{{$item->id}}">
                        <i class="bx bx-show me-2"></i> Lihat
                      </button>
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

  @foreach($temuans as $temuan)
    <div class="modal fade" id="viewPraTemuanModal{{$temuan->id}}" tabindex="-1"
         aria-labelledy="viewPraTemuanModalLabel" aria-hidden="true">
      <div class="modal-dialog px-5 modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom border-2  pb-3">
            <div class="col">
              <h3 class="modal-title mb-0 p-0" id="viewTemuanModalLabel">Detail Temuan</h3>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="mb-3">
                <h4 class="mb-1 mt-0 fw-bold">Identitas Pengirim</h4>
                <strong>Nama: {{ $temuan->pengirim->nama }}</strong> <br>
                <strong>NIK: {{ $temuan->pengirim->nik }}</strong> <br>
                <strong>Foto KTP: </strong> <br>
                <img src="{{ asset('/storage/' . $temuan->pengirim->foto_ktp) }}" class="w-25 border" alt="">
              </div>
              <div class="mb-3">
                <h4 class="mb-1 fw-bold">Temuan</h4>
                <strong>Judul Temuan: {{ $temuan->dataStruktur->nama_odcb }}</strong> <br>
                <strong>Foto Temuan: </strong> <br>
                <img src="{{ asset('/storage/' . $temuan->dataSejarah->foto) }}" class="w-25 border" alt="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            @if(url()->current() == route('pra-temuan'))
              <form action="{{ route('pra-temuan.konfirmasi', $temuan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success ms-2 d-flex align-items-center">
                  <i class="bx bxs-check-circle me-1"></i> Konfirmasi
                </button>
              </form>
              <form action="{{ route('pra-temuan.tolak', $temuan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger ms-2 d-flex align-items-center">
                  <i class="bx bxs-x-circle me-1"></i> Tolak
                </button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endforeach

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
