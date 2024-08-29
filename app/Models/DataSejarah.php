<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSejarah extends Model
{
  protected $table = 'data_sejarah';


  protected $fillable = [
    'deskripsi',
    'batas_utara',
    'batas_barat',
    'batas_selatan',
    'batas_timur',
    'foto',
    'dokumen_kajian',
    'video',
    'dokumen_lainnya',
    'berkas_vektor',
    'berkas_raster',
    'object',
    'virtual',
  ];

  public function temuan()
  {
    return $this->hasOne(Temuan::class, 'id_sejarah');
  }
}
