<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama barang
            $table->integer('stock_sistem'); // stok tercatat
            $table->string('unit'); // satuan (pcs, box, dll)
            $table->string('kategori')->nullable(); // kategori
            $table->string('lokasi')->nullable(); // lokasi fisik
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

