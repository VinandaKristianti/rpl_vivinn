<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table= 'jadwal';
    protected $fillable =['tgl_tes','jam_mulai','jam_selesai','kapasitas','id_tes'];
    protected $primaryKey = 'id_jadwal';

    //relasi dari tabel mana
    public function tes(){
        return $this->belongsTo('App\tes');
    }  
}
