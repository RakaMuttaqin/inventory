<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'pb_id';
    protected $keyType = 'string';

    protected $fillable = [
        'pb_id',
        'user_id',
        'pb_tgl',
        'siswa_id',
        'pb_harus_kembali_tgl',
        'pb_stat',
    ];

    public function peminjamanBarang()
    {
        return $this->hasMany(PeminjamanBarang::class, 'pb_id', 'pb_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'pb_id', 'pb_id');
    }
}
