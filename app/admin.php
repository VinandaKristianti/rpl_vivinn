<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['nik','nama','jk','hp'];
    protected $primaryKey = 'id_admin';
}
