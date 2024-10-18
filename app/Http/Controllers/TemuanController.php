<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemuanController extends Controller
{
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
    ])->where('status', ['lengkapi_pra_temuan',]);
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
    ])->where('status', 'temuan')->get();
    return view('kota.temuan', compact('temuans'));
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
