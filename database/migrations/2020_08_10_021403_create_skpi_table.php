<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
 {
        Schema::create('skpi', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('kompetisi_id')->nullable();
            $table->string('kegiatan_id')->nullable();
            $table->string('jenis_dokumen')->nullable();
            $table->string('ormawa_id')->nullable();
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
        Schema::dropIfExists('skpi');
    }
}
