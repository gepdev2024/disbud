<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFisik extends Model
{
  protected $table = 'data_fisik';
  protected $primaryKey = 'id_fisik';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'bahan',
    'waktu_pembuatan',
    'ornamen',
    'tanda',
    'warna',
  ];

  public function temuan()
  {
    return $this->hasMany(Temuan::class, 'id_fisik');
  }
}
