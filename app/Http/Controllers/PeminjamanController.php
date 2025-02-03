<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Barang;
use App\Models\PeminjamanBarang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
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
    public function store(StorePeminjamanRequest $request)
    {
        $validated = $request->validated();
        $pb_id = 'PJ' . date('YM') . str_pad(Peminjaman::count() + 1, 4, '0', STR_PAD_LEFT);
        $pbd_id = $pb_id . str_pad(PeminjamanBarang::count() + 1, 4, '0', STR_PAD_LEFT);

        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::create([
                'pb_id' => $pb_id,
                'user_id' => Auth::user()->user_id,
                'pb_tgl' => $validated['pb_tgl'],
                'pb_harus_kembali_tgl' => $validated['pb_harus_kembali_tgl'],
            ]);

            $arrayBarang = $validated['dipinjam'];

            foreach ($arrayBarang as $value) {
                $barang = Barang::find($value['br_kode']);
                if (!$barang) {
                    DB::rollBack();
                }

                $peminjaman_barang = PeminjamanBarang::create([
                    'pbd_id' => $pbd_id,
                    'pb_id' => $peminjaman->pb_id,
                    'br_kode' => $value['br_kode'],
                    'pbd_tgl' => $value['pdb_tgl'],
                ]);
            }

            DB::commit(); // Jangan lupa commit!
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
