<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('tgl_mulai_kontrak')->nullable();
            $table->date('tgl_selesai_kontrak')->nullable();
            $table->string('no_kontrak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tgl_mulai_kontrak');
            $table->dropColumn('tgl_selesai_kontrak');
            $table->dropColumn('no_kontrak');
        });
    }
}
