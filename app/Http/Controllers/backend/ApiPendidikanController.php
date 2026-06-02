<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class ApiPendidikanController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json(Pendidikan::all(), 200);
    }

    // GET BY ID
    public function show($id)
    {
        $data = Pendidikan::find($id);

        if (!$data) {
            return response()->json([
                'status' => 0,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json($data, 200);
    }

    // INSERT
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required',
            'tingkatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        $data = Pendidikan::create($validated);

        return response()->json([
            'status' => 1,
            'message' => 'Pendidikan berhasil ditambahkan!',
            'data' => $data
        ], 201);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = Pendidikan::find($id);

        if (!$data) {
            return response()->json([
                'status' => 0,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama_sekolah' => 'required',
            'tingkatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        $data->update($validated);

        return response()->json([
            'status' => 1,
            'message' => 'Pendidikan berhasil diupdate!'
        ], 200);
    }

    // DELETE
    public function destroy($id)
    {
        $data = Pendidikan::find($id);

        if (!$data) {
            return response()->json([
                'status' => 0,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Pendidikan berhasil dihapus!'
        ], 200);
    }
}