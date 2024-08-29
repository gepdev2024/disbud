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
    Schema::create('temuan', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignId('id_struktur')->constrained('data_struktur');
      $table->foreignId('id_lokasi')->constrained('lokasi_penemuan');
      $table->foreignId('id_fisik')->constrained('data_fisik');
      $table->foreignId('id_dimensi')->constrained('data_dimensi');
      $table->foreignId('id_kondisi')->constrained('kondisi_terkini');
      $table->foreignId('id_kepemilikan')->constrained('data_kepemilikan');
      $table->foreignId('id_pengelolaan')->constrained('data_pengelolaan');
      $table->foreignId('id_sejarah')->constrained('data_sejarah');
      $table->foreignId('id_riwayat')->constrained('riwayat');
      $table->string('status');
      $table->date('tanggal');
      $table->text('catatan')->nullable();
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
    Schema::dropIfExists('temuan');
  }
};
