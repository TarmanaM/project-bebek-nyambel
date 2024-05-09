<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_pembelian;
use Illuminate\Support\Facades\Crypt;

class c_pembelian extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->m_pembelian=new m_pembelian();
    }

    public function listPembelian(){
        if (isset($_GET['konfirmasi'])) {
           try {
                $konfirmasi=$_GET['konfirmasi'];
                return redirect()->route('konfirmasiPembelian',['statusForm'=>'Open','konfirmasi'=>$konfirmasi]);
           } catch (\Throwable $th) {
                return redirect()->route('listPembelian', ['mssgInfo'=>'accessInvalid']);
            }
        }else {
            $dataCollect=[
                'ambilPembelian'=>$this->m_pembelian->ambilPembelian(),
            ];
            // dd($dataCollect);
            return view ('listPembelian',$dataCollect);
        }

    }

    public function konfirmasiPembelian(){
        try {
            if (isset($_GET['statusForm']) && isset($_GET['konfirmasi']))  {
                $statusForm=$_GET['statusForm'];
                $konfirmasi=$_GET['konfirmasi'];
                $decryptKonfirmasi= Crypt::decryptString($konfirmasi);
                $dataCollect=[
                    'konfirmasi'=>$konfirmasi,
                    'getDataPembayaran'=>$this->m_pembelian->getDataPembayaran($decryptKonfirmasi)
                ];
                //dd($dataCollect);
                //dd($decryptKonfirmasi);
                return view('formKonfirmasiPembelian',$dataCollect);
            }else {
                return redirect()->route('listPembelian');
            }

        } catch (\Throwable $th) {
            return redirect()->route('listPembelian');
        }
    }

    public function prosesKonfirmasiPembelian(Request $request){
        Request()->validate([
            'statusKonfirmasi'=>'required'
        ],
        [
            'statusKonfirmasi.required'=>'Harap Pilih Statusnya'
        ]);

        try {
            $idPay=$_POST['idPembayaran'];
            $idPembayaran= Crypt::decryptString($idPay);
            //dd($idPembayaran);
            $noInvoice=$_POST['noInvoice'];

            $cekStatusPembayaran=$this->m_pembelian->cekStatusPembayaran($idPembayaran);
            // dd($cekStatusPembayaran);

            if ($cekStatusPembayaran==1) {
                date_default_timezone_set("Asia/Jakarta");
                $now=date("Y-m-d H:i:s");

                $updatePembayaran=[
                    'status_konfirmsi'=>Request()->statusKonfirmasi,
                    'tggl_konfirmasi'=>$now
                ];
                $prosesUpdatePembayaran=$this->m_pembelian->prosesUpdatePembayaran($updatePembayaran,$idPembayaran);

                $updatePengantaran=[
                    'status_pengiriman'=>'Sedang Diproses'
                ];
                $prosesUpdatePengantaran=$this->m_pembelian->prosesUpdatePengantaran($updatePengantaran,$noInvoice);

                return redirect()->route('listPembelian', ['mssgInfo' => 'UpdatePembayaranSukses']);

            }else {
                return redirect()->route('konfirmasiPembelian',
                ['statusForm'=>'Open', 'mssgInfo'=>'missingdata', 'konfirmasi'=>$idPay]);
            }

            // if (isset($_POST['tbProses'])) {
            //     $dataCollectSave=[
            //        'statusKonfirmasi'=>Request()->status_konfirmsi,
            //     ];
            //     $this->m_pembelian->saveDataPemabayaran($dataCollectSave);
            // }

        } catch (\Throwable $th) {
            return redirect()->route('listPembelian', ['mssgInfo'=>'accessInvalid']);
        }
    }

    public function pembelianDikonfirmasi(){
        $dataCollect=[
            'ambilPembelianDikonfirmasi'=>$this->m_pembelian->ambilPembelianDikonfirmasi(),
        ];
        // dd($dataCollect);
        return view ('listPembelianDikonfirmasi',$dataCollect);
    }

    public function pembelianDitolak(){
        $dataCollect=[
            'ambilPembelianDitolak'=>$this->m_pembelian->ambilPembelianDitolak(),
        ];
        // dd($dataCollect);
        return view ('listPembelianDitolak',$dataCollect);
    }
}
