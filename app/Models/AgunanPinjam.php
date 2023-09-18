<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgunanPinjam extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_rekening', 'nama_debitur', 'nama_peminjam', 'tanggal_pinjam', 'tanggal_kembali', 'keperluan', 'status_id'];

    public function statusAgunan()
    {
        return $this->belongsTo(StatusAgunan::class, 'status_id', 'id');;
    }
}
