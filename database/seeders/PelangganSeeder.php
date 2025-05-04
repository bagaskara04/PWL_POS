<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Kenanga No.10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Ani Wijaya',
                'email' => 'ani@example.com',
                'no_hp' => '081298765432',
                'alamat' => 'Jl. Melati No.20',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
