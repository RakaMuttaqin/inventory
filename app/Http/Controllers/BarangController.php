<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $validated = $request->validated();
        $barangKode = 'INV' . date('Ymd') . str_pad(Barang::count() + 1, 4,   '0', STR_PAD_LEFT);

        Barang::create([
            'br_kode' => $barangKode,
            'jns_brg_kode' => $validated['jns_brg_kode'],
            'user_id' => null,
            'br_nama' => $validated['br_nama'],
            'br_tgl_terima' => $validated['br_tgl_terima'],
            'br_status' => $validated['br_status'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
