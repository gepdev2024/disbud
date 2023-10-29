<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kabupaten;
use App\Models\ObjekWisata;
use App\Models\SubKategori;
use Carbon\Carbon;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\Period\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        
        return view('index', compact('visitor'));
    }

    public function benda()
    {
        VisitLog::save();

        $data = ObjekWisata::with(['fotos', 'subKategori:id,nama,kategori_id', 'subKategori.kategori:id,nama', 'kabupaten:id,nama'])
            ->get();

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
}
