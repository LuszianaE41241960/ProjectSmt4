<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Cara 1: pakai parameter route (REKOMENDASI)
    public function index($nama)
    {
        return response()->json([
            'nama' => $nama
        ]);
    }

    // Cara 2: pakai segment URL
    public function indexSegment(Request $request)
    {
        return $request->segment(2);
    }
        public function formulir(){
    return view('formulir');
}

    public function proses(Request $request){
    $messages = [
        'required' => 'Input :attribute wajib diisi!',
        'min' => 'Input :attribute harus diisi minimal :min karakter!',
        'max' => 'Input :attribute harus diisi maksimal :max karakter!',
    ];

    $this->validate($request,[
        'nama' => 'required|min:5|max:20',
        'alamat' => 'required|alpha'
    ], $messages);

    $nama = $request->input('nama');
    $alamat = $request->input('alamat');

    return "Nama : ".$nama.", Alamat : ".$alamat;
}
}