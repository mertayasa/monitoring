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
        Schema::create('nilai_prilaku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_durasi_nilai');
            $table->integer('orientasi_pelayanan')->nullable();
            $table->integer('integritas')->nullable();
            $table->integer('komitmen')->nullable();
            $table->integer('disiplin')->nullable();
            $table->integer('kerjasama')->nullable();
            $table->timestamps();

            $table->foreign('id_durasi_nilai')->references('id')->on('durasi_penilaian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_prilaku');
    }
}
