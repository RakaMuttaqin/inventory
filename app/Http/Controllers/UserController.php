<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('referensi.daftarPengguna.index')->with($data);
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_nama' => 'required|string',
            'user_pass' => 'required',
            'user_hak' => 'required|string',
            'user_sts' => 'required|string',
        ]);

        $user = User::create([
            'user_id' => substr(str_replace(['/', '+', '='], '', base64_encode(Str::uuid()->getBytes())), 0, 10),
            'user_nama' => strtolower(str_replace(' ', '', $validated['user_nama'])),
            'user_pass' => Hash::make($validated['user_pass']),
            'user_hak' => str_replace(' ', '', ucwords(str_replace('_', '', $validated['user_hak']))),
            'user_sts' => $validated['user_sts']
        ]);

        return redirect()->route('daftar-pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_nama' => 'required|string|regex:/^[a-z]+$/',
            'user_pass' => 'required',
            'user_hak' => 'required|string',
            'user_sts' => 'required|string',
        ]);

        $user = User::find($id, 'user_id');
        if ($user) {
            $user->update([
                'user_nama' => strtolower($validated['user_nama']),
                'user_hak' => ucwords($validated['user_hak']),
                'user_sts' => $validated['user_sts']
            ]);
            return redirect()->route('daftar-pengguna.index')->with('success', 'Pengguna berhasil diperbarui');
        }
        return redirect()->route('daftar-pengguna.index')->with('error', 'Pengguna tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id, 'user_id');
        if ($user) {
            $user->delete();
            return redirect()->route('daftar-pengguna.index')->with('success', 'Pengguna berhasil dihapus');
        }
        return redirect()->route('daftar-pengguna.index')->with('error', 'Pengguna tidak ditemukan');
    }
}
