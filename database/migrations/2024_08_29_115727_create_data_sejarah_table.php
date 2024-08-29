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
    Schema::create('data_sejarah', function (Blueprint $table) {
      $table->id();
      $table->longText('deskripsi');
      $table->string('batas_utara');
      $table->string('batas_barat');
      $table->string('batas_selatan');
      $table->string('batas_timur');
      $table->string('foto')->nullable();
      $table->string('dokumen_kajian')->nullable();
      $table->string('video')->nullable();
      $table->string('dokumen_lainnya')->nullable();
      $table->string('berkas_vektor')->nullable();
      $table->string('berkas_raster')->nullable();
      $table->string('object')->nullable();
      $table->string('virtual')->nullable();
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
    Schema::dropIfExists('data_sejarah');
  }
};
