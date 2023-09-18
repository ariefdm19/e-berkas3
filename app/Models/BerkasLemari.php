<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasLemari extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'kode_lemari', 'nama_lemari'];
    protected $table = 'berkas_lemaris';

    public function berkasMasuk()
    {
        return $this->hasMany(BerkasMasuk::class, 'kode_lemari', 'id');
    }
}
