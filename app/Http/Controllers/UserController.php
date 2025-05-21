<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:tbl_user,username',
            'password' => 'required|string|min:6',
            'hak_akses' => 'required|in:Administrator,Admin Gudang,Kepala Gudang',
        ]);

        $user = User::create([
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'hak_akses' => $request->hak_akses
        ]);

        return response()->json([
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ], 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_user' => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:tbl_user,username,' . $id . ',id_user',
            'hak_akses' => 'required|in:Administrator,Admin Gudang,Kepala Gudang',
        ]);

        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->hak_akses = $request->hak_akses;

        // Optional password update
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User berhasil dihapus']);
    }
}
