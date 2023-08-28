<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $table = 'sub_kategori';

    protected $fillable = ['nama', 'kategori_id', 'created_at', 'updated_at'];

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }

    public function objekWisatas(){
        return $this->hasMany('App\Models\ObjekWisata');
    }
}
