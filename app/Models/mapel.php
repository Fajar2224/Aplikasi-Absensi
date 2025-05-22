<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $table = 'mapels';

    protected $fillable = [
        'nama_mapel',
        'jadwal_mapel',
        // tambahkan kolom lain jika ada
    ];

    // Relasi ke Guru (jika satu mapel bisa punya banyak guru)
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'mapels_id');
    }
}
