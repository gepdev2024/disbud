<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
  protected $table = 'riwayat';


  protected $fillable = [
    'tanggal',
    'catatan',
    'status',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_riwayat');
  }
}
