<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('password');
            $table->string('email')->unique();

            $table->string('nip')->nullable();
            $table->text('alamat', 100)->nullable();
            $table->text('tempat_lahir', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_tlp', 16)->nullable();
            $table->string('foto')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->enum('level', ['admin', 'penilai', 'kontrak'])->default('kontrak');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->unsignedBigInteger('id_unit_kerja')->nullable();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->unsignedBigInteger('id_pangkat_golongan')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_unit_kerja')->references('id')->on('unit_kerja');
            $table->foreign('id_jabatan')->references('id')->on('jabatan');
            $table->foreign('id_pangkat_golongan')->references('id')->on('pangkat_golongan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
