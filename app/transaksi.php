<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['nama_rek','tgl_kirim','bank', 'total', 'bukti_bayar','link_tes','status','id_daftar'];
    protected $primaryKey = 'id_trx';

    //relasi dr tabel mana
    /*public function jadwal(){
        return $this->hasTo('App\jadwal');
    }

    public function pengguna(){
        return $this->hasTo('App\pengguna');
    }

    public function admin(){
        return $this->hasTo('App\admin');
    }*/

    public function daftar(){
        return $this->belongsTo('App\pendaftaran');
    }

    public function transaksi(){
        return $this->hasTo('App\detailTransaksi');
        }
}
