<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokal extends Model
{
    //
    protected $fillable = ['nama_kelas', 'jurusans_id','gurus_id'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
