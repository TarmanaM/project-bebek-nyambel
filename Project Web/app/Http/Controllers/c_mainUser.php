<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_mainUser;

class c_mainUser extends Controller
{
    public function __construct(){
        $this-> m_mainUser = new m_mainUser();
    }

    public function index(){
        $datacollect=[
            'ambilProdukLatest6'=> $this -> m_mainUser -> ambilProdukLatest6()

        ];
        return view('userHome',$datacollect);
    }

    public function kontak(){
        return view('kontak');
    }
}
