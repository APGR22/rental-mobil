<?php

namespace App\Http\Controllers;

use App\Models\Terima;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TerimaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobil = request()->input('mobil');
        $sewa = SewaController::getWithColumn('mobil', $mobil);

        return view('main.terima.terima', compact('sewa'));
    }

    public function review(Request $request)
    {
        $request->validate(
            [
                'tanggal_dikembalikan' => 'required',
                'ada_kerusakan' => 'required',
            ],
            [
                'tanggal_dikembalikan.required' => '\'Tanggal dikembalikan\' harus diisi untuk dikonfirmasi',
                'ada_kerusakan.required' => '\'Ada Kerusakan?\' harus diisi untuk kalkulasi denda',
            ]
        );

        $sewa = SewaController::getWithColumn('mobil', $request->mobil);

        $tanggal_dikembalikan = Carbon::createFromFormat('Y-m-d', $request->tanggal_dikembalikan);
        $terlambat = $tanggal_dikembalikan->diffInDays($sewa->tanggal_kembali, false) < 0 ? true : $tanggal_dikembalikan->day > $sewa->tanggal_kembali->day;

        $denda = 0;
        if ($terlambat)
        {
            $denda += 100_000;
        }
        if ($request->ada_kerusakan === 'Ya')
        {
            $denda += 1_000_000;
        }

        $data = $request->all();
        $data['mobil'] = $sewa->mobil;
        $data['penyewa'] = $sewa->penyewa;
        $data['keterlambatan'] = $terlambat ? 'Ya' : 'Tidak';
        $data['denda'] = $denda;
        $date['tanggal_dikembalikan'] = $request->tanggal_dikembalikan;

        return view('main.terima.review', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $sewa = SewaController::getWithColumn('mobil', $request->mobil);

        if ($sewa->supir !== null)
        {
            SupirController::updateColumn($sewa->supir, 'sedang_bekerja', false);
        }

        if ($request->denda !== '0')
        {
            DendaController::store(
                $sewa->penyewa,
                $request->keterlambatan === 'Ya',
                $request->ada_kerusakan === 'Ya',
                $sewa->mobil,
                $request->denda
            );
        }

        $tanggal_dikembalikan = Carbon::createFromFormat('Y-m-d', $request->tanggal_dikembalikan);

        Terima::insert([
            'penyewa' => $sewa->penyewa,
            'mobil' => $sewa->mobil,
            'supir' => $sewa->supir,
            'tanggal_sewa' => $sewa->tanggal_sewa,
            'tanggal_kembali' => $tanggal_dikembalikan,
            'diskon' => $sewa->diskon,
            'total' => $sewa->total,
        ]);

        SewaController::destroy($sewa);
        MobilController::updateColumn($request->mobil, 'sedang_disewa', false);

        return redirect()->route('index');
    }
}
