<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::create([
    //     'name' => 'admin',
    //     'email' => 'admin@example.com',
    //     'password' => 'admin123',
    //     'role' => 'provinsi'
    // ]);

    User::create([
      'name' => 'bengkalis',
      'email' => 'bengkalis1@gmail.com',
      'password' => 'bengkalis123',
      'role' => 'kota'
    ]);
  }
}
