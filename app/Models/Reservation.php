<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = ['pelanggan_id', 'kamar_id', 'tanggal_check_in', 'tanggal_check_out', 'total_biaya'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
