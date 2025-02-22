<?php

namespace App\Http\Controllers;

use App\Models\Terima;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use URL;

class TerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tanggal_dikembalikan' => 'required'
            ],
            [
                'tanggal_dikembalikan.required' => '\'Tanggal dikembalikan\' harus diisi untuk dikonfirmasi'
            ]
        );

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terima  $terima
     * @return \Illuminate\Http\Response
     */
    public function show(Terima $terima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terima  $terima
     * @return \Illuminate\Http\Response
     */
    public function edit(Terima $terima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terima  $terima
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terima $terima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terima  $terima
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terima $terima)
    {
        //
    }
}
