<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KondisiTerkini extends Model
{
  protected $table = 'kondisi_terkini';


  protected $fillable = [
    'keutuhan',
    'pemeliharaan',
    'pemugaran',
    'adaptasi',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_kondisi');
  }
}
