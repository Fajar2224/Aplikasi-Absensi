<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $data_siswa=Siswa::all();
        return view('siswa.index',[
            'menu'=>'siswa',
            'data_siswa'=>$data_siswa
        ]);
    }

    public function create()
    {
        return view('siswa.create',[
            'menu'=>'siswa'
        ]);
    }
    public function store(Request $request)
    {
       $validasi=$request->validate([
        "nisn"=>"required",
        "nama"=>"required",
        "alamat"=>"required",
        "no_telp"=>"required",
        "jurusans_id"=>"required"
       ]);
       $data_baru=New Siswa();
       $data_baru->nisn=$validasi['nisn'];
       $data_baru->nama=$validasi['nama'];
       $data_baru->alamat=$validasi['alamat'];
       $data_baru->no_telp=$validasi['no_telp'];
       $data_baru->jurusans_id=$validasi['jurusans_id'];
       $data_baru->save();
       
       return redirect(route('siswa.index'));
    }

    public function edit($a_id)
    {
        $data_siswa=Siswa::find($a_id);
        return view('siswa.edit',[
            'menu'=>'siswa',
            'data_siswa'=>$data_siswa
        ]);
    }

    public function update()
    {
        $validasi=request()->validate([
            "id"=>"required",
            "nama_siswa"=>"required",
            "jurusans_id"=>"required",
            "gurus_id"=>"required"
        ]);
        $data_siswa=Siswa::find($validasi['id']);
        $data_siswa->nisn=$validasi['nisn'];
        $data_siswa->nama_siswa=$validasi['nama_siswa'];
        $data_siswa->alamat=$validasi['alamat'];
        $data_siswa->no_telp=$validasi['no_telp'];
        $data_siswa->jurusans_id=$validasi['jurusans_id'];
        $data_siswa->save();
        return redirect(route('siswa.index'));
    }
    public function destroy($a_id)
    {
        $data_siswa=Siswa::find($a_id);
        $data_siswa->delete();
        return redirect(route('siswa.index'));
    }

}
