<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\ObjekWisata;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ObjekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $takbenda = DB::table('objek_wisata')
        //     ->join('sub_kategori', 'sub_kategori.id', '=', 'objek_wisata.sub_kategori_id')
        //     ->join('kategori', 'kategori.id', '=', 'sub_kategori.kategori_id')
        //     ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.kabupaten_id')
        //     ->where('kategori.nama', 'Tak Benda')
        //     ->select('objek_wisata.id', 'objek_wisata.nama', 'objek_wisata.deskripsi', 'objek_wisata.latitude', 'objek_wisata.longitude', 'objek_wisata.link_360', 'objek_wisata.gambar_popup', 'kabupaten.id as idK', 'kabupaten.nama as kabupaten', 'sub_kategori.id as idS', 'sub_kategori.nama as sub_kategori')
        //     ->get();
        $benda = DB::table('objek_wisata')
            ->join('sub_kategori', 'sub_kategori.id', '=', 'objek_wisata.sub_kategori_id')
            ->join('kategori', 'kategori.id', '=', 'sub_kategori.kategori_id')
            ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.kabupaten_id')
            ->where('kategori.nama', 'Benda')
            ->select('objek_wisata.id', 'objek_wisata.nama', 'objek_wisata.no_sk', 'objek_wisata.deskripsi', 'objek_wisata.description', 'objek_wisata.latitude', 'objek_wisata.longitude', 'objek_wisata.link_360', 'objek_wisata.gambar_popup', 'objek_wisata.status', 'kabupaten.id as idK', 'kabupaten.nama as kabupaten', 'sub_kategori.id as idS', 'sub_kategori.nama as sub_kategori')
            ->get();
        $kategoriBenda = SubKategori::where('kategori_id', '1')->get();
        // $kategoriTakbenda=SubKategori::where('kategori_id','2')->get();
        $kabupaten = Kabupaten::get(['id', 'nama']);

        return view('admin.objek-wisata', compact(['kabupaten', 'benda', 'kategoriBenda']));
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
        $gambar->storeAs('public/gambarPopup', $gambar->hashName());
        $objekWisata = ObjekWisata::create([
            'gambar_popup' => $gambar->hashName(),
            'nama' => $request->nama,
            'no_sk' => $request->no_sk,
            'deskripsi' => $request->deskripsi,
            'description' => $request->description,
            'status' => $request->status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'link_360' => $request->link,
            'kabupaten_id' => $request->lokasi,
            'sub_kategori_id' => $request->kategori,
        ]);
        if ($objekWisata) {
            return redirect('objek-wisata')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('objek-wisata')->with(['error' => 'Data Gagal Disimpan!']);
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
        //
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
    public function update(Request $request)
    {
        $objekWisata = ObjekWisata::findOrFail($request->id);
        if ($request->file('foto') == "") {
            $objekWisata->update([
                'nama' => $request->nama,
                'no_sk' => $request->no_sk,
                'deskripsi' => $request->deskripsi,
                'description' => $request->description,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'link_360' => $request->link,
                'status' => $request->status,
                'kabupaten_id' => $request->lokasi,
                'sub_kategori_id' => $request->kategori,
            ]);
        } else {
            Storage::disk('local')->delete('public/gambarPopup/' . $objekWisata->gambar_popup);
            $gambar = $request->file('foto');
            $gambar->StoreAs('public/gambarPopup', $gambar->hashName());
            $objekWisata->update([
                'gambar_popup' => $gambar->hashName(),
                'nama' => $request->nama,
                'no_sk' => $request->no_sk,
                'deskripsi' => $request->deskripsi,
                'description' => $request->description,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'link_360' => $request->link,
                'status' => $request->status,
                'kabupaten_id' => $request->lokasi,
                'sub_kategori_id' => $request->kategori,
            ]);
        }

        if ($objekWisata) {
            return redirect('objek-wisata')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('objek-wisata')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objekWisata = ObjekWisata::findOrFail($id);
        Storage::disk('local')->delete('public/gambarPopup/' . $objekWisata->gambar_popup);
        $objekWisata->delete();
        if ($objekWisata) {
            return redirect('objek-wisata')->with(['success' => 'Data Berhasil Hapus!']);
        } else {
            return redirect('objek-wisata')->with(['error' => 'Data Gagal Hapus!']);
        }
    }
}
