<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_user')->insert([
            [
                'id_user' => 1,
                'nama_user' => 'Admin',
                'username' => 'administrator',
                'password' => '$2y$12$Yi/I5f1jPoQNQnh6lWoVfuz.RtZ3OHcKN6PU.I62P0fYK1tJ7xMRi',
                'hak_akses' => 'Administrator'
            ],
            [
                'id_user' => 2,
                'nama_user' => 'Admin Gudang',
                'username' => 'admin gudang',
                'password' => '$2y$12$BeRYh13zfPXej97VgcfeNucYJGTElha5sRyIUQm1278D2u2Aqf6DS',
                'hak_akses' => 'Admin Gudang'
            ],
            [
                'id_user' => 3,
                'nama_user' => 'Kepala Gudang',
                'username' => 'kepala gudang',
                'password' => '$2y$12$odXcPs.RLJJH6Ghv3s42c.5zg5qAOz/S3Adr0lXGNcVSJ6f1hHS6G',
                'hak_akses' => 'Kepala Gudang'
            ],
        ]);
    }
}
