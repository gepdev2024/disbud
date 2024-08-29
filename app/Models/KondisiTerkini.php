<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KondisiTerkini extends Model
{
  protected $table = 'kondisi_terkini';
  protected $primaryKey = 'id_kondisi';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'keutuhan',
    'pemeliharaan',
    'pemugaran',
    'adaptasi',
    'riwayat_pemugaran',
    'riwayat_adaptasi',
  ];

  public function temuan()
  {
    return $this->hasMany(Temuan::class, 'id_kondisi');
  }
}
