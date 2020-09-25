<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skpi extends Model
{
    //
    protected $table = 'skpi';
    protected $fillable = ['nomor_urut','jenis_dokumen','tanggal_dokumen','tahun','judul_sertifikat','user_id','ormawa_id','status','file_skpi'];

}
