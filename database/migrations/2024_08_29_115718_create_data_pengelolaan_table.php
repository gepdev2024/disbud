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
    Schema::create('data_pengelolaan', function (Blueprint $table) {
      $table->id();
      $table->string('status_pengelola');
      $table->string('nama_pengelola');
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
    Schema::dropIfExists('data_pengelolaan');
  }
};
