<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarang extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanBarangFactory> */
    use HasFactory;

    protected $table = 'peminjaman_barang';
    protected $primaryKey = 'pbd_id';
    protected $keyType = 'string';

    protected $fillable = ['pbd_id', 'pb_id', 'br_kode', 'pbd_tgl', 'pbd_sts'];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'pb_id', 'pb_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'br_kode', 'br_kode');
    }
}
