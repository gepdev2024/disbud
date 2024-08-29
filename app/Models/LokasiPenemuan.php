<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiPenemuan extends Model
{
  protected $table = 'lokasi_penemuan';


  protected $fillable = [
    'provinsi',
    'kota',
    'kecamatan',
    'kelurahan',
    'alamat',
    'latitude',
    'longitude',
    'ketinggian',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_lokasi');
  }
}
