<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
  protected $table = 'temuan';
  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'string';

  public function dataStruktur()
  {
    return $this->belongsTo(DataStruktur::class, 'id_struktur');
  }

  public function lokasiPenemuan()
  {
    return $this->belongsTo(LokasiPenemuan::class, 'id_lokasi');
  }

  public function dataFisik()
  {
    return $this->belongsTo(DataFisik::class, 'id_fisik');
  }

  public function dataDimensi()
  {
    return $this->belongsTo(DataDimensi::class, 'id_dimensi');
  }

  public function kondisiTerkini()
  {
    return $this->belongsTo(KondisiTerkini::class, 'id_kondisi');
  }

  public function dataKepemilikan()
  {
    return $this->belongsTo(DataKepemilikan::class, 'id_kepemilikan');
  }

  public function dataPengelolaan()
  {
    return $this->belongsTo(DataPengelolaan::class, 'id_pengelolaan');
  }

  public function dataSejarah()
  {
    return $this->belongsTo(DataSejarah::class, 'id_sejarah');
  }

  public function riwayat()
  {
    return $this->belongsTo(Riwayat::class, 'id_riwayat');
  }
}
