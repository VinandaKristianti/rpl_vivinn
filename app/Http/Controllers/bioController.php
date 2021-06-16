<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\biodata;

class bioController extends Controller
{
    public function viewBio(){
        $data_bio = biodata::all();
        return view('User.biodata',compact('data_bio'));
    }

    public function inputBio(Request $request){
        \App\biodata::create($request->all());
        return redirect('user');
    }
}
