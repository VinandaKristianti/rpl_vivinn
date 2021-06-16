<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tes;

class tesController extends Controller
{
    public function viewTes(){
        $data_tes = tes::all();
        return view('Tes.index',compact('data_tes'));
    }

    public function viewInputTes(){
        return view('Tes.tambah');
    }

    public function tambahTes(Request $request){
        //kalo gak ada image bisa langsung pake ::all
        $request->validate([
            'namaTes'=>'required',
            'harga'=>'required',
            'keterangan'=>'required',
            'gambar'=>'required|image|max:2048'
        ]);
        $image_tes = $request->file('gambar');
        $gambar_baru = rand().'.'.$image_tes->getClientOriginalExtension();
        //biar gambar yg diunggah masuk ke file public-images, images itu folder baru untuk simpan data gambar otomatis terbuat
        $image_tes->move(public_path('images'),$gambar_baru); 
        //tambah data
        $insert_data = array(
            'namaTes'=>$request->namaTes,
            'harga'=>$request->harga,
            'keterangan'=>$request->keterangan,
            'gambar'=>$gambar_baru
        );
        tes::create($insert_data);
        return redirect('/tes')->with('sukses','Data tes berhasil ditambah !');
    }

    public function findEdit($id_tes){
        $data_tes = tes::find($id_tes);
        $data = [
            'tittle'=> 'tes',
            'data_tes'=>$data_tes
        ];
        return view('Tes.edit',$data);
    }

    //ke bawah satu method
    public function editTes($id_tes, Request $request){
        $this->validate($request,[
            'namaTes'=> 'required',
            'harga'=>'required',
            'keterangan' => 'required'
        ]);

        $data_tes = tes::find($id_tes);
        $data_tes->namaTes = $request->namaTes;
        $data_tes->harga = $request->harga;
        $data_tes->keterangan = $request->keterangan;
        $data_tes->save();
        return redirect('tes')->with('sukses','Data tes berhasil diubah !');
    }

    public function deleteTes($id_tes){
        $data_tes = tes::find($id_tes);
        $data_tes->delete();
        return redirect('tes')->with('sukses', 'Data tes berhasil dihapus !');
    }
}
