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
        $data = DB::table('objek_wisata')
            ->join('kabupaten', 'objek_wisata.kabupaten_id', '=', 'kabupaten.id')
            ->join('sub_kategori', 'objek_wisata.sub_kategori_id', '=', 'sub_kategori.id')
            ->groupBy('kabupaten.id')
            ->groupBy('sub_kategori.id')
            ->select('kabupaten.id as idK', 'kabupaten.nama as kabupaten', 'sub_kategori.id as idS', 'sub_kategori.nama as sub_kategori', DB::raw('count(objek_wisata.id) as jumlah'))
            ->get();
        $situs = 0;
        $benda = 0;
        $struktur = 0;
        $kawasan = 0;
        $bangunan = 0;
        foreach ($data as $key => $value) {
            if ($value->sub_kategori == "Bangunan") {
                $bangunan += $value->jumlah;
            }

            if ($value->sub_kategori == "Benda") {
                $benda += $value->jumlah;
            }
            if ($value->sub_kategori == "Struktur") {
                $struktur += $value->jumlah;
            }

            if ($value->sub_kategori == "Kawasan") {
                $kawasan += $value->jumlah;
            }

            if ($value->sub_kategori == "Bangunan") {
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

        $data = DB::table('objek_wisata')
            ->join('kabupaten', 'objek_wisata.kabupaten_id', '=', 'kabupaten.id')
            ->join('sub_kategori', 'objek_wisata.sub_kategori_id', '=', 'sub_kategori.id')
            ->groupBy('kabupaten.id')
            ->groupBy('sub_kategori.id')
            ->select('kabupaten.id as idK', 'kabupaten.nama as kabupaten', 'sub_kategori.id as idS', 'sub_kategori.nama as sub_kategori', DB::raw('count(objek_wisata.id) as jumlah'))
            ->get();


        return view('visitor.data', compact(['visitor', 'data', 'kabupaten']));
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
