<?php

namespace Database\Seeders;

use App\Models\SubKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubKategori::create([
            'nama' => 'Bangunan',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'nama' => 'Benda',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'nama' => 'Situs',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'nama' => 'Struktur',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'nama' => 'Kawasan',
            'kategori_id' => 1,
        ]);
    }
}
