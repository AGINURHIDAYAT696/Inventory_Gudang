<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        return response()->json(Jenis::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:50|unique:tbl_jenis,nama_jenis',
        ]);

        $jenis = Jenis::create([
            'nama_jenis' => $request->nama_jenis
        ]);

        return response()->json([
            'message' => 'Jenis berhasil ditambahkan',
            'data' => $jenis
        ], 201);
    }

    public function show($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis tidak ditemukan'], 404);
        }

        return response()->json($jenis);
    }

    public function update(Request $request, $id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_jenis' => 'required|string|max:50|unique:tbl_jenis,nama_jenis,' . $id . ',id_jenis',
        ]);

        $jenis->update(['nama_jenis' => $request->nama_jenis]);

        return response()->json(['message' => 'Jenis berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis tidak ditemukan'], 404);
        }

        $jenis->delete();
        return response()->json(['message' => 'Jenis berhasil dihapus']);
    }
}
