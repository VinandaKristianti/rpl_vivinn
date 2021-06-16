<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detil extends Model
{
    protected $table= 'detil';
    protected $fillable =['id_user','tgl_daftar','status'];
    protected $primaryKey = 'id_detil';

    //relasi dari tabel mana 

    public function pengguna(){
        return $this->belongsTo('App\pengguna');
    }  
}
