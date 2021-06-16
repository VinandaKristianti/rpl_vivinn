<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biodata extends Model
{
    protected $table = 'biodata';
    protected $fillable = ['nik','nama','tgl_lahir','jk','alamat','minat'];
    protected $primaryKey = 'id_bio';
}
