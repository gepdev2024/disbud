<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDimensi extends Model
{
  protected $table = 'data_dimensi';

  protected $fillable = [
    'panjang',
    'tinggi',
    'lebar',
    'dia_atas',
    'dia_badan',
    'dia_kaki',
    'luas_tanah',
    'luas_struktur',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_dimensi');
  }
}
