<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pejabat_fungsional');
            $table->enum('periode_dupak',['1','2']);
            $table->string('tahun');
            $table->date('tgl_terima_tu');
            $table->string('petugas_terima_tu');
            $table->string('penilai1_nama')->nullable();
            $table->date('penilai1_tglmulai')->nullable();
            $table->date('penilai1_tglselesai')->nullable();
            $table->string('penilai2_nama')->nullable();
            $table->date('penilai2_tglmulai')->nullable();
            $table->date('penilai2_tglselesai')->nullable();
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
        Schema::dropIfExists('penilaian');
    }
}
