<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Tampilkan semua barang
    public function index()
    {
        $data = Barang::with(['jenis', 'satuan'])->get();
        return response()->json($data);
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|string|max:5|unique:tbl_barang,id_barang',
            'nama_barang' => 'required|string|max:100',
            'jenis' => 'required|exists:tbl_jenis,id_jenis',
            'stok_minimum' => 'required|integer',
            'stok' => 'nullable|integer',
            'satuan' => 'required|exists:tbl_satuan,id_satuan',
            'foto' => 'nullable|string|max:100'
        ]);

        $barang = Barang::create($request->all());

        return response()->json([
            'message' => 'Barang berhasil disimpan',
            'data' => $barang
        ], 201);
    }

    // Tampilkan detail 1 barang
    public function show($id)
    {
        $barang = Barang::with(['jenis', 'satuan'])->find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        return response()->json($barang);
    }

    // Update barang
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jenis' => 'required|exists:tbl_jenis,id_jenis',
            'stok_minimum' => 'required|integer',
            'stok' => 'nullable|integer',
            'satuan' => 'required|exists:tbl_satuan,id_satuan',
            'foto' => 'nullable|string|max:100'
        ]);

        $barang->update($request->all());

        return response()->json(['message' => 'Barang berhasil diperbarui']);
    }

    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $barang->delete();

        return response()->json(['message' => 'Barang berhasil dihapus']);
    }
}
