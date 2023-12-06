<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_pengantaran extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function tambahPengantaran(){
        return view('tambahPengantaran');
    }
    public function listPengantaran(){
        return view('listPengantaran');
    }
}
