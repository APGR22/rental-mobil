<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supirs')->insert([
            [
                'nama' => 'Kurniawan',
                'sedang_bekerja' => false,
                'harga' => 100_000
            ],
            [
                'nama' => 'Rusdi',
                'sedang_bekerja' => false,
                'harga' => 50_000
            ],
            [
                'nama' => 'Andre',
                'sedang_bekerja' => false,
                'harga' => 200_000
            ],
        ]);
    }
}
