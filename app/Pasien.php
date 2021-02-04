<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $fillable = ['id', 'nama_pasien', 'alamat', 'no_telepon', 'rt_rw', 'tanggal_lahir', 'jenis_kelamin', 'kelurahan_id'];
    public $incrementing = false;

    public function kelurahan(){
        return $this->belongsTo('App\Kelurahan');
    }
}
