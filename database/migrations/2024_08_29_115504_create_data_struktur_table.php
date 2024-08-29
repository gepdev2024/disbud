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
    Schema::create('data_struktur', function (Blueprint $table) {
      $table->id();
      $table->string('nama_odcb');
      $table->string('sifat');
      $table->string('fungsi');
      $table->string('periode');
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
    Schema::dropIfExists('data_struktur');
  }
};
