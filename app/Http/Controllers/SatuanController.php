<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        return response()->json(Satuan::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required|string|max:30|unique:tbl_satuan,nama_satuan',
        ]);

        $satuan = Satuan::create([
            'nama_satuan' => $request->nama_satuan
        ]);

        return response()->json([
            'message' => 'Satuan berhasil ditambahkan',
            'data' => $satuan
        ], 201);
    }

    public function show($id)
    {
        $satuan = Satuan::find($id);
        if (!$satuan) {
            return response()->json(['message' => 'Satuan tidak ditemukan'], 404);
        }

        return response()->json($satuan);
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::find($id);
        if (!$satuan) {
            return response()->json(['message' => 'Satuan tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_satuan' => 'required|string|max:30|unique:tbl_satuan,nama_satuan,' . $id . ',id_satuan',
        ]);

        $satuan->update(['nama_satuan' => $request->nama_satuan]);

        return response()->json(['message' => 'Satuan berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        if (!$satuan) {
            return response()->json(['message' => 'Satuan tidak ditemukan'], 404);
        }

        $satuan->delete();
        return response()->json(['message' => 'Satuan berhasil dihapus']);
    }
}
