<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = ['nama', 'url', 'objek_wisata_id', 'created_at', 'updated_at'];

    public function objekWisata(){
        return $this->belongsTo('App\Models\ObjekWisata');
    }
}
