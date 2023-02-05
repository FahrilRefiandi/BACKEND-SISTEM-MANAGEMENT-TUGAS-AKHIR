<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_bimbingan', function (Blueprint $table) {
            $table->id();
            $table->integer('dosen_id');
            $table->integer('mahasiswa_id');
            $table->string('keterangan');
            $table->string('tempat_bimbingan');
            $table->enum('tipe_bimbingan', ['online', 'offline']);
            $table->dateTime('waktu_bimbingan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_bimbingans');
    }
};
