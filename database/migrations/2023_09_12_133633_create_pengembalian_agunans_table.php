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
        Schema::create('pengembalian_agunans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kredit');
            $table->string('nama_debitur');
            $table->date('tanggal');
            $table->string('jaminan');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('upload_bukti');
            $table->string('status_id');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_agunans');
    }
};
