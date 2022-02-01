<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPrilakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_prilakus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_durasi_nilai');
            $table->integer('orientasi_pelayanan');
            $table->integer('integritas');
            $table->integer('komitmen');
            $table->integer('disiplin');
            $table->integer('kerjasama');
            $table->timestamps();

            $table->foreign('id_durasi_nilai')->references('id')->on('durasi_penilaians')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_prilakus');
    }
}
