<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class c_cekLevel extends Controller
{
    //
    public function index(){
        //mengecek level
        // $level=Auth()->user()->level;
        // dd($level);

        try {
            $level=Auth()->user()->level;
            if ($level=="Pembeli")
            {
                return redirect()->route('mainUser');
            }
            elseif($level=="Admin")
            {
                return redirect()->route('dashboard');
            }
            else
            {
                return redirect()->route('daftarUser');
            }
        } catch (\Throwable $th) {
            return redirect()->route('mainUser');
        }



    }
}
