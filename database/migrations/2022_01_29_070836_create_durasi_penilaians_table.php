<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDurasiPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('durasi_penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pgw_kontrak');
            $table->unsignedBigInteger('id_penilai');
            $table->date('tgl_mulai_penilaian');
            $table->date('tgl_selesai_penilaian')->nullable();
            $table->text('permasalahan');
            $table->text('keberatan');
            $table->text('rekomendasi');
            $table->text('penjelasan_penilai');
            $table->text('keputusan_atasan');
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
        Schema::dropIfExists('durasi_penilaian');
    }
}
