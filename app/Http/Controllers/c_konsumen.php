<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_konsumen;
use Illuminate\Support\Facades\Crypt;

class c_konsumen extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->m_konsumen = new m_konsumen();
    }
    public function listKonsumen(){
        if (isset($_GET['drop_id'])) {
            $userId=Crypt::decryptString($_GET['drop_id']);
            $ambilPembelian=$this->m_konsumen->ambilPembelian($userId);
            foreach($ambilPembelian as $fnambilPembelian){
                $noInvoice=$fnambilPembelian->no_invoice;
                $dropPembayaranPengantaran=$this->m_konsumen->dropPembayaranPengantaran($noInvoice);
            }
            $dropKeranjangPembelian=$this->m_konsumen->dropKeranjangPembelian($userId);

            return redirect()->route('listKonsumen', ['mssgInfo'=>'successDropIdUser']);
        }else{
            $dataCollect=[
                'ambilKonsumen'=>$this->m_konsumen->ambilKonsumen(),
            ];
            return view ('listKonsumen',$dataCollect);
        }

    }
    public function blacklistKonsumen(){
        return view ('blacklistKonsumen');
    }
}
