<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jurusan', 'kode_jurusan'];

    // Relasi ke model Lokal
    public function lokals()
    {
        return $this->hasMany(Lokal::class, 'jurusans_id');
    }
}
