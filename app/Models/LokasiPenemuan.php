<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiPenemuan extends Model
{
  protected $table = 'lokasi_penemuan';
  protected $primaryKey = 'id_lokasi';
  public $incrementing = false;
  protected $keyType = 'string';

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
    return $this->hasMany(Temuan::class, 'id_lokasi');
  }
}
