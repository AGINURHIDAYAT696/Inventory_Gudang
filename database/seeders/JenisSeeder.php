<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_jenis')->insert([
            [
                'id_jenis' => 1,
                'nama_jenis' => 'Buku',
            ]
        ]);
    }
}
