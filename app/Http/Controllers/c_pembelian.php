<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_pembelian extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function listPembelian(){
        return view ('listPembelian');
    }
}
