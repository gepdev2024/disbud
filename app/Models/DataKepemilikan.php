<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKepemilikan extends Model
{
  protected $table = 'data_kepemilikan';


  protected $fillable = [
    'status_kepemilikan',
    'nama_pemilik',
    'status_perolehan',
    'provinsi',
    'kota',
    'kecamatan',
    'kelurahan',
    'alamat',
    'latitude',
    'longitude',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_kepemilikan');
  }
}
