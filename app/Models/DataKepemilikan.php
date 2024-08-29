<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKepemilikan extends Model
{
  protected $table = 'data_kepemilikan';
  protected $primaryKey = 'id_kepemilikan';
  public $incrementing = false;
  protected $keyType = 'string';

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
    return $this->hasMany(Temuan::class, 'id_kepemilikan');
  }
}
