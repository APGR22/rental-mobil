<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiAkun;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'main.main')->middleware('auth')->name('index');
Route::view('/test', 'main.test')->name('test');

Route::view('/login', 'main.session.login')->middleware('guest')->name('login');
Route::view('/register', 'main.session.register')->middleware('guest')->name('register');

Route::post('/login/send', [SesiAkun::class, 'login'])->name('login.send');
Route::post('/register/send', [SesiAkun::class, 'register'])->name('register.send');
Route::get('/logout', [SesiAkun::class, 'logout'])->middleware('auth')->name('logout');