<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = ['nama', 'email', 'no_hp', 'alamat'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
