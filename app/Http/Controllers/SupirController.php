<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supir;

class SupirController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public static function updateColumn(string $nama, string $column, mixed $value)
    {
        Supir::where('nama', '=', $nama)->first()->update([
            $column => $value,
        ]);
    }

    public static function getWithNama(string $nama)
    {
        return Supir::where('nama', '=', $nama)->first();
    }
}
