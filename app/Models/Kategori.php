<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = ['nama,', 'created_at', 'updated_at'];

    public function subKategoris()
    {
        return $this->hasMany('App\Models\SubKategori');
    }
}
