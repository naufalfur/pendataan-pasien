<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $fillable = ['nama_kelurahan', 'nama_kecamatan', 'nama_kota'];

    public function pasiens(){
        return $this->hasMany('App\Pasien');
    }
}
