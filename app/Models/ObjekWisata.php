<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    use HasFactory;

    protected $table = 'objek_wisata';

    protected $fillable = ['nama', 'deskripsi', 'latitude', 'longitude', 'gambar_popup', 'link_360', 'status', 'kabupaten_id', 'sub_kategori_id', 'created_at', 'updated_at'];

    public function kabupaten(){
        return $this->belongsTo('App\Models\Kabupaten');
    }

    public function subKategori(){
        return $this->belongsTo('App\Models\SubKategori');
    }

    public function fotos(){
        return $this->hasMany('App\Models\Foto');
    }
}
