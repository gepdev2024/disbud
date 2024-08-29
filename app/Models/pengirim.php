<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengirim extends Model
{
    use HasFactory;
    protected $table = 'pengirim';
    protected $fillable = ['nama', 'foto_ktp', 'token', 'nik'];

    public function temuan()
    {
        return $this->hasOne(Temuan::class, 'id_pengirim');
    }
}
