<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class grafikController extends Controller
{
    public function grafik(){
        //$hasil = [['name'=>'michael','y'=>65],['name'=>'vivin','y'=>35]];
        $hasil = [];
        $pilih = pendaftaran::get();
        foreach ($pilih as $key => $plh) {
            $id_daftar = $plh->id_daftar;
            $id_tes = $plh->id_tes;
            $total = pendaftaran::where('id_tes',$id_daftar)->count();
            $a['name'] = $id_tes;
            $a['y'] = $total;
            array_push($hasil,$a);
        }
        return view('grafik.index',compact('hasil'));
    }
}
