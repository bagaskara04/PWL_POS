<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kamar')->insert([
            [
                'nomor_kamar' => '101',
                'tipe' => 'Deluxe',
                'harga_per_malam' => 500000,
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nomor_kamar' => '102',
                'tipe' => 'Superior',
                'harga_per_malam' => 400000,
                'status' => 'Terisi',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
