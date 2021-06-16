<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwal;
use App\tes;
use DB;
class jadwalController extends Controller
{
    public function viewJadwal(){
        $data_jadwal = jadwal::all();
        $data_tes = tes::all();
        return view('Jadwal.index',compact('data_jadwal','data_tes'));
    }

    //buat melempar view tambah jadwal
    public function viewInputJadwal(){
        $data_tes = tes::all();
        return view('Jadwal.tambahJadwal',compact('data_tes'));
    }

    public function tambahJadwal(Request $request){
        \App\jadwal::create($request->all());
        return redirect('/jadwal')->with('sukses','Data jadwal berhasil ditambahkan !');;
    }

    public function findEdit($id_jadwal){
        $data_jadwal = jadwal::find($id_jadwal);
        $data = [
            'tittle'=> 'jadwal',
            'data_jadwal'=>$data_jadwal
        ];
        return view('Jadwal.editJadwal',$data);
    }

    //ke bawah satu method
    public function editJadwal($id_jadwal, Request $request){
        $this->validate($request,[
            'tgl_tes'=> 'required',
            'jam_mulai'=>'required',
            'jam_selesai' => 'required'
        ]);

        $data_jadwal = jadwal::find($id_jadwal);
        $data_jadwal->tgl_tes = $request->tgl_tes;
        $data_jadwal->jam_mulai = $request->jam_mulai;
        $data_jadwal->jam_selesai = $request->jam_selesai;
        $data_jadwal->save();
        return redirect('jadwal')->with('sukses','Data jadwal berhasil diubah !');
    }

    public function deleteJadwal($id_jadwal){
        $data_jadwal = jadwal::find($id_jadwal);
        $data_jadwal->delete();
        return redirect('jadwal')->with('sukses', 'Data jadwal berhasil dihapus !');
    }
}
