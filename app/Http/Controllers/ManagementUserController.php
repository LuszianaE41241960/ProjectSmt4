<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index() {
        // Pilihan: tampil string atau view
        // return "Method ini nantinya akan digunakan untuk mengambil semua data user";

        // Versi view
        $nama = "Lusziana Azzahra Putri";
        $pelajaran = ["Algoritma & Pemograman", "Kalkulus", "Pemograman Web"];
        return view('home', compact('nama', 'pelajaran'));
    }

    public function create() {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk menambah data user";
    }

    public function store(Request $request) {
        return "Method ini nantinya akan digunakan untuk menciptakan data user yang baru";
    }

    public function show($id) {
        return "Method ini nantinya akan digunakan untuk mengambil satu data user dengan id=" . $id;
    }

    public function update(Request $request, $id) {
        return "Method ini nantinya akan digunakan untuk mengubah data user dengan id=" . $id;
    }

    public function destroy($id) {
        return "Method ini nantinya digunakan untuk menghapus data user dengan id=" . $id;
    }
}
