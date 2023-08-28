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
        SubKategori::create([
            'nama' => 'Keterampilan dan Kemahiran Kerajinan Tradisional',
            'kategori_id' => 2,
        ]);
        SubKategori::create([
            'nama' => 'Seni Pertunjukan',
            'kategori_id' => 2,
        ]);
        SubKategori::create([
            'nama' => 'Pengetahuan dan Kebiasaan Perilaku Mengenai Alam dan Semesta',
            'kategori_id' => 2,
        ]);
        SubKategori::create([
            'nama' => 'Tradisi Lisan dan Ekspresi',
            'kategori_id' => 2,
        ]);
        SubKategori::create([
            'nama' => 'Adat Istiadat Masyarakat, Ritual, dan Perayaan-Perayaan',
            'kategori_id' => 2,
        ]);
    }
}
