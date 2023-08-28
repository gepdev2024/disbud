<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\ObjekWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ObjekWisata::with(['fotos'])->get();

        return view('admin.foto', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('foto');
        $gambar->storeAs('public/foto', $gambar->hashName());
        $objekWisata = Foto::create([
            'url' => $gambar->hashName(),
            'nama' => $request->nama,
            'objek_wisata_id' => $request->objek_wisata_id,
        ]);
        if ($objekWisata) {
            return redirect('foto')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('foto')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        Storage::disk('local')->delete('public/foto/' . $foto->url);
        $foto->delete();
        if ($foto) {
            return redirect('foto')->with(['success' => 'Data Berhasil Hapus!']);
        } else {
            return redirect('foto')->with(['error' => 'Data Gagal Hapus!']);
        }
    }
}
