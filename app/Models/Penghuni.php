<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'foto_ktp',
        'status',
        'nomor_telepon',
        'sudah_menikah',
    ];

    public function rumah()
    {
        return $this->hasOne(Rumah::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
