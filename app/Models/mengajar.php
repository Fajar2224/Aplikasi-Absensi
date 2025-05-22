<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mengajar extends Model
{
    protected $table = 'mengajars'; // pastikan nama tabel benar

    protected $fillable = [
        'gurus_id',
        'mapels_id',
        // tambahkan kolom lain jika ada
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'gurus_id');
    }

    // Relasi ke Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapels_id');
    }
}
