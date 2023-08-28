<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';

    protected $fillable = ['nama', 'created_at', 'updated_at'];

    public function objekWisatas(){
        return $this->hasMany('App\Models\ObjekWisata');
    }

}
