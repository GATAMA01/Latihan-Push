<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->foreignId('opname_session_id')
                  ->nullable()
                  ->constrained('opname_sessions')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->dropForeign(['opname_session_id']);
            $table->dropColumn('opname_session_id');
        });
    }
};
