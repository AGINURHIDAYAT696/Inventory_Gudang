<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_user', 30);
            $table->string('username', 30);
            $table->string('password');
            $table->enum('hak_akses', ['Administrator', 'Admin Gudang', 'Kepala Gudang']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
