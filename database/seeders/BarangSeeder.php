<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_barang')->insert([
            [
                'id_barang' => 'B0001',
                'nama_barang' => 'Buku PPKN',
                'jenis' => 1,
                'stok_minimum' => 10,
                'stok' => 70,
                'satuan' => 1,
                'foto' => 'a124239267cf9fa400af5063cc03dff402982489.jpg',
            ]
        ]);
    }
}
