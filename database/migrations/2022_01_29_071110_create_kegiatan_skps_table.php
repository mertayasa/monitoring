<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanSkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_skp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nilai_skp');
            $table->string('kegiatan', 255);
            
            $table->integer('kuantitas');
            $table->string('satuan_kuantitas')->nullable();
            
            $table->integer('kualitas')->default(0);
            
            $table->integer('waktu')->default(0);
            $table->string('satuan_waktu')->nullable();

            $table->integer('biaya')->default(0);

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
        Schema::dropIfExists('target_skp');
    }
}
