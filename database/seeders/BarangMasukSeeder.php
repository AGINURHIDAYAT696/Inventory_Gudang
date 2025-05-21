<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangMasukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_barang_masuk')->insert([
            [
                'id_transaksi' => 'TM-0000001',
                'tanggal' => '2025-01-02',
                'barang' => 'B0001',
                'jumlah' => 100,
            ]
        ]);
    }
}
