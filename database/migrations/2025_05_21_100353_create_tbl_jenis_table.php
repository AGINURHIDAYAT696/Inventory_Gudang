<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_jenis', function (Blueprint $table) {
            $table->id('id_jenis');
            $table->string('nama_jenis', 50);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_jenis');
    }
};
