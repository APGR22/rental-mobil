<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobils')->insert([
            [
                'tipe' => 'A',
                'sedang_disewa' => false,
                'harga' => 1_000_000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'B',
                'sedang_disewa' => true,
                'harga' => 5_000_000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'C',
                'sedang_disewa' => false,
                'harga' => 8_000_000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'D',
                'sedang_disewa' => false,
                'harga' => 10_000_000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
