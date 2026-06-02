<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    public function index()
    {
        // Menggunakan variabel $pendidikans agar sinkron dengan View
        $pendidikans = Pendidikan::all();
        return view('backend.pendidikan.index', compact('pendidikans'));
    }

    public function create()
    {
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tingkatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        Pendidikan::create([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'foto' => null
        ]);

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tingkatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update([
        'nama' => $request->nama,
        'tingkatan' => $request->tingkatan,
        'tahun_masuk' => $request->tahun_masuk,
        'tahun_keluar' => $request->tahun_keluar,
    ]);


        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil dihapus.');
    }
}