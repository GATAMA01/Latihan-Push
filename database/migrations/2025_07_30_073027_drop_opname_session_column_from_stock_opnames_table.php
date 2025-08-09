<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->dropColumn('opname_session');
        });
    }

    public function down()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->string('opname_session')->nullable();
        });
    }
};
