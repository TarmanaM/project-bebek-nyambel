<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_pengantaran;
use Illuminate\Support\Facades\Crypt;

class c_pengantaran extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->m_pengantaran= new m_pengantaran();
    }

    public function tambahPengantaran(){
        return view('tambahPengantaran');
    }

    public function listPengantaran(){
        if (isset($_GET['konfirmasi'])) {
            try {
                $konfirmasi=$_GET['konfirmasi'];
                return redirect()->route('konfirmasiPengantaran',['statusForm'=>'Open','konfirmasi'=>$konfirmasi]);
            } catch (\Throwable $th) {
                return redirect()->route('listPengantaran', ['mssgInfo'=>'accessInvalid']);
             }
        }else {
            $dataCollect=[
                'ambilPengantaran'=>$this->m_pengantaran->ambilPengantaran(),
            ];
            // dd($dataCollect);
            return view ('listPengantaran',$dataCollect);
        }
    }

    public function konfirmasiPengantaran(){
        try {
            if (isset($_GET['statusForm']) && isset($_GET['konfirmasi']))  {
                $statusForm=$_GET['statusForm'];
                $konfirmasi=$_GET['konfirmasi'];
                $decryptKonfirmasi= Crypt::decryptString($konfirmasi);
                $dataCollect=[
                    'konfirmasi'=>$konfirmasi,
                    'getDataPengantaran'=>$this->m_pengantaran->getDataPengantaran($decryptKonfirmasi)
                ];
                //dd($dataCollect);
                //dd($decryptKonfirmasi);
                return view('formKonfirmasiPengantaran',$dataCollect);
            }else {
                return redirect()->route('listPengantaran');
            }

        } catch (\Throwable $th) {
            return redirect()->route('listPengantaran');
        }
    }

    public function prosesKonfirmasiPengantaran(Request $request){
        Request()->validate([
            'namaDriver'=>'required',
            'nomorHpDriver'=>'required'
        ],
        [
            'namaDriver.required'=>'Harap isi nama driver',
            'nomorHpDriver.required'=>'Harap isi nomor hp driver'
        ]);

        try {
            $idAntar=$_POST['idPengantaran'];
            $idPengantaran= Crypt::decryptString($idAntar);
            //dd($idPengantaran);
            $noInvoice=$_POST['noInvoice'];

            $cekStatusPengantaran=$this->m_pengantaran->cekStatusPengantaran($idPengantaran);
            // dd($cekStatusPengantaran);

            if ($cekStatusPengantaran==1) {
                date_default_timezone_set("Asia/Jakarta");
                $now=date("Y-m-d H:i:s");

                $updatePengantaran=[
                    'nama_driver'=>Request()->namaDriver,
                    'no_hp_driver'=>Request()->nomorHpDriver,
                    'tggl_konfirmasi'=>$now,
                    // 'status_pengiriman'=>'Sedang Diantar'
                ];
                $prosesUpdatePengantaran=$this->m_pengantaran->prosesUpdatePengantaran($updatePengantaran,$idPengantaran);

                return redirect()->route('listPengantaran', ['mssgInfo' => 'UpdatePengantaranSukses']);

            }else {
                return redirect()->route('konfirmasiPengantaran',
                ['statusForm'=>'Open', 'mssgInfo'=>'missingdata', 'konfirmasi'=>$idAntar]);
            }

            // if (isset($_POST['tbProses'])) {
            //     $dataCollectSave=[
            //         'statusKonfirmasi'=>Request()->status_konfirmsi,
            //     ];
            //     $this->m_pembelian->saveDataPemabayaran($dataCollectSave);
            // }

        } catch (\Throwable $th) {
            return redirect()->route('listPengantaran', ['mssgInfo'=>'accessInvalid']);
        }
    }

    public function pengantaranSudahDiproses(){
        $dataCollect=[
            'ambilPengantaranSudahDiproses'=>$this->m_pengantaran->ambilPengantaranSudahDiproses(),
        ];
        // dd($dataCollect);
        return view ('listPengantaranSudahDiproses',$dataCollect);
    }
}
