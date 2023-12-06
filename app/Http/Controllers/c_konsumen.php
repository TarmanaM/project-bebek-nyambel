<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_konsumen extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function listKonsumen(){
        return view ('listKonsumen');
    }
    public function blacklistKonsumen(){
        return view ('blacklistKonsumen');
    }
}
