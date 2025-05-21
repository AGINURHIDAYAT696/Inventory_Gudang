<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_user' => $this->id_user,
            'nama_user' => $this->nama_user,
            'username' => $this->username,
            'hak_akses' => $this->hak_akses,
        ];
    }
}
