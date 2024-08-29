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
    Schema::create('kondisi_terkini', function (Blueprint $table) {
      $table->id();
      $table->string('keutuhan');
      $table->string('pemeliharaan');
      $table->string('pemugaran');
      $table->string('adaptasi');
      $table->longText('riwayat_pemugaran')->nullable();
      $table->longText('riwayat_adaptasi')->nullable();
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
    Schema::dropIfExists('kondisi_terkini');
  }
};
