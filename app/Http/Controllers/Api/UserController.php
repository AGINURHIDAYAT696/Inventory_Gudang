<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_user' => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:tbl_user,username',
            'password' => 'required|string|min:6',
            'hak_akses' => 'required|in:Administrator,Admin Gudang,Kepala Gudang'
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        return new UserResource($user);
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'nama_user' => 'sometimes|required|string|max:30',
            'username' => 'sometimes|required|string|max:30|unique:tbl_user,username,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:6',
            'hak_akses' => 'required|in:Administrator,Admin Gudang,Kepala Gudang'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return new UserResource($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus']);
    }
}
