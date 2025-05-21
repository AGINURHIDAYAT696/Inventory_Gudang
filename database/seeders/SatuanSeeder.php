<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_satuan')->insert([
            [
                'id_satuan' => 1,
                'nama_satuan' => 'Pcs',
            ]
        ]);
    }
}
