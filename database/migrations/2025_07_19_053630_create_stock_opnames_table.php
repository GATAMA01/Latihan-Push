<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_opnames', function (Blueprint $table) {
            $table->id();

            $table->foreignId('opname_session_id')->constrained()->onDelete('cascade'); // ✅ Tambahkan ini
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            $table->string('name');
            $table->integer('stock_fisik');
            $table->integer('stock_sistem');
            $table->integer('selisih');
            $table->string('unit');
            $table->string('kategori')->nullable();
            $table->string('lokasi')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_opnames');
    }
};

