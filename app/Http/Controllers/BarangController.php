<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\JenisBarang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = Barang::with(['jenisBarang', 'user'])
            ->orderBy('br_tgl_entry', 'desc')
            ->paginate(5);

        $data['jenisBarang'] = JenisBarang::all();

        return view('barang_inventaris.daftar_barang.index')->with($data);
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
        $barangKode = 'INV' . date('Y') . str_pad(Barang::count() + 1, 5,   '0', STR_PAD_LEFT);
        // dd($barangKode);

        Barang::create([
            'br_kode' => $barangKode,
            'jns_brg_kode' => $validated['jns_brg_kode'],
            'user_id' => Auth::user()->user_id,
            'br_nama' => ucwords($validated['br_nama']),
            'br_tgl_terima' => $validated['br_tgl_terima'],
            'br_tgl_entry' => date('Y-m-d H:i:s'),
            'br_status' => $validated['br_status'],
        ]);

        return redirect()->back()->with('success', 'Barang inventaris berhasil ditambahkan');
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
    public function update(UpdateBarangRequest $request, $id)
    {
        $barang = Barang::find($id);

        $barang->update([
            'br_nama' => ucwords($request->br_nama),
            'jns_brg_kode' => $request->jns_brg_kode,
            'br_tgl_terima' => $request->br_tgl_terima,
            'br_status' => $request->br_status,
        ]);

        return redirect()->back()->with('success', 'Barang inventaris berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if ($barang->peminjamanBarang->isNotEmpty()) {
            return redirect()->back()->with('error', 'Barang tidak dapat dihapus karena terkait peminjaman');
        }

        $barang->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}
