<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataStruktur extends Model
{
  protected $table = 'data_struktur';
  protected $primaryKey = 'id_struktur';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'nama_odcb',
    'sifat',
    'fungsi',
    'periode',
  ];

  public function temuan()
  {
    return $this->hasMany(Temuan::class, 'id_struktur');
  }
}
