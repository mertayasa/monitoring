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
        Schema::create('target_skp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_durasi_nilai');
            $table->string('kegiatan', 100);
            $table->integer('kuantitas');
            $table->string('output',100);
            $table->datetime('waktu')->nullable();
            $table->integer('kualitas')->default(0);    
            $table->integer('biaya')->default(0);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->integer('nilai')->default(0);
            $table->integer('total')->default(0);

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
        Schema::dropIfExists('target_skp');
    }
}
