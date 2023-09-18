<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BerkasMasuk extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'CIF', 'no_rekening', 'nama_debitur', 'kode_lemari', 'upload_berkas', 'status'];
    // protected $table = 'berkas_masuks';
    public function berkasLemari()
    {
        return $this->belongsTo(BerkasLemari::class, 'kode_lemari', 'id');
    }

    public function berkasPinjam()
    {
        return $this->hasMany(BerkasPinjam::class, 'no_rekening', 'id');
    }

    // public function berkasPinjam()
    // {
    //     return $this->hasMany(BerkasPinjam::class);
    // }
}
