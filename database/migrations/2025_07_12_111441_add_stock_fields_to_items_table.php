<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Schema::table('items', function (Blueprint $table) {
    //     // $table->integer('stock_sistem')->default(0);
    //     $table->string('kategori')->nullable();
    //     $table->string('lokasi')->nullable();
    
    // });
}

public function down()
{
    // Schema::table('items', function (Blueprint $table) {
    //     $table->dropColumn(['stock_sistem', 'kategori', 'lokasi']);
    // });
}

};
