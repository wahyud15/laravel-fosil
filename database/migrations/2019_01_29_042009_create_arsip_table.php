<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('marsip', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->lenth(10)->unsigned();
            $table->string('email');
            $table->string('judul');
            $table->string('ringkasan');
            $table->string('file');
            $table->string('linkdownload');
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
        Schema::dropIfExists('marsip');
    }
}
