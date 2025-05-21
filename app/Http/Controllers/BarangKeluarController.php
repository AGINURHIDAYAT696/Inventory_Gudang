<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data = BarangKeluar::with('barang')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|string|max:10|unique:tbl_barang_keluar,id_transaksi',
            'tanggal' => 'required|date',
            'barang' => 'required|exists:tbl_barang,id_barang',
            'jumlah' => 'required|integer|min:1'
        ]);

        $keluar = BarangKeluar::create($request->all());

        return response()->json([
            'message' => 'Transaksi keluar berhasil ditambahkan',
            'data' => $keluar
        ], 201);
    }

    public function show($id)
    {
        $keluar = BarangKeluar::with('barang')->find($id);
        if (!$keluar) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($keluar);
    }

    public function destroy($id)
    {
        $keluar = BarangKeluar::find($id);
        if (!$keluar) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $keluar->delete();
        return response()->json(['message' => 'Transaksi keluar berhasil dihapus']);
    }
}
