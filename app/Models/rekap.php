<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    protected $table = 'rekaps'; // pastikan nama tabel sesuai di database

    protected $fillable = [
        'siswas_id',
        'tanggal',
        'status',
        'keterangan',
        // tambahkan kolom lain jika ada di tabel rekaps
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswas_id');
    }
}
