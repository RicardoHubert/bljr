<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kalbiser extends Model
{
    //
    protected $table = 'kalbiser';
    protected $fillable = ['nama','nim','prodi','foto','nohp','email','user_id','tahun_akademik','prodi'];

    public function skpi(){
        return $this->hasMany(skpi::class, "user_id", "user_id");
    }
}
