<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_barang' => $this->id_barang,
            'nama_barang' => $this->nama_barang,
            'jenis' => $this->jenis, // kamu bisa return relasi jika pakai with
            'stok_minimum' => $this->stok_minimum,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'foto' => $this->foto,
        ];
    }
}
