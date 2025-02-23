<?php

use App\Http\Controllers\SewaController;
use App\Http\Controllers\TerimaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiAkun;
use Illuminate\Http\Request;
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



Route::get('/sewa', [SewaController::class, 'create'])->middleware('auth')->name('sewa');
Route::post('/sewa/review', [SewaController::class, 'review'])->middleware('auth')->name('sewa.review');
Route::post('/sewa/send', [SewaController::class, 'store'])->middleware('auth')->name('sewa.send');



Route::get('/daftar_sewa', [SewaController::class, 'index'])->middleware('admin')->name('sewa.list');



Route::get('/terima', [TerimaController::class, 'create'])->middleware('admin')->name('terima');
Route::post('/terima/review', [TerimaController::class, 'review'])->middleware('admin')->name('terima.review');
Route::post('/terima/send', [TerimaController::class, 'store'])->middleware('admin')->name('terima.send');



Route::post('/login/send', [SesiAkun::class, 'login'])->name('login.send');
Route::post('/register/send', [SesiAkun::class, 'register'])->name('register.send');
Route::get('/logout', [SesiAkun::class, 'logout'])->middleware('auth')->name('logout');