<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgunanMasuk extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_rekening', 'nama_debitur', 'upload_berkas', 'status_id'];

    public function agunanMasuk()
    {
        return $this->hasMany(BerkasMasuk::class, 'no_rekening', 'id');
    }

    public function statusAgunan()
    {
        return $this->belongsTo(StatusAgunan::class, 'status_id', 'id');;
    }
}
