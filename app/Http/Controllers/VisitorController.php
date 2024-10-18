<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Foto;
use App\Models\Kabupaten;
use App\Models\ObjekWisata;
use App\Models\SubKategori;
use App\Models\Pengirim;
use App\Models\Temuan;
use App\Models\DataDimensi;
use App\Models\DataFisik;
use App\Models\DataKepemilikan;
use App\Models\DataPengelolaan;
use App\Models\DataSejarah;
use App\Models\DataStruktur;
use App\Models\KondisiTerkini;
use App\Models\LokasiPenemuan;
use App\Models\Riwayat;
use Carbon\Carbon;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\Period\Period;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Sarfraznawaz2005\VisitLog\Models\VisitLog as VisitLogModel;

class VisitorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    VisitLog::save();

    $visitor = VisitLogModel::whereDate('updated_at', Carbon::now()->toDateString())->count();
    $data = DB::table('objek_wisata')->join('kabupaten', 'objek_wisata.kabupaten_id', '=', 'kabupaten.id')->join('sub_kategori', 'objek_wisata.sub_kategori_id', '=', 'sub_kategori.id')->groupBy('kabupaten.id')->groupBy('sub_kategori.id')->select('kabupaten.id as idK', 'kabupaten.nama as kabupaten', 'sub_kategori.id as idS', 'sub_kategori.nama as sub_kategori', DB::raw('count(objek_wisata.id) as jumlah'))->get();
    $situs = 0;
    $benda = 0;
    $struktur = 0;
    $kawasan = 0;
    $bangunan = 0;
    foreach ($data as $key => $value) {
      if ($value->sub_kategori == 'Bangunan') {
        $bangunan += $value->jumlah;
      }

      if ($value->sub_kategori == 'Benda') {
        $benda += $value->jumlah;
      }
      if ($value->sub_kategori == 'Struktur') {
        $struktur += $value->jumlah;
      }

      if ($value->sub_kategori == 'Kawasan') {
        $kawasan += $value->jumlah;
      }

      if ($value->sub_kategori == 'Bangunan') {
        $bangunan += $value->jumlah;
      }
    }
    return view('index', compact('visitor', 'situs', 'benda', 'struktur', 'kawasan', 'bangunan'));
  }

  public function data()
  {
    VisitLog::save();

    $visitor = VisitLogModel::whereDate('updated_at', Carbon::now()->toDateString())->count();
    $kabupaten = Kabupaten::all();

    $data = DB::table('objek_wisata')->join('kabupaten', 'objek_wisata.kabupaten_id', '=', 'kabupaten.id')->join('sub_kategori', 'objek_wisata.sub_kategori_id', '=', 'sub_kategori.id')->groupBy('kabupaten.id')->groupBy('sub_kategori.id')->select('kabupaten.id as idK', 'kabupaten.nama as kabupaten', 'sub_kategori.id as idS', 'sub_kategori.nama as sub_kategori', DB::raw('count(objek_wisata.id) as jumlah'))->get();

    return view('visitor.data', compact(['visitor', 'data', 'kabupaten']));
  }

  public function benda()
  {
    VisitLog::save();

    $data = ObjekWisata::with(['fotos', 'subKategori:id,nama,kategori_id', 'subKategori.kategori:id,nama', 'kabupaten:id,nama'])->get();

    $kabupaten = Kabupaten::all();
    $sub_kategori = SubKategori::all();

    return view('visitor.benda', compact(['data', 'kabupaten', 'sub_kategori']));
  }

  public function takBenda()
  {
    $data = ObjekWisata::with(['fotos', 'subKategori:id,nama,kategori_id', 'subKategori.kategori:id,nama', 'kabupaten:id,nama'])
      ->where('status', 'Belum')
      ->get();

    return view('visitor.takBenda', compact('data'));
  }

  public function laporPraTemuan(): View
  {
    return view('visitor.laporTemuan');
  }

  public function KirimLaporPraTemuan(Request $request)
  {
    $required = [
      'nama_lengkap' => 'required|string|max:255',
      'nik' => 'required|numeric',
      'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      'nama_odcb' => 'required|string|max:255',
      'foto_temuan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];

    $validatedData = $request->validate($required);

    if ($request->hasFile('foto_ktp')) {
      $file = $request->file('foto_ktp');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathFotoKTP = $file->storeAs('/Pengirim/FotoKTP', $filename, 'public');
    }
    if ($request->hasFile('foto_temuan')) {
      $file = $request->file('foto_temuan');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathFoto = $file->storeAs('/DataSejarah/Foto', $filename, 'public');
    }

    $pengirim = Pengirim::create([
      'nama' => $validatedData['nama_lengkap'],
      'nik' => $validatedData['nik'],
      'foto_ktp' => $filePathFotoKTP,
      'token' => Str::random(8),
    ]);

    $dataSejarah = DataSejarah::create([
      'foto' => $filePathFoto,
    ]);

    $dataStruktur = DataStruktur::create([
      'nama_odcb' => $validatedData['nama_odcb'],
    ]);

    $temuan = Temuan::create([
      'id' => (string)Str::uuid(),
      'id_sejarah' => $dataSejarah->id,
      'id_struktur' => $dataStruktur->id,
      'id_pengirim' => $pengirim->id,
      'status' => 'pra_temuan',
    ]);

    return redirect()
      ->route('berhasilKirimLapor', ['token' => $pengirim->token])
      ->with('success', 'Laporan berhasil dikirim!')
      ->with('pengirim', $pengirim);
  }

  public function berhasilKirimLapor($token)
  {
    $pengirim = Pengirim::where('token', $token)->firstOrFail();
    return view('visitor.berhasilKirimLapor', ['pengirim' => $pengirim]);
  }

  public function cekToken(): View
  {
    return view('visitor.cekToken');
  }

  public function cekHasilToken(Request $request)
  {
    $validatedData = $request->validate([
      'nik' => 'required|string|max:255',
      'token' => 'required|string|max:255',
    ]);

    $pengirim = Pengirim::where('nik', $validatedData['nik'])
      ->where('token', $validatedData['token'])
      ->first();

    if ($pengirim) {
      $temuan = Temuan::where('id_pengirim', $pengirim->id)->first();
      return redirect()->route('cekToken')->with('message', 'Laporan ditemukan!')->with(compact('pengirim', 'temuan'));
    } else {
      return redirect()->route('cekToken')->with('error', 'Laporan tidak ditemukan. Silahkan cek NIK atau token anda.');
    }
  }

  public function LengkapiPraTemuan(string $token, Request $request)
  {
    $pengirim = Pengirim::where('token', $token)->firstOrFail();
    $temuan = Temuan::where('id_pengirim', $pengirim->id)->first();
    return view('visitor.lengkapiPraTemuan', [
      'pengirim' => $pengirim,
      'temuan' => $temuan,
    ]);
  }

  public function KirimLengkapiPraTemuan(Request $request)
  {
    $validate = $request->validate([
      'luas_tanah' => 'required|numeric',
      'lebar' => 'required|numeric',
      'diameter_kaki' => 'required|numeric',
      'lulus_struktur' => 'required|numeric',
      'panjang' => 'required|numeric',
      'diameter_atas' => 'required|numeric',
      'diameter_bawah' => 'required|numeric',
      'tinggi' => 'required|numeric',
      'status_pengelolaan' => 'required|string',
      'nama_pengelola' => 'required|string|max:255',
      'pengelolaan_provinsi' => 'required|string|max:255',
      'pengelolaan_kota' => 'required|string|max:255',
      'pengelolaan_kecamatan' => 'required|string|max:255',
      'pengelolaan_kelurahan' => 'required|string|max:255',
      'pengelolaan_alamat' => 'required|string|max:255',
      'pengelolaan_latitude' => 'required|numeric',
      'pengelolaan_longitude' => 'required|numeric',
      'status_kepemilikan' => 'required|string',
      'nama_pemilik' => 'required|string|max:255',
      'status_perolehan' => 'required|string',
      'kepemilikan_provinsi' => 'required|string|max:255',
      'kepemilikan_kota' => 'required|string|max:255',
      'kepemilikan_kecamatan' => 'required|string|max:255',
      'kepemilikan_kelurahan' => 'required|string|max:255',
      'kepemilikan_alamat' => 'required|string|max:255',
      'kepemilikan_latitude' => 'required|numeric',
      'kepemilikan_longitude' => 'required|numeric',
      'keutuhan' => 'required|string',
      'pemeliharaan' => 'required|string',
      'pemugaran' => 'required|string',
      'adaptasi' => 'required|string',
      'warna_bangunan' => 'required|string|max:255',
      'tanda_bangunan' => 'required|string|max:255',
      'ornamen_bangunan' => 'required|string|max:255',
      'waktu_pembuatan' => 'required|string|max:255',
      'periode_waktu_pembuatan' => 'required|string|max:255',
      'satuan_waktu_pembuatan' => 'required|string|max:255',
      'penemuan_provinsi' => 'required|string|max:255',
      'penemuan_kota' => 'required|string|max:255',
      'penemuan_kecamatan' => 'required|string|max:255',
      'penemuan_kelurahan' => 'required|string|max:255',
      'penemuan_alamat' => 'required|string|max:255',
      'penemuan_latitude' => 'required|numeric',
      'penemuan_longitude' => 'required|numeric',
      'penemuan_ketinggian' => 'required|numeric',
      'periode_struktur' => 'required|string|max:255',
      'staf_struktur' => 'required|string|max:255',
      'nama_lengkap' => 'required|string|max:255',
      'fungsi_struktur' => 'required|string|max:255',
      'nama_struktur' => 'required|string|max:255',
      'bahan_bangunan' => 'required|string|max:255',
      'deskripsi_sejarah' => 'required|string',
      'batas_zonasi_utara' => 'required|string|max:255',
      'batas_zonasi_barat' => 'required|string|max:255',
      'batas_zonasi_selatan' => 'required|string|max:255',
      'batas_zonasi_timur' => 'required|string|max:255',
      'nik' => 'required|numeric',
      'unit_panjang' => 'required|string|max:255',
      'unit_diameter_atas' => 'required|string|max:255',
      'unit_tinggi' => 'required|string|max:255',
      'unit_diameter_bawah' => 'required|string|max:255',
      'unit_luas_tanah' => 'required|string|max:255',
      'unit_lebar' => 'required|string|max:255',
      'unit_diameter_kaki' => 'required|string|max:255',
      'unit_lulus_struktur' => 'required|string|max:255',
      'dokumen_kajian' => 'required',
      'tautan_video' => 'required',
      'dokumen_lainnya' => 'required',
      'berkas_vektor' => 'required',
      'berkas_raster' => 'required',
    ]);

    if ($request->hasFile('dokumen_kajian')) {
      $file = $request->file('dokumen_kajian');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathDokumenKajian = $file->storeAs('/DataSejarah/DokumenKajian', $filename, 'public');
    }
    if ($request->hasFile('tautan_video')) {
      $file = $request->file('tautan_video');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathTautanVideo = $file->storeAs('/DataSejarah/TautanVideo', $filename, 'public');
    }
    if ($request->hasFile('dokumen_lainnya')) {
      $file = $request->file('dokumen_lainnya');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathDokumenLainnya = $file->storeAs('/DataSejarah/DokumenLainnya', $filename, 'public');
    }
    if ($request->hasFile('berkas_vektor')) {
      $file = $request->file('berkas_vektor');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathBerkasVektor = $file->storeAs('/DataSejarah/BerkasVektor', $filename, 'public');
    }
    if ($request->hasFile('berkas_raster')) {
      $file = $request->file('berkas_raster');
      $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
      $filePathBerkasRaster = $file->storeAs('/DataSejarah/BerkasRaster', $filename, 'public');
    }

    $pengirim = Pengirim::find($request['id_pengirim']);

    $dataStruktur = DataStruktur::where('id', $request['id_dataStruktur'])->update([
      'sifat' => $request['nama_struktur'],
      'fungsi' => $request['fungsi_struktur'],
      'periode' => $request['periode_struktur'],
    ]);

    $lokasiPenemuan = LokasiPenemuan::updateOrCreate(
      ['id' => $request['id_lokasiPenemuan']],
      ['provinsi' => $request['penemuan_provinsi'],
        'kota' => $request['penemuan_kota'],
        'kecamatan' => $request['penemuan_kecamatan'],
        'kelurahan' => $request['penemuan_kelurahan'],
        'alamat' => $request['penemuan_alamat'],
        'latitude' => $request['penemuan_latitude'],
        'longitude' => $request['penemuan_longitude'],
        'ketinggian' => $request['penemuan_ketinggian'],
      ]);

    $dataFisik = DataFisik::updateOrCreate(
      ['id' => $request['id_dataFisik']],
      ['bahan' => $request['bahan_bangunan'],
        'waktu_pembuatan' => $request['waktu_pembuatan'],
        'ornamen' => $request['ornamen_bangunan'],
        'tanda' => $request['tanda_bangunan'],
        'warna' => $request['warna_bangunan'],
      ]);

    $dataDimensi = DataDimensi::updateOrCreate(
      ['id' => $request['id_dataDimensi']],
      ['panjang' => $request['panjang'] . ' ' . $request['unit_panjang'],
        'tinggi' => $request['tinggi'] . ' ' . $request['unit_tinggi'],
        'lebar' => $request['lebar'] . ' ' . $request['unit_lebar'],
        'dia_atas' => $request['diameter_atas'] . ' ' . $request['unit_diameter_atas'],
        'dia_badan' => $request['diameter_bawah'] . ' ' . $request['unit_diameter_bawah'],
        'dia_kaki' => $request['diameter_kaki'] . ' ' . $request['unit_diameter_kaki'],
        'luas_tanah' => $request['luas_tanah'] . ' ' . $request['unit_luas_tanah'],
        'luas_struktur' => $request['lulus_struktur'] . ' ' . $request['unit_lulus_struktur'],
      ]);
    $kondisiTerkini = KondisiTerkini::updateOrCreate(
      ['id' => $request['id_kondisiTerkini']],
      ['keutuhan' => $request['keutuhan'],
        'pemeliharaan' => $request['pemeliharaan'],
        'pemugaran' => $request['pemugaran'],
        'adaptasi' => $request['adaptasi'],
      ]);

    $dataKepemilikan = DataKepemilikan::updateOrCreate(
      ['id' => $request['id_dataKepemilikan']],
      ['status_kepemilikan' => $request['status_kepemilikan'],
        'nama_pemilik' => $request['nama_pemilik'],
        'status_perolehan' => $request['status_perolehan'],
        'provinsi' => $request['kepemilikan_provinsi'],
        'kota' => $request['kepemilikan_kota'],
        'kecamatan' => $request['kepemilikan_kecamatan'],
        'kelurahan' => $request['kepemilikan_kelurahan'],
        'alamat' => $request['kepemilikan_alamat'],
        'latitude' => $request['kepemilikan_latitude'],
        'longitude' => $request['kepemilikan_longitude'],
      ]);

    $dataPengelolaan = DataPengelolaan::updateOrCreate(
      ['id' => $request['id_dataPengelolaan']],
      ['status_pengelola' => $request['status_pengelolaan'],
        'nama_pengelola' => $request['nama_pengelola'],
        'provinsi' => $request['pengelolaan_provinsi'],
        'kota' => $request['pengelolaan_kota'],
        'kecamatan' => $request['pengelolaan_kecamatan'],
        'kelurahan' => $request['pengelolaan_kelurahan'],
        'alamat' => $request['pengelolaan_alamat'],
        'latitude' => $request['pengelolaan_latitude'],
        'longitude' => $request['pengelolaan_longitude'],
      ]);

    $dataSejarah = DataSejarah::where('id', $request['id_dataSejarah'])->update([
      'deskripsi' => $request['deskripsi_sejarah'],
      'batas_utara' => $request['batas_zonasi_utara'],
      'batas_barat' => $request['batas_zonasi_barat'],
      'batas_selatan' => $request['batas_zonasi_selatan'],
      'batas_timur' => $request['batas_zonasi_timur'],
      'dokumen_kajian' => $filePathDokumenKajian,
      'video' => $filePathTautanVideo,
      'dokumen_lainnya' => $filePathDokumenLainnya,
      'berkas_vektor' => $filePathBerkasVektor,
      'berkas_raster' => $filePathBerkasRaster,
    ]);

    $riwayat = Riwayat::create([
      'tanggal' => Carbon::now(),
      'catatan' => 'Pra Laporan Temuan Dilengkapi',
    ]);

    $temuan = Temuan::where('id_pengirim', $request['id_pengirim'])->update([
      'id_lokasi' => $lokasiPenemuan->id,
      'id_fisik' => $dataFisik->id,
      'id_dimensi' => $dataDimensi->id,
      'id_kondisi' => $kondisiTerkini->id,
      'id_kepemilikan' => $dataKepemilikan->id,
      'id_pengelolaan' => $dataPengelolaan->id,
      'id_riwayat' => $riwayat->id,
      'status' => 'lengkapi_pra_temuan',
    ]);

    return redirect()
      ->route('berhasilKirimLapor', ['token' => $pengirim->token])
      ->with('success', 'Melengkapi Laporan berhasil dikirim!')
      ->with('pengirim', $pengirim);
  }
}
