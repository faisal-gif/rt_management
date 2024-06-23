<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat',
        'status',
        'penghuni_id',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}
