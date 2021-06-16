<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tes;
use App\Jadwal;

class userController extends Controller
{
    //menghubungkan tes yang dipilih user saat diklik sesuai isi id_tes nya
   public function view($id_tes){
       $tampil_tes = tes::where('id_tes',$id_tes)->get(); // ngambil data 
       return view('User.user', compact('tampil_tes'));
    }

    //menampilkan tes yang ada ditampilan user per kotak
    public function viewDataTes(){
        $data_tes = tes::all()->sortByDesc('id_tes');
        return view('User.user',compact('data_tes'));
    }

    public function viewRiwayat(){
        return view('User.riwayat');
    }

    public function biodata(){
        return view('User.biodata');
    }

    public function daftar(){
        return view('User.daftar');
    }

    public function viewPembayaran(){
        return view('User.pembayaran');
    }

    //menampilkan pilihan jadwal by sorting tes dan jadwal
    //kemudian di user.blade untuk ngarahin ke route viewiddaftar disortir by id tes
    public function viewDaftar($id_jadwal){
        $data_jadwal =jadwal::where('id_tes',$id_jadwal)->get();
        return view('User.daftar',compact('data_jadwal'));
        
    }

   
}
