<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangKeluarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_barang_keluar')->insert([
            [
                'id_transaksi' => 'TK-0000001',
                'tanggal' => '2025-01-02',
                'barang' => 'B0001',
                'jumlah' => 30,
            ]
        ]);
    }
}
