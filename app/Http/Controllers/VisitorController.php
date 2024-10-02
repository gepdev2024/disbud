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

    public function laporTemuan(): View
    {
        return view('visitor.laporTemuan');
    }

    public function kirimLaporTemuan(Request $request)
    {
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate as an image
            // 'foto' => 'required',
            // 'dokumen_kajian' => 'required',
            // 'tautan_video' => 'required',
            // 'berkas_vektor' => 'required',
            // 'berkas_raster' => 'required',
        ];
        $kosong = 'Tidak boleh kosong';
        $messages = [
            'nama_lengkap.required' => 'Nama ' . $kosong,
            // 'foto.required' => 'Foto / Gambar ' . $kosong,
            // 'dokumen_kajian.required' => 'Dokumen Kajian ' . $kosong,
            // 'tautan_video.required' => 'Tautan Video ' . $kosong,
            // 'berkas_vektor.required' => 'Bekas Vektor ' . $kosong,
            // 'berkas_raster.required' => 'Berkas Raster ' . $kosong,
            'nik.required' => 'NIK ' . $kosong,
            'nik.numeric' => 'NIK hanya angka.',
            'foto_ktp.required' => 'Foto KTP  ' . $kosong,
            'foto_ktp.image' => 'Upload hanya gambar.',
            'foto_ktp.mimes' => 'Hanya jpeg, png, jpg.',
            'foto_ktp.max' => 'Gambar tidak boleh lebih 2MB.',
        ];

        $validatedData = $request->validate($rules, $messages);
        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePathFotoKTP = $file->storeAs('/Pengirim/FotoKTP', $filename, 'public');
        }
        if ($request->hasFile('foto_gambar')) {
            $file = $request->file('foto_gambar');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePathFoto = $file->storeAs('/DataSejarah/Foto', $filename,'public');
        }
        if ($request->hasFile('dokumen_kajian')) {
            $file = $request->file('dokumen_kajian');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePathDokumenKajian = $file->storeAs('/DataSejarah/DokumenKajian', $filename,'public');
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
            $filePathBerkasRaster = $file->storeAs('/DataSejarah/BerkasRaster', $filename,'public');
        }

        $pengirim = Pengirim::create([
            'nama' => $validatedData['nama_lengkap'],
            'nik' => $validatedData['nik'],
            'token' => Str::random(8),
            'foto_ktp' => $filePathFotoKTP,
        ]);

        $dataStruktur = DataStruktur::create([
            'nama_odcb' => $request['nama_struktur'],
            'sifat' => $request['nama_struktur'],
            'fungsi' => $request['fungsi_struktur'],
            'periode' => $request['periode_struktur'],
        ]);

        $lokasiPenemuan = LokasiPenemuan::create([
            'provinsi' => $request['penemuan_provinsi'],
            'kota' => $request['penemuan_kota'],
            'kecamatan' => $request['penemuan_kecamatan'],
            'kelurahan' => $request['penemuan_kelurahan'],
            'alamat' => $request['penemuan_alamat'],
            'latitude' => $request['penemuan_latitude'],
            'longitude' => $request['penemuan_longitude'],
            'ketinggian' => $request['penemuan_ketinggian'],
        ]);

        $dataFisik = DataFisik::create([
            'bahan' => $request['bahan_bangunan'],
            'waktu_pembuatan' => $request['waktu_pembuatan'],
            'ornamen' => $request['ornamen_bangunan'],
            'tanda' => $request['tanda_bangunan'],
            'warna' => $request['warna_bangunan'],
        ]);

        $dataDimensi = DataDimensi::create([
            'panjang' => $request['panjang']. ' ' . $request['unit_panjang'],
            'tinggi' => $request['tinggi']. ' ' . $request['unit_tinggi'],
            'lebar' => $request['lebar']. ' ' . $request['unit_lebar'],
            'dia_atas' => $request['diameter_atas']. ' ' . $request['unit_diameter_atas'],
            'dia_badan' => $request['diameter_bawah']. ' ' . $request['unit_diameter_bawah'],
            'dia_kaki' => $request['diameter_kaki']. ' ' . $request['unit_diameter_kaki'],
            'luas_tanah' => $request['luas_tanah']. ' ' . $request['unit_luas_tanah'],
            'luas_struktur' => $request['lulus_struktur']. ' ' . $request['unit_lulus_struktur'],
        ]);
        $kondisiTerkini = KondisiTerkini::create([
            'keutuhan' => $request['keutuhan'],
            'pemeliharaan' => $request['pemeliharaan'],
            'pemugaran' => $request['pemugaran'],
            'adaptasi' => $request['adaptasi'],
        ]);

        $dataKepemilikan = DataKepemilikan::create([
            'status_kepemilikan' => $request['status_kepemilikan'],
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

        $dataPengelolaan = DataPengelolaan::create([
            'status_pengelola' => $request['status_pengelolaan'],
            'nama_pengelola' => $request['nama_pengelola'],
            'provinsi' => $request['pengelolaan_provinsi'],
            'kota' => $request['pengelolaan_kota'],
            'kecamatan' => $request['pengelolaan_kecamatan'],
            'kelurahan' => $request['pengelolaan_kelurahan'],
            'alamat' => $request['pengelolaan_alamat'],
            'latitude' => $request['pengelolaan_latitude'],
            'longitude' => $request['pengelolaan_longitude'],
        ]);

        $dataSejarah = DataSejarah::create([
            'deskripsi' => $request['deskripsi_sejarah'],
            'batas_utara' => $request['batas_zonasi_utara'],
            'batas_barat' => $request['batas_zonasi_barat'],
            'batas_selatan' => $request['batas_zonasi_selatan'],
            'batas_timur' => $request['batas_zonasi_timur'],
            'foto' => $filePathFoto,
            'dokumen_kajian' => $filePathDokumenKajian,
            'video' => $filePathTautanVideo,
            'dokumen_lainnya' => $filePathDokumenLainnya,
            'berkas_vektor' => $filePathBerkasVektor,
            'berkas_raster' => $filePathBerkasRaster,
        ]);

        $riwayat = Riwayat::create([]);

        $temuan = Temuan::create([
            'id' => (string) Str::uuid(),
            'id_struktur' => $dataStruktur->id,
            'id_lokasi' => $lokasiPenemuan->id,
            'id_fisik' => $dataFisik->id,
            'id_dimensi' => $dataDimensi->id,
            'id_kondisi' => $kondisiTerkini->id,
            'id_kepemilikan' => $dataKepemilikan->id,
            'id_pengelolaan' => $dataPengelolaan->id,
            'id_sejarah' => $dataSejarah->id,
            'id_pengirim' => $pengirim->id,
            'id_riwayat' => $riwayat->id,
            'status' => 'Berhasil Dikirim',
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
            // return response('tes');
            return redirect()->route('cekToken')->with('message', 'Laporan ditemukan!')->with(compact('pengirim', 'temuan'));
        } else {
            return redirect()->route('cekToken')->with('error', 'Laporan tidak ditemukan. Silahkan cek NIK atau token anda.');
        }
    }
}
