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
        Schema::create('tugas_akhir', function (Blueprint $table) {
            $table->id();
            $table->integer('mahasiswa_id');
            $table->string('kode_ta');
            $table->string('bidang_ta');
            $table->string('judul_ta');
            $table->string('url_ta');
            $table->string('file_ta');
            $table->string('proposal_ta');
            $table->float('nilai')->nullable();
            $table->dateTime('tanggal_upload');
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
        Schema::dropIfExists('tugas_akhirs');
    }
};
