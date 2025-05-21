<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_barang_masuk', function (Blueprint $table) {
            $table->string('id_transaksi', 10)->primary();
            $table->date('tanggal');
            $table->string('barang', 5);
            $table->integer('jumlah')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_barang_masuk');
    }
};
