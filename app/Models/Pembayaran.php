<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'penghuni_id',
        'jenis_iuran',
        'jumlah',
        'tanggal_pembayaran',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}
