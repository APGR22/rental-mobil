<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Contracts\Auth\Authenticatable;

class AkunController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $credentials
     * @return Akun
     */
    public static function store(array $credentials)
    {
        return Akun::create([
            'no_ktp' => $credentials['no_ktp'],
            'nama' => $credentials['nama'],
            'tanggal_lahir' => $credentials['tanggal_lahir'],
            'email' => $credentials['email'],
            'no_telp' => $credentials['no_telp'],
            'username' => $credentials['username'],
            'password' => Hash::make($credentials['password']), //https://stackoverflow.com/questions/18006597/laravel-authattempt-always-false
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Display the resources.
     *
     * @return mixed
     */
    public function show()
    {
        $akun_all = Akun::all();
        $akun_l = DB::table('akuns')->get();
        return view('/', compact('akun_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param string $column
     * @param mixed $value
     */
    public static function updateData(int $id, string $column, mixed $value)
    {
        Akun::find($id)->update([
            $column => $value
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable
     * @return \Illuminate\Http\Response
     */
    public static function updateWithUser(Authenticatable $user)
    {
        Akun::find($user->id)->update([
            'no_ktp' => $user->no_ktp,
            'nama' => $user->nama,
            'tanggal_lahir' => $user->tanggal_lahir,
            'email' => $user->email,
            'no_telp' => $user->no_telp,
            'username' => $user->username,
            'password' => $user->password,

            'first_time' => $user->first_time,
        ]);
    }
}
