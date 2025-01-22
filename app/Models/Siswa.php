<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    protected $keyType = 'string';
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'siswa_id', 'nis');
    }
}
