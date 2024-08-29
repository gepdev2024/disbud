<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFisik extends Model
{
  protected $table = 'data_fisik';


  protected $fillable = [
    'bahan',
    'waktu_pembuatan',
    'ornamen',
    'tanda',
    'warna',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_fisik');
  }
}
