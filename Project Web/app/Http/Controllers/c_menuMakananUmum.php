<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_menuMakanan;

class c_menuMakananUmum extends Controller
{
    public function __construct(){
        $this->m_menuMakanan= new m_menuMakanan();
    }

    public function index()
    {
        $dataCollect=[
            'allProduk'=>$this->m_menuMakanan->allProduk(),
        ];

        return view('menuMakananUmum',$dataCollect);
    }
}
