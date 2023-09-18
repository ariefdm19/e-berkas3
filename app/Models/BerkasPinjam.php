<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPinjam extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_rekening', 'nama_debitur', 'nama_peminjam', 'jabatan_peminjam', 'tanggal_pinjam', 'keterangan_digunakan', 'tanggal_kembali', 'status'];
    public function berkasMasuk()
    {
        return $this->belongsTo(BerkasMasuk::class, 'no_rekening', 'no_rekening');
    }

    // {
    //     return $this->belongsTo(BerkasMasuk::class);
    // }
}
