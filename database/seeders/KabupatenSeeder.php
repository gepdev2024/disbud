<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kabupaten::create([
            'id' =>120,
            'nama' => 'Kota Pekanbaru',

        ]);
        Kabupaten::create([
            'id' =>139,
            'nama' => 'Kabupaten Kuantan Singingi',
            
        ]);
        Kabupaten::create([
            'id' =>197,
            'nama' => 'Kabupaten Rokan Hilir',
            
        ]);
        Kabupaten::create([
            'id' =>313,
            'nama' => 'Kota Dumai',
            
        ]);
        Kabupaten::create([
            'id' =>361,
            'nama' => 'Kabupaten Pelalawan',
            
        ]);
        Kabupaten::create([
            'id' =>362,
            'nama' => 'Kabupaten Siak',
            
        ]);
        Kabupaten::create([
            'id' =>363,
            'nama' => 'Kabupaten Kampar',
            
        ]);
        Kabupaten::create([
            'id' =>364,
            'nama' => 'Kabupaten Rokan Hilir',
            
        ]);
        Kabupaten::create([
            'id' =>421,
            'nama' => 'Kabupaten Indragiri Hulu',
            
        ]);
        Kabupaten::create([
            'id' =>444,
            'nama' => 'Kabupaten Bengkalis',
            
        ]);
        Kabupaten::create([
            'id' =>445,
            'nama' => 'Kabupaten Meranti',
            
        ]);
        Kabupaten::create([
            'id' =>472,
            'nama' => 'Kabupaten Ingragiri Hilir',
            
        ]);
    }
}
