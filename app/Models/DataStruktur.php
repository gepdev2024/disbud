<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataStruktur extends Model
{
    protected $table = 'data_struktur';

    protected $fillable = ['nama_odcb', 'sifat', 'fungsi', 'periode'];

    public function temuan()
    {
        return $this->hasOne(Temuan::class, 'id_struktur');
    }
}
