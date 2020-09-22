<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKalbiserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalbiser', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama');
            $table->string('nim');
            $table->string('foto');
            $table->string('prodi');
            $table->string('tahun_akademik');
            $table->string('nohp');
            $table->string('email');
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
        Schema::dropIfExists('kalbiser');
    }
}
