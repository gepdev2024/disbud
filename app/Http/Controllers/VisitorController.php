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
        $data = ObjekWisata::with(['fotos','subKategori:id,nama,kategori_id','subKategori.kategori:id,nama','kabupaten:id,nama'])->get();

        return view('index', compact('data'));
    }
}
