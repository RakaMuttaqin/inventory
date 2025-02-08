<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Http\Requests\StoreJenisBarangRequest;
use App\Http\Requests\UpdateJenisBarangRequest;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenisBarang'] = JenisBarang::all();
        return view('referensi.jenisBarang.index')->with($data);
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
    public function store(StoreJenisBarangRequest $request)
    {
        $validated = $request->validated();

        $jns_brg_kode = str_pad(JenisBarang::count() + 1, 5, '0', STR_PAD_LEFT);
        JenisBarang::create([
            'jns_brg_kode' => $jns_brg_kode,
            'jns_brg_nama' => $validated['jns_brg_nama']
        ]);

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisBarangRequest $request, $id)
    {
        $validated = $request->validated();

        $jenisBarang = JenisBarang::find($id);

        $jenisBarang->update([
            'jns_brg_nama' => $validated['jns_brg_nama']
        ]);

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisBarang = JenisBarang::find($id);
        $jenisBarang->delete();

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil dihapus');
    }
}
