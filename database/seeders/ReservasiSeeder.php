<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reservasi')->insert([
            [
                'pelanggan_id' => 1,
                'kamar_id' => 1,
                'tanggal_check_in' => Carbon::create(2025, 4, 20),
                'tanggal_check_out' => Carbon::create(2025, 4, 22),
                'total_biaya' => 2 * 500000, // 2 malam × harga kamar
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pelanggan_id' => 2,
                'kamar_id' => 2,
                'tanggal_check_in' => Carbon::create(2025, 4, 19),
                'tanggal_check_out' => Carbon::create(2025, 4, 21),
                'total_biaya' => 2 * 400000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
