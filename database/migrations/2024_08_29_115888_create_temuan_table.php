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
      // Using UUID for primary key
      $table->uuid('id')->primary();

      // Foreign keys with cascade on delete for all relationships, allowing NULL values
      $table->foreignId('id_struktur')->nullable()->constrained('data_struktur')->onDelete('cascade');
      $table->foreignId('id_lokasi')->nullable()->constrained('lokasi_penemuan')->onDelete('cascade');
      $table->foreignId('id_fisik')->nullable()->constrained('data_fisik')->onDelete('cascade');
      $table->foreignId('id_dimensi')->nullable()->constrained('data_dimensi')->onDelete('cascade');
      $table->foreignId('id_kondisi')->nullable()->constrained('kondisi_terkini')->onDelete('cascade');
      $table->foreignId('id_kepemilikan')->nullable()->constrained('data_kepemilikan')->onDelete('cascade');
      $table->foreignId('id_pengelolaan')->nullable()->constrained('data_pengelolaan')->onDelete('cascade');
      $table->foreignId('id_sejarah')->nullable()->constrained('data_sejarah')->onDelete('cascade');
      $table->foreignId('id_riwayat')->nullable()->constrained('riwayat')->onDelete('cascade');
      $table->foreignId('id_pengirim')->constrained('pengirim')->onDelete('cascade');

      // Additional fields
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
