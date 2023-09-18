<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAgunan extends Model
{
    protected $fillable = ['id', 'nama_status'];
    use HasFactory;

    public function agunanMasuk()
    {
        return $this->belongsToMany(AgunanMasuk::class, 'status_id', 'id');
    }

    public function agunanMasukPinjam()
    {
        return $this->belongsToMany(AgunanPinjam::class, 'status_id', 'id');
    }
}
