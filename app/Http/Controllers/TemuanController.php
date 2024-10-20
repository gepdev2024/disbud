<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\CertificateService;

class TemuanController extends Controller
{
  protected $certificateService;

  public function __construct(CertificateService $certificateService)
  {
    $this->certificateService = $certificateService;
  }

  public function generateCertificate(Request $request)
  {
    $data = [
      'name' => $request->input('name'),
      'date' => now()->format('Y-m-d'),
      'filename' => 'certificate_' . time()
    ];

    $filePath = $this->certificateService->generateCertificate($data);

    return response()->download($filePath);
  }
  public function index()
  {
    $temuans = Temuan::all();
    return view('temuan.index', compact('temuans'));
  }
  public function PraTemuan()
  {
    $query = Temuan::with(['dataStruktur','dataSejarah','pengirim'])
      ->where('status', 'pra_temuan');
    $temuans = $query->get();
    return view('kota.praTemuan', [
      'temuans' => $temuans
    ]);
  }

  public function RiwayatPraTemuan()
  {
    $query = Temuan::with([
      'dataStruktur',
      'dataSejarah',
      'pengirim'
    ])->whereIn('status', ['terima_pra_temuan', 'tolak_pra_temuan']);
    $temuans = $query->get();
    return view('kota.praTemuan', [
      'temuans' => $temuans
    ]);
  }

  public function KonfirmasiPraTemuan(Request $request, Temuan $temuan)
  {
    $temuan->update([
      'status' => 'terima_pra_temuan'
    ]);
    $temuan->riwayat()->create([
      'tanggal' => Carbon::now(),
      'status' => 'valid',
    ]);
    return redirect()->route('pra-temuan')->with('success', 'Pra temuan telah dikonfirmasi');
  }

  public function TolakPraTemuan(Request $request, Temuan $temuan)
  {
    $temuan->update([
      'status' => 'tolak_pra_temuan'
    ]);

    $temuan->riwayat()->create([
      'tanggal' => Carbon::now(),
      'status' => 'valid',
    ]);
    return redirect()->route('pra-temuan')->with('success', 'Pra temuan telah di tolak.');
  }

  public function ProsesTemuan(Request $request)
  {
    $query = Temuan::with([
      'dataStruktur',
      'lokasiPenemuan',
      'dataFisik',
      'dataDimensi',
      'kondisiTerkini',
      'dataKepemilikan',
      'dataPengelolaan',
      'dataSejarah',
      'riwayat',
      'pengirim'
      ]);
//    ])->where('status', ['lengkapi_pra_temuan',]);
    $temuans = $query->get();
    return view('kota.temuan', [
      'temuans' => $temuans
    ]);
  }

  public function Temuan()
  {
    $temuans = Temuan::with([
      'dataStruktur',
      'lokasiPenemuan',
      'dataFisik',
      'dataDimensi',
      'kondisiTerkini',
      'dataKepemilikan',
      'dataPengelolaan',
      'dataSejarah',
      'riwayat',
      'pengirim'
      ]);
//    ])->where('status', 'temuan')->get();
    return view('kota.temuan', compact('temuans'));
  }

  public function RevisiTemuan(Request $request, $id){
    $validate = $request->validate([
      'catatan_revisi' => 'required|string',
    ]);
    $temuan = Temuan::findOrFail($id);
    $temuan->update([
      'status' => 'revisi',
      'catatan' => $validate['catatan_revisi'],
    ]);
    return redirect()->route('kota.temuan')
      ->with('success', 'Catatan / revisi berhasil dikirimkan!')
      ->with(compact('temuan'));
  }
  public function TolakTemuan(Request $request, $id){
    $validate = $request->validate([
      'catatan_tolak' => 'required|string',
    ]);
    $temuan = Temuan::findOrFail($id);
    $temuan->update([
      'status' => 'tolak',
      'catatan' => $validate['catatan_tolak'],
    ]);
    return redirect()->route('kota.temuan')
      ->with('success', 'Catatan / tolak berhasil dikirimkan!')
      ->with(compact('temuan'));
  }

//  public function SinkronTemuan($id){
//    $temuan = Temuan::findOrFail($id);
//    $temuan->update([
//      'status' => 'sinkron',
//      'catatan' => null
//    ]);
//    return redirect()->route('kota.temuan')
//      ->with('success', 'berhasil disinkron!')
//      ->with(compact('temuan'));
//  }

  public function SinkronTemuan($id)
  {
    $temuan = Temuan::findOrFail($id);

    // Generate the certificate
    $data = [
      'name' => $temuan->pengirim->name,
      'date' => now()->format('Y-m-d'),
      'filename' => 'certificate_' . time()
    ];
    $filePath = $this->certificateService->generateCertificate($data);

    // Update the temuan and pengirim
    $temuan->update([
      'status' => 'sinkron',
      'catatan' => null,
    ]);

    $temuan->pengirim->update([
      'sertifikat' => $filePath
    ]);

    return redirect()->route('kota.temuan')
      ->with('success', 'berhasil disinkron!')
      ->with(compact('temuan'));
  }

  public
  function create()
  {
    return view('temuans.create');
  }


  public
  function store(Request $request)
  {
    $validatedData = $request->validate([
      'status' => 'required|string',
      'tanggal' => 'required|date',
      'catatan' => 'nullable|string',
    ]);

    Temuan::create($validatedData);

    return redirect()->route('temuans.index');
  }


  public function detailTemuan($id)
  {

    $temuan = Temuan::with([
      'dataStruktur',
      'lokasiPenemuan',
      'dataFisik',
      'dataDimensi',
      'kondisiTerkini',
      'dataKepemilikan',
      'dataPengelolaan',
      'dataSejarah',
      'riwayat',
      'pengirim'
    ])->findOrFail($id);

    return view('kota.riwayat_temuan', compact('temuan'));
  }

  public
  function edit(Temuan $temuan)
  {
    return view('temuans.edit', compact('temuan'));
  }


  public
  function update(Request $request, Temuan $temuan)
  {
    $validatedData = $request->validate([
      'status' => 'required|string',
      'tanggal' => 'required|date',
      'catatan' => 'nullable|string',
    ]);

    $temuan->update($validatedData);

    return redirect()->route('temuans.index');
  }

  public
  function revisi(Request $request, Temuan $temuan)
  {
    $request->validate([
      'catatan' => 'required|string',
    ]);

    $temuan->update([
      'catatan' => $request->catatan,
      'status' => 'revisi',
    ]);

    $temuan->riwayat()->create([
      'tanggal' => Carbon::now(),
      'catatan' => $request->catatan,
      'status' => 'revisi',
    ]);

    return redirect()->route('temuan.show', $temuan->id)->with('success', 'Catatan revisi berhasil disimpan.');
  }

  public
  function valid(Temuan $temuan)
  {
    $temuan->update([
      'status' => 'valid',
    ]);

    $temuan->riwayat()->create([
      'tanggal' => Carbon::now(),
      'catatan' => 'Temuan divalidasi.',
      'status' => 'valid',
    ]);
    return redirect()->route('temuan.show', $temuan->id)->with('success', 'Temuan telah divalidasi.');
  }


  public
  function destroy(Temuan $temuan)
  {
    $temuan->delete();
    return redirect()->route('temuans.index');
  }
}
