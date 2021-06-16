<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\pendaftaran;
use App\tes;
use Auth;
class transaksiController extends Controller
{
    public function indexTrx(){
        return view('user.pembayaran');
    }

    public function viewInputTrx(){
        $auth = Auth::user()->id;
        $data_index= tes::where([
            ['id_tes', '=', $auth],
            ])->get();
        $data_daf= pendaftaran::where([
            ['id_daftar', '=', $auth],
            ])->get();
        //$data_index = tes::all();
        return view('user.pembayaran',compact('data_index','data_daf'));
    }

    public function tambahTrx(Request $request){
        $request->validate([
            'nama_rek'=>'required',
            'tgl_kirim'=>'required',
            'bank'=>'required',
            'total'=>'required',
            'bukti_bayar'=>'required|image|max:2048',
        ]);
        $image_tes = $request->file('bukti_bayar');
        $gambar_baru = rand().'.'.$image_tes->getClientOriginalExtension();
        //biar gambar yg diunggah masuk ke file public-images, images itu folder baru untuk simpan data gambar otomatis terbuat
        $image_tes->move(public_path('images'),$gambar_baru); 
        //tambah data
        $insert_data = array(
            'nama_rek'=>$request->nama_rek,
            'tgl_kirim'=>$request->tgl_kirim,
            'bank'=>$request->bank,
            'total'=>$request->total,
            'bukti_bayar'=>$gambar_baru,
            'link_tes' => 0, //waitinglist
            'status'=>0, //waitinglist
            'id_daftar'=>$request->id_daftar
        );
        transaksi::create($insert_data);
        return redirect('/riwayat')->with('sukses','Pembayaran berhasil! Mohon menunggu konfirmasi dari Admin');
    }

}
