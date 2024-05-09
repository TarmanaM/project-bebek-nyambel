<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_keranjangBelanja;
use Illuminate\Support\Facades\Crypt;

class c_keranjangBelanja extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->m_keranjangBelanja=new m_keranjangBelanja();
    }
    public function index(){
        $idUser=Auth()->user()->id;
        if (isset($_GET['checkOut'])) {
            $dataCollect=[
                'allKeranjangBelanja'=>$this->m_keranjangBelanja->allKeranjangBelanja($idUser),
            ];
            return view ('checkOut',$dataCollect);
        }
        if (isset($_GET['dropId'])) {
            try {
                $dropId=$_GET['dropId'];
                $decryptDropId= Crypt::decryptString($dropId);
                $this->m_keranjangBelanja->deleteProduk($decryptDropId);
                return redirect()->route('keranjangBelanja', ['mssgInfo'=>'successDelete']);
            } catch (\Throwable $th) {
                return redirect()->route('keranjangBelanja', ['mssgInfo'=>'accessInvalid']);
            }
        }else {
            if (isset($_GET['mssgInfo'])) {
                $pesan=$_GET['mssgInfo'];
            }else {
                $pesan="-";
            }
            $dataCollect=[
                'allKeranjangBelanja'=>$this->m_keranjangBelanja->allKeranjangBelanja($idUser),
                'tampilPesan'=>$pesan,
            ];
            return view('keranjangBelanja',$dataCollect);
        }
    }
    public function simpanKeranjang(Request $request){
        $idUser=Auth()->user()->id;

        Request()->validate([
            'pengiriman' => 'required',
            'alamatLengkap' => 'required',
            'buktiTransfer'=>'required | mimes:jpg,bmp,png',
            'keteranganTransfer'=>'required',
        ],
        [
            'pengiriman.required'=>'Pilih Opsi Pengiriman',
            'alamatLengkap.required'=>'Alamat Wajib Diisi',
            'buktiTransfer.required'=>'Bukti Transfer Wajib Diisi',
            'buktiTransfer.mimes'=>'Bukti Transfer dalam Bentuk Gambar',
            'keteranganTransfer.required'=>'Keterangan Transfer wajib di isi',
        ]);

        $buktiTransfer=$_FILES['buktiTransfer'];
        $buktiTransferName=$_FILES['buktiTransfer']['name'];

        $subTotal=$_POST['subTotal'];
        $ongkosKirim=$_POST['ongkosKirim'];
        $grandtotal=$_POST['grandtotal'];

        date_default_timezone_set("Asia/Jakarta");
        $rand=rand(100,500);
        $tgfor=date("myhi");
        $noInvoice="INV-$rand$tgfor$idUser";

        $now=date("Y-m-d H:i:s");

        $cekJumlahKeranjang=$this->m_keranjangBelanja->cekJumlahKeranjang($idUser);
        $noOr="";
        for($i=1;$i<=$cekJumlahKeranjang;$i++)
        {
            $noOrder=$_POST['noOrder'.$i];
            $dataCollectSave=[
                'id_user'=>$idUser,
                'no_order'=>$noOrder,
                'no_invoice'=>$noInvoice,
                'subTotal'=>$subTotal,
                'ongkos_kirim'=>$ongkosKirim,
                'grand_total'=>$grandtotal,
                'tggl_pembelian'=>$now,
                'status_baru'=>'baru',
                'status_pembayaran'=>'sudah',
                'status_pengantaran'=>Request()->pengiriman,
            ];
            $this->m_keranjangBelanja->prosSavePembelian($dataCollectSave);

            $updateKeranjang=[
                'status_pembelian'=>'Lama',
            ];
            $this->m_keranjangBelanja->prosUpdateKeranjang($updateKeranjang,$noOrder,$idUser);
        }

        $prosesPembayaran=[
            'no_invoice'=>$noInvoice,
            'metode_pembayaran'=>'transfer',
            'keteranganTransfer'=>nl2br(Request()->keteranganTransfer),
            'gambar_transfer'=>$buktiTransferName,
            'status_pembayaran'=>'sudah',
            'tggl_upload_bukti'=>$now,
            'status_konfirmsi'=>'belum',
            'tggl_konfirmasi'=>NULL,
        ];

        move_uploaded_file($buktiTransfer['tmp_name'],'../public/img/'.$buktiTransferName);
        $this->m_keranjangBelanja->prosesPembayaran($prosesPembayaran);

        if (Request()->pengiriman=="Diantar")
        {
            $prosesPengantaran=[
                'no_invoice'=>$noInvoice,
                'alamat_pengantaran'=>Request()->alamatLengkap,
                'nama_driver'=>NULL,
                'no_hp_driver'=>NULL,
                'tggl_pengiriman'=>NULL,
                'status_pengiriman'=>NULL,
                'status_konfirmasi_penerimaan'=>NULL,
                'tggl_konfirmasi'=>NULL,
                'catatan_konfirmasi'=>NULL,
                'berat_produk'=>NULL,
            ];
            $this->m_keranjangBelanja->prosesPengantaran($prosesPengantaran);
        }

        return redirect()->route('keranjangBelanja',['mssgInfo'=>'successPembelian']);
    }
}
