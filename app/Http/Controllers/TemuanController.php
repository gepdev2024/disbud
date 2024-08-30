<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemuanController extends Controller
{

  public function index()
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
    ])->get();
    return view('kota.temuan', compact('temuans'));
  }

  public function temuanProv()
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
    ])->get();
    return view('admin.temuan', compact('temuans'));
  }

  public function create()
  {
    return view('temuans.create');
  }


  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'status' => 'required|string',
      'tanggal' => 'required|date',
      'catatan' => 'nullable|string',
    ]);

    Temuan::create($validatedData);

    return redirect()->route('temuans.index');
  }


  public function show($id)
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

  public function edit(Temuan $temuan)
  {
    return view('temuans.edit', compact('temuan'));
  }


  public function update(Request $request, Temuan $temuan)
  {
    $validatedData = $request->validate([
      'status' => 'required|string',
      'tanggal' => 'required|date',
      'catatan' => 'nullable|string',
    ]);

    $temuan->update($validatedData);

    return redirect()->route('temuans.index');
  }
  public function revisi(Request $request, Temuan $temuan)
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

  public function valid(Temuan $temuan)
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


  public function destroy(Temuan $temuan)
  {
    $temuan->delete();
    return redirect()->route('temuans.index');
  }
}
