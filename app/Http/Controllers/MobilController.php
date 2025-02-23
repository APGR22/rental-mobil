<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public static function updateColumn(string $tipe, string $column, mixed $value)
    {
        Mobil::where('tipe', '=', $tipe)->update([
            $column => $value
        ]);
    }

    public static function getWithTipe(string $tipe)
    {
        return Mobil::where('tipe', '=', $tipe)->first();
    }
}
