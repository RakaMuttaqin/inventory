<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'br_kode';
    protected $keyType = 'string';

    protected $fillable = [
        'br_kode',
        'jns_brg_kode',
        'user_id',
        'br_nama',
        'br_tgl_terima',
        'br_tgl_entry',
        'br_status',
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jns_brg_kode', 'jns_brg_kode');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function peminjaman_barang()
    {
        return $this->hasMany(PeminjamanBarang::class, 'br_kode', 'br_kode');
    }
}
