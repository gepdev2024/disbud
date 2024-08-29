<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lokasi_penemuan', function (Blueprint $table) {
      $table->id();
      $table->string('provinsi');
      $table->string('kota');
      $table->string('kecamatan');
      $table->string('kelurahan');
      $table->string('alamat');
      $table->string('latitude');
      $table->string('longitude');
      $table->string('ketinggian');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('lokasi_penemuan');
  }
};
