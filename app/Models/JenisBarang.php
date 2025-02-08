<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    /** @use HasFactory<\Database\Factories\JenisBarangFactory> */
    use HasFactory;

    protected $table = 'jenis_barang';
    protected $primaryKey = 'jns_brg_kode';
    protected $keyType = 'string';

    protected $fillable = [
        'jns_brg_kode',
        'jns_brg_nama',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'jns_brg_kode', 'jns_brg_kode');
    }
}
