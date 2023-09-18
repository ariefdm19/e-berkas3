<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianAgunan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_rekening', 'nama_debitur', 'tanggal', 'jaminan', 'alamat', 'no_hp', 'upload_bukti', 'status_id', 'keterangan'];
}
