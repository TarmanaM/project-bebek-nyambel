<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_cekPemesanan;

class c_cekPemesanan extends Controller
{
    //
    public function __construct(){
        $this->m_cekPemesanan= new m_cekPemesanan();
        $this->middleware('auth');
    }

    public function index(){
        $id=Auth()->user()->id;
        if (isset($_GET['tbCari'])) {
            $noInvoice=$_GET['noInvoice'];
        }else {
            $noInvoice="";
        }

        $dataCollect=[
            'ambilData'=>$this->m_cekPemesanan->ambilData($id, $noInvoice),
            'noInvoice'=>$noInvoice
        ];
        // dd($dataCollect);
        return view('cekPemesanan',$dataCollect);
    }
}
