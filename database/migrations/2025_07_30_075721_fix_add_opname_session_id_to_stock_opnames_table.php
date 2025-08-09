<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            if (!Schema::hasColumn('stock_opnames', 'opname_session_id')) {
                $table->unsignedBigInteger('opname_session_id')->nullable()->after('keterangan');

                // Kalau foreign key bikin error di SQLite, bisa dilepas atau pakai try-catch
                // $table->foreign('opname_session_id')->references('id')->on('opname_sessions')->nullOnDelete();
            }
        });
    }

    public function down()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            if (Schema::hasColumn('stock_opnames', 'opname_session_id')) {
                $table->dropColumn('opname_session_id');
            }
        });
    }
};
