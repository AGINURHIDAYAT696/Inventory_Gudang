<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->string('id_barang', 5)->primary();
            $table->string('nama_barang', 100);
            $table->integer('jenis');
            $table->integer('stok_minimum');
            $table->integer('stok')->default(0);
            $table->integer('satuan');
            $table->string('foto', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_barang');
    }
};
