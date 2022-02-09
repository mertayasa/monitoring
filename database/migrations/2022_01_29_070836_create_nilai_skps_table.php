<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_skp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pgw_kontrak');
            $table->unsignedBigInteger('id_penilai');
            $table->date('tgl_mulai_penilaian');
            $table->date('tgl_selesai_penilaian')->nullable();
            $table->integer('nilai')->default(0);
            $table->text('permasalahan')->nullable();
            $table->text('keberatan')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->text('penjelasan_penilai')->nullable();
            $table->text('keputusan_atasan')->nullable();
            $table->timestamps();

            $table->foreign('id_pgw_kontrak')->references('id')->on('users');
            $table->foreign('id_penilai')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_skp');
    }
}
