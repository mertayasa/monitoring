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
            $table->unsignedBigInteger('id_nilai_skp');
            $table->integer('orientasi_pelayanan')->nullable();
            $table->integer('integritas')->nullable();
            $table->integer('komitmen')->nullable();
            $table->integer('disiplin')->nullable();
            $table->integer('kerjasama')->nullable();
            $table->timestamps();

            $table->foreign('id_nilai_skp')->references('id')->on('nilai_skp')->onDelete('cascade');
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
