<?php

use App\Http\Controllers\SewaController;
use App\Http\Controllers\TerimaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiAkun;
use Illuminate\Http\Request;

use App\Models\Sewa;

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

Route::view('/sewa', 'main.sewa.sewa')->middleware('auth')->name('sewa');
Route::post('/sewa/review', function (Request $request) {
    $data = $request->all();
    return view('main.sewa.review', compact('data'));
})->middleware('auth')->name('sewa.review');
Route::post('/sewa/send', [SewaController::class, 'store'])->middleware('auth')->name('sewa.send');

Route::get('/terima', function() {
    $sewas = Sewa::all();
    return view('main.terima.terima', compact('sewas'));
})->middleware('admin')->name('terima');
Route::get('/terima/review', function() {
    $penyewa = request()->get('penyewa');
    $sewa = Sewa::where('penyewa', '=', $penyewa)->first();
    return view('main.terima.review', compact('sewa'));
})->middleware('admin')->name('terima.review');
Route::post('/terima/send', [TerimaController::class, 'store'])->middleware('admin')->name('terima.send');

Route::post('/login/send', [SesiAkun::class, 'login'])->name('login.send');
Route::post('/register/send', [SesiAkun::class, 'register'])->name('register.send');
Route::get('/logout', [SesiAkun::class, 'logout'])->middleware('auth')->name('logout');