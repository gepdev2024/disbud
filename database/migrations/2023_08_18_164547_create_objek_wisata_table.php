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
        Schema::create('objek_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('description');
            $table->longText('latitude')->nullable();
            $table->longText('longitude')->nullable();
            $table->string('gambar_popup');
            $table->string('link_360')->nullable();
            $table->string('status');
            $table->bigInteger('kabupaten_id')->unsigned();
            $table->foreign('kabupaten_id')->references('id')->on('kabupaten');
            $table->bigInteger('sub_kategori_id')->unsigned();
            $table->foreign('sub_kategori_id')->references('id')->on('sub_kategori');
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
        Schema::dropIfExists('objek_wisata');
    }
};
