<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'NISN',
        'nama',
        'alamat',
        'no_telp',
        'jurusans_id',
        'lokals_id',
        'users_id'
    ];

    // Relasi ke model Lokal (kelas)
    public function lokal()
    {
        return $this->belongsTo(Lokal::class, 'lokals_id');
    }

    // Relasi ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusans_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}