<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kabupaten;
use App\Models\ObjekWisata;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function benda()
    {
        $data = ObjekWisata::with(['fotos', 'subKategori:id,nama,kategori_id', 'subKategori.kategori:id,nama', 'kabupaten:id,nama'])
            ->whereHas('subKategori.kategori', function ($query) {
                $query->where('nama', 'Benda');
            })
            ->get();

        return view('visitor.benda', compact('data'));
    }

    // public function takBenda()
    // {
    //     $data = ObjekWisata::with(['fotos', 'subKategori:id,nama,kategori_id', 'subKategori.kategori:id,nama', 'kabupaten:id,nama'])
    //         ->whereHas('subKategori.kategori', function ($query) {
    //             $query->where('nama', 'Tak Benda');
    //         })
    //         ->get();

    //     return view('visitor.takBenda', compact('data'));
    // }
}
