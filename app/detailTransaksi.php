<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    protected $table = 'detail_trx';
    protected $fillable = ['link_tes','status','id_trx'];

    public function transaksi(){
        return $this->belongsTo('App\transaksi');
    }
}
