<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'id' => 1,
            'nama' => 'Benda'
        ]);

        Kategori::create([
            'id' => 2,
            'nama' => 'Tak Benda'
        ]);
    }
}
