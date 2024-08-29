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
    Schema::create('data_kepemilikan', function (Blueprint $table) {
      $table->id();
      $table->string('status_kepemilikan');
      $table->string('nama_pemilik');
      $table->string('status_perolehan');
      $table->string('provinsi');
      $table->string('kota');
      $table->string('kecamatan');
      $table->string('kelurahan');
      $table->string('alamat');
      $table->string('latitude');
      $table->string('longitude');
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
    Schema::dropIfExists('data_kepemilikan');
  }
};
