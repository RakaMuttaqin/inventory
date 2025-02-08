<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['peminjaman'] = Peminjaman::with(['peminjamanBarang.barang', 'user', 'siswa', 'pengembalian'])
            ->get();
        $data['barang'] = Barang::where('br_status', '0')->get();

        $data['siswa'] = Siswa::all();
        return view('peminjaman_barang.daftar_peminjaman.index')->with($data);
    }

    public function store(StorePeminjamanRequest $request)
    {
        $validated = $request->all();

        DB::beginTransaction();
        try {
            $pb_id = 'PJ' . date('Ym') . str_pad(Peminjaman::count() + 1, 4, '0', STR_PAD_LEFT);

            // Simpan data peminjaman
            $peminjaman = Peminjaman::create([
                'pb_id' => $pb_id,
                'user_id' => Auth::user()->user_id,
                'pb_tgl' => date('Y-m-d:H:i:s'),
                'siswa_id' => $validated['siswa'], // Pastikan ID ini benar
                'pb_harus_kembali_tgl' => $validated['pb_harus_kembali_tgl'],
                'pb_stat' => 1,
            ]);

            $counter = 1;
            // Simpan peminjaman barang
            foreach ($validated['data_pinjam'] as $br_kode) {
                $pbd_id = $pb_id . str_pad($counter++, 3, '0', STR_PAD_LEFT); // Hindari count() dalam loop

                $peminjamanBarang = PeminjamanBarang::create([
                    'pbd_id' => $pbd_id,
                    'pb_id' => $peminjaman->pb_id,
                    'br_kode' => $br_kode,
                    'pbd_tgl' => date('Y-m-d'),
                    'pbd_sts' => '1',
                ]);
            }

            DB::commit();

            return redirect()->route('peminjaman-barang.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error menyimpan peminjaman: ' . $th->getMessage());
            return redirect()->back()->withErrors(['messages' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }

    public function show(Peminjaman $peminjaman)
    {
        $data['peminjaman'] = $peminjaman;
        return view('peminjaman_barang.daftar_peminjaman.index')->with($data);
    }
}
