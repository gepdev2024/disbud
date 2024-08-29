<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPengelolaan extends Model
{
  protected $table = 'data_pengelolaan';
  protected $primaryKey = 'id_pengelolaan';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'nama_pengelola',
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
    return $this->hasMany(Temuan::class, 'id_pengelolaan');
  }
}
