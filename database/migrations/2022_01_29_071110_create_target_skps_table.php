<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetSkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_skps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_durasi_nilai');
            $table->string('kegiatan', 100);
            $table->integer('kuantitas');
            $table->string('output',100);
            $table->datetime('waktu');
            $table->integer('kualitas');    
            $table->integer('biaya');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->integer('nilai');
            $table->integer('total');

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
        Schema::dropIfExists('target_skps');
    }
}
