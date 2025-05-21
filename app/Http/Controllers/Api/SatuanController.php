<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use App\Http\Resources\SatuanResource;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        return SatuanResource::collection(Satuan::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_satuan' => 'required|string|max:30',
        ]);

        $satuan = Satuan::create($data);
        return new SatuanResource($satuan);
    }

    public function show($id)
    {
        return new SatuanResource(Satuan::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);
        $data = $request->validate([
            'nama_satuan' => 'required|string|max:30',
        ]);

        $satuan->update($data);
        return new SatuanResource($satuan);
    }

    public function destroy($id)
    {
        Satuan::destroy($id);
        return response()->json(['message' => 'Satuan berhasil dihapus']);
    }
}
