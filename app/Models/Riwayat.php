<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
  protected $table = 'riwayat';
  protected $primaryKey = 'id_riwayat';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'tanggal',
    'catatan',
    'status',
  ];

  public function temuan()
  {
    return $this->hasMany(Temuan::class, 'id_riwayat');
  }
}
