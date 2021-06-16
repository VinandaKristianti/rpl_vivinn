<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pendaftaran;
use App\transaksi;
use DB;
use Auth;

class pendaftaranController extends Controller
{
    //simpan ke database
    public function pilihJadwal(Request $request){
        $daftar = new pendaftaran;
        $daftar->id_user=Auth::user()->id;
        $daftar->id_tes= $request->id_tes;
        $daftar->id_jadwal = $request->id_jadwal;
        $daftar->status=0; //waitinglist
        $daftar->save();
        return redirect('riwayat');
    }

    //buat nampilin yg disimpan di riwayat
    public function viewPilih(){
        $auth = Auth::user()->id;
        $data_view= pendaftaran::where([
            ['id_user', '=', $auth],
            ])->get();
        $verTrx = transaksi::all();
        //$data_view = pendaftaran::all();
        //$data_view = DB::table('jadwal')->join('pendaftaran','jadwal.id_jadwal','=','pendaftaran.id_daftar')->get();
        return view('User.riwayat',compact('data_view','verTrx'));
    }
}
