<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SesiAkun extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]
        );

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->with('loginError', 'Username or Password is not correctly or not registered yet');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate(
            [
                'no_ktp' => 'required|numeric|min:0',
                'nama' => 'required',
                'tanggal_lahir' => 'required',
                'email' => 'required',
                'no_telp' => 'required|numeric|min:0|digits_between:10,11',
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'no_ktp.required' => 'No. KTP wajib diisi',
                'no_ktp.min' => 'No. KTP tidak boleh negatif',
                'nama.required' => 'Nama wajib diisi',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
                'email.required' => 'Email wajib diisi',
                'no_telp.required' => 'No. Telp wajib diisi',
                'no_telp.min' => 'No. Telp tidak boleh negatif',
                'no_telp.digits_between' => 'No. Telp berisi 10-11 angka',
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]
        );

        $akun = AkunController::store($credentials);

        Auth::login($akun);

        // if (Auth::attempt([
        //     'username' => $credentials['username'],
        //     'password' => $credentials['password'],
        // ]))
        // {
        //     return redirect()->intended('index');
        // }

        // dd($credentials, $akun);

        return redirect()->intended();
    }
}
