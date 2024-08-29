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
    Schema::create('data_dimensi', function (Blueprint $table) {
      $table->id();
      $table->string('panjang');
      $table->string('tinggi');
      $table->string('lebar');
      $table->string('dia_atas');
      $table->string('dia_badan');
      $table->string('dia_kaki');
      $table->string('luas_tanah');
      $table->string('luas_struktur');
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
    Schema::dropIfExists('data_dimensi');
  }
};
