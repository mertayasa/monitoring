<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTambahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_tambahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_durasi_nilai');
            $table->string('nama_tugas', 100);
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('id_durasi_nilai')->references('id')->on('durasi_penilaian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_tambahan');
    }
}
