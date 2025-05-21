<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Http\Resources\BarangKeluarResource;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        return BarangKeluarResource::collection(BarangKeluar::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_transaksi' => 'required|string|max:10|unique:tbl_barang_keluar,id_transaksi',
            'tanggal' => 'required|date',
            'barang' => 'required|string|exists:tbl_barang,id_barang',
            'jumlah' => 'required|integer'
        ]);

        $keluar = BarangKeluar::create($data);
        return new BarangKeluarResource($keluar);
    }

    public function show($id)
    {
        return new BarangKeluarResource(BarangKeluar::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $keluar = BarangKeluar::findOrFail($id);

        $data = $request->validate([
            'tanggal' => 'required|date',
            'barang' => 'required|string|exists:tbl_barang,id_barang',
            'jumlah' => 'required|integer'
        ]);

        $keluar->update($data);
        return new BarangKeluarResource($keluar);
    }

    public function destroy($id)
    {
        BarangKeluar::destroy($id);
        return response()->json(['message' => 'Barang keluar dihapus']);
    }
}
