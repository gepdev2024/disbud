<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Temuan extends Model
{
  protected $table = 'temuan';
  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'id',             // UUID primary key, if you are setting it manually
    'id_struktur',    // Foreign key
    'id_lokasi',      // Foreign key
    'id_fisik',       // Foreign key
    'id_dimensi',     // Foreign key
    'id_kondisi',     // Foreign key
    'id_kepemilikan', // Foreign key
    'id_pengelolaan', // Foreign key
    'id_sejarah',     // Foreign key
    'id_riwayat',     // Foreign key
    'id_pengirim',    // Foreign key
    'status',         // Status of the entry
    'tanggal',        // Date column
    'catatan'         // Optional text note column
  ];
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
  public function pengirim()
  {
    return $this->belongsTo(Pengirim::class, 'id_pengirim');
  }
}
