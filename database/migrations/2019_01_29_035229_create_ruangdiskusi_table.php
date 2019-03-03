<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuangdiskusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mruangdiskusi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->lenth(10)->unsigned();
            $table->string('email');
            $table->string('judulruangdiskusi');
            $table->string('ringkasanruangdiskusi');
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
        Schema::dropIfExists('mruangdiskusi');
    }
}
