<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berkas_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('CIF');
            $table->string('nomor_kredit');
            $table->string('nomor_rekening');
            $table->string('nama_debitur');
            $table->unsignedBigInteger('kode_lemari'); // Ini akan menjadi kunci asing
            $table->string('upload_berkas')->nullable();
            $table->timestamps();
        });

        Schema::table('berkas_masuks', function (Blueprint $table) {
            $table->foreign('kode_lemari')->references('id')->on('berkas_lemaris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_masuks');
    }
};
