<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDimensi extends Model
{
  protected $table = 'data_dimensi';
  protected $primaryKey = 'id_dimensi';
  public $incrementing = false;
  protected $keyType = 'string';

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
    return $this->hasMany(Temuan::class, 'id_dimensi');
  }
}
