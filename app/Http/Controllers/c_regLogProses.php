<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_regLogProses extends Controller
{
    //
    public function daftar(){
        return view('daftarUser');
    }
    public function masuk(){
        return view('masukUser');
    }
    public function lupaPassword(){
        return view('lupaPassword');
    }
}
