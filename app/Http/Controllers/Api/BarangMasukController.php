<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Http\Resources\BarangMasukResource;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        return BarangMasukResource::collection(BarangMasuk::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_transaksi' => 'required|string|max:10|unique:tbl_barang_masuk,id_transaksi',
            'tanggal' => 'required|date',
            'barang' => 'required|string|exists:tbl_barang,id_barang',
            'jumlah' => 'required|integer'
        ]);

        $masuk = BarangMasuk::create($data);
        return new BarangMasukResource($masuk);
    }

    public function show($id)
    {
        return new BarangMasukResource(BarangMasuk::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $masuk = BarangMasuk::findOrFail($id);

        $data = $request->validate([
            'tanggal' => 'required|date',
            'barang' => 'required|string|exists:tbl_barang,id_barang',
            'jumlah' => 'required|integer'
        ]);

        $masuk->update($data);
        return new BarangMasukResource($masuk);
    }

    public function destroy($id)
    {
        BarangMasuk::destroy($id);
        return response()->json(['message' => 'Barang masuk dihapus']);
    }
}
