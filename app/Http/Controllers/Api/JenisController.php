<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Http\Resources\JenisResource;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        return JenisResource::collection(Jenis::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jenis' => 'required|string|max:50',
        ]);

        $jenis = Jenis::create($data);

        return new JenisResource($jenis);
    }

    public function show($id)
    {
        return new JenisResource(Jenis::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $jenis = Jenis::findOrFail($id);

        $data = $request->validate([
            'nama_jenis' => 'required|string|max:50',
        ]);

        $jenis->update($data);

        return new JenisResource($jenis);
    }

    public function destroy($id)
    {
        Jenis::destroy($id);
        return response()->json(['message' => 'Jenis berhasil dihapus']);
    }
}
