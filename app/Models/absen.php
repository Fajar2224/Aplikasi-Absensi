<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $fillable = [
        'jam',
        'tanggal',
        'status',
        'keterangan',
        'gurus_id',
        'siswas_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'gurus_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswas_id');
    }
}