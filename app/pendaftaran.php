<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = ['id_user','id_tes','id_jadwal','status'];

    public function daftar(){
        return $this->hasTo('App\transaksi');
    }
    
}
