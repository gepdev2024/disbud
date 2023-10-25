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
            'id' => '1',
            'nama' => 'Bangunan',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'id' => '2',
            'nama' => 'Benda',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'id' => '3',
            'nama' => 'Situs',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'id' => '4',
            'nama' => 'Struktur',
            'kategori_id' => 1,
        ]);
        SubKategori::create([
            'id' => '5',
            'nama' => 'Kawasan',
            'kategori_id' => 1,
        ]);
    }
}
