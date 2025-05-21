<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_satuan', function (Blueprint $table) {
            $table->id('id_satuan');
            $table->string('nama_satuan', 30);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_satuan');
    }
};
