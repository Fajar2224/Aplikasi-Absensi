<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
    'NIP', 
    'nama', 
    'alamat', 
    'no_telp', 
    'mapels_id', 
    'users_id'
];

    // Relasi ke model Lokal
    public function lokals()
    {
        return $this->hasMany(Lokal::class, 'gurus_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function mengajar()
    {
        return $this->hasMany(Mengajar::class, 'gurus_id');
    }

    public function mapel()
    {
        return $this->belongsTo(\App\Models\mapel::class, 'mapels_id');
    }
}