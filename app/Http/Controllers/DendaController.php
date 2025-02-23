<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public static function store(
        string $penyewa,
        bool $keterlambatan,
        bool $kerusakan,
        string $mobil,
        string $denda
    )
    {
        Denda::insert([
            'penyewa' => $penyewa,
            'keterlambatan' => $keterlambatan,
            'kerusakan' => $kerusakan,
            'mobil' => $mobil,
            'total_denda' => $denda
        ]);

        if ($kerusakan)
        {
            MobilController::updateColumn($mobil, 'sedang_perbaikan', true);
        }
    }
}
