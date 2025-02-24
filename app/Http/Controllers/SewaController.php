<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\Mobil;
use App\Models\Supir;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sewas = Sewa::all();
        return view('main.sewa.daftar', compact('sewas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobils = Mobil::all();
        $supirs = Supir::all();
        return view('main.sewa.sewa', compact('mobils', 'supirs'));
    }

    public function review(Request $request)
    {
        $request->validate(
            [
                'tanggal_sewa' => 'required',
                'tanggal_kembali' => 'required',
                'mobil' => 'required',
            ],
            [
                'tanggal_sewa.required' => 'Tanggal sewa harus diisi',
                'tanggal_kembali.required' => 'Tanggal kembali harus diisi',
                'mobil.required' => 'Mobil harus dipilih',
            ]
        );

        $error = null;

        $mobil = MobilController::getWithTipe($request->mobil);
        if ($mobil === null || ($mobil->sedang_disewa || $mobil->sedang_perbaikan))
        {
            $error['mobil'] = 'Mobil ini tidak ada dalam daftar';
        }

        if ($request->supir !== null)
        {
            $supir = SupirController::getWithNama($request->supir);
            if ($supir === null || $supir->sedang_bekerja)
            {
                $error['supir'] = 'Supir ini tidak ada dalam daftar';
            }
        }

        $tanggal_sewa = Carbon::createFromFormat('Y-m-d', $request->tanggal_sewa);
        $tanggal_kembali = Carbon::createFromFormat('Y-m-d', $request->tanggal_kembali);

        $valid_penyewaan = $tanggal_sewa->diffInDays($tanggal_kembali, false) > 0 ? true : $tanggal_sewa->day <= $tanggal_kembali->day;
        if (!$valid_penyewaan)
        {
            $error['tanggal_sewa'] = 'Tanggal sewa harus kurang dari/sama dengan tanggal kembali';
            $error['tanggal_kembali'] = 'Tanggal kembali harus lebih dari/sama dengan tanggal sewa';
        }

        if ($error !== null)
        {
            return back()->withErrors($error)->withInput();
        }

        $data = $request->all();
        return view('main.sewa.review', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobil = MobilController::getWithTipe($request->mobil);

        $harga = $mobil->harga;
        $dp = 10; //nilai statis sementara

        $total = $harga + ($harga * $dp / 100);

        $diskon = 0;
        if (Auth::user()->first_time)
        {
            $diskon = 50;
            $total = $total * $diskon / 100;
            Auth::user()->first_time = 0;
            AkunController::updateColumn(Auth::user()->id, 'first_time', Auth::user()->first_time);
        }

        Sewa::insert([
            'penyewa' => Auth::user()->nama,
            'mobil' => $request->mobil,
            'supir' => $request->supir,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'dp' => $dp, 
            'diskon' => $diskon,
            'total' => $total
        ]);

        MobilController::updateColumn($request->mobil, 'sedang_disewa', true);
        if ($request->supir !== null)
        {
            SupirController::updateColumn($request->supir, 'sedang_bekerja', true);
        }

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sewa  $sewa
     */
    public static function destroy(Sewa $sewa)
    {
        $sewa->delete();
    }

    public static function destroyWithColumn(string $column, mixed $value)
    {
        Sewa::where($column, '=', $value)->first()->delete();
    }

    public static function getWithColumn(string $column, mixed $value)
    {
        return Sewa::where($column, '=', $value)->first();
    }
}
