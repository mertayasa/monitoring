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
            $table->unsignedBigInteger('id_nilai_skp');
            $table->string('nama_tugas', 100)->nullable();
            $table->integer('nilai')->default(0);
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
        Schema::dropIfExists('tugas_tambahan');
    }
}
