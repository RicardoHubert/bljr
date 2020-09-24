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
        //['nama_sertifikat','jenis_dokumen','tanggal_dokumen','tahun','judul_sertifikat','user_id','ormawa_id','status','file_skpi'];
        Schema::create('skpi', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('kompetisi_id')->nullable();
            $table->string('kegiatan_id')->nullable();
            $table->string('jenis_dokumen')->nullable();
            $table->string('ormawa_id')->nullable();
            $table->date('tanggal_dokumen')->nullable();
            $table->year('tahun')->nullable();
            $table->string('judul_sertifikat')->nullable();
            $table->string('nama_sertifikat')->nullable();
            $table->string('status')->nullable();
            $table->string('file_skpi')->nullable();
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
