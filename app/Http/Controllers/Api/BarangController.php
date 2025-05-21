<?php

namespace App\Http\Controllers\Api;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarangResource;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangResource::collection(Barang::with(['jenis', 'satuan'])->get());
    }

    public function show($id)
    {
        return new BarangResource(Barang::with(['jenis', 'satuan'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_barang' => 'required|string|unique:tbl_barang,id_barang',
            'nama_barang' => 'required|string|max:100',
            'jenis' => 'required|integer|exists:tbl_jenis,id_jenis',
            'stok_minimum' => 'required|integer',
            'stok' => 'required|integer',
            'satuan' => 'required|integer|exists:tbl_satuan,id_satuan',
            'foto' => 'nullable|string',
        ]);

        $barang = Barang::create($data);

        return new BarangResource($barang);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $data = $request->validate([
            'nama_barang' => 'sometimes|required|string|max:100',
            'jenis' => 'sometimes|required|integer|exists:tbl_jenis,id_jenis',
            'stok_minimum' => 'sometimes|required|integer',
            'stok' => 'sometimes|required|integer',
            'satuan' => 'sometimes|required|integer|exists:tbl_satuan,id_satuan',
            'foto' => 'nullable|string',
        ]);

        $barang->update($data);

        return new BarangResource($barang);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json(['message' => 'Barang berhasil dihapus.']);
    }
}
