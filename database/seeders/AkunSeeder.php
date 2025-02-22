<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akuns')->insert([
            'no_ktp' => '11',
            'nama' => 'azhar',
            'tanggal_lahir' => Carbon::createFromDate(2007, 12, 22),
            'email' => 'agz2561gg@gmail.com',
            'no_telp' => '0123456789',
            'username' => 'a',
            'password' => Hash::make('1'),
            'is_admin' => false,
            'first_time' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('akuns')->insert([
            'no_ktp' => '11',
            'nama' => 'azhar',
            'tanggal_lahir' => Carbon::createFromDate(2007, 12, 22),
            'email' => 'agz2561gg@gmail.com',
            'no_telp' => '0123456789',
            'username' => 'admin',
            'password' => Hash::make('admin#12345'),
            'is_admin' => true,
            'first_time' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
