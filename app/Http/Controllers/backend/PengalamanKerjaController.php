<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        $data = PengalamanKerja::all();
        return view('backend.pengalaman_kerja.index', compact('data'));
    }

    public function create()
    {
        return view('backend.pengalaman_kerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        PengalamanKerja::create($request->all());

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data berhasil ditambahkan');
    }
    public function destroy($id)
    {
        $data = PengalamanKerja::findOrFail($id);
        $data->delete();

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data berhasil dihapus');
    }
    public function edit($id)
{
    $data = PengalamanKerja::findOrFail($id);
    return view('backend.pengalaman_kerja.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'tahun_masuk' => 'required',
        'tahun_keluar' => 'required',
    ]);

    $data = PengalamanKerja::findOrFail($id);
    $data->update($request->all());

    return redirect()->route('pengalaman_kerja.index')
        ->with('success', 'Data berhasil diupdate');
}
}