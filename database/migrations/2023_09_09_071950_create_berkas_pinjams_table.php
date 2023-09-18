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
        Schema::create('berkas_pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekening');
            $table->string('nama_debitur');
            $table->string('nama_peminjam');
            $table->string('jabatan_peminjam');
            $table->date('tanggal_pinjam');
            $table->text('keterangan_digunakan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_pinjams');
    }
};
