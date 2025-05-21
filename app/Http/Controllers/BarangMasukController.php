<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data = BarangMasuk::with('barang')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|string|max:10|unique:tbl_barang_masuk,id_transaksi',
            'tanggal' => 'required|date',
            'barang' => 'required|exists:tbl_barang,id_barang',
            'jumlah' => 'required|integer|min:1'
        ]);

        $masuk = BarangMasuk::create($request->all());

        return response()->json([
            'message' => 'Transaksi masuk berhasil ditambahkan',
            'data' => $masuk
        ], 201);
    }

    public function show($id)
    {
        $masuk = BarangMasuk::with('barang')->find($id);
        if (!$masuk) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($masuk);
    }

    public function destroy($id)
    {
        $masuk = BarangMasuk::find($id);
        if (!$masuk) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $masuk->delete();
        return response()->json(['message' => 'Transaksi masuk berhasil dihapus']);
    }
}
