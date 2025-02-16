<?php

/**
 * https://stackoverflow.com/questions/39089190/laravel-authloginuser-not-working-properly
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //used by Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Akun extends Authenticatable
{
    // use HasFactory; //default
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'no_ktp',
        'nama',
        'tanggal_lahir',
        'email',
        'no_telp',
        'username',
        'password'
    ];

    protected $guarded = [
        'is_admin' /*Default: false*/
    ];

    protected $hidden = [
        'no_ktp',
        'no_telp',
        'password'
    ];

    /**
     * Summary of casts
     * 
     * Alih-alih melakukan cast secara manual,
     * Laravel akan mengotomatiskan cast data
     * ke tipe data PHP yang kita inginkan.
     * 
     * Menurut saya, cast ini dilakukan sebelum
     * memasukkan data ke database.
     * 
     * @var array
     */
    protected $casts = [
        'no_ktp' => 'string',
        'no_telp' => 'string'
    ];
}
