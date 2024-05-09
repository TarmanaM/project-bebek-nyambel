<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_produk;
use Illuminate\Support\Facades\Crypt;

class c_produk extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->m_produk=new m_produk();
    }

    public function tambahProduk(){
        return view('tambahProduk');
    }


    public function prosesProduk(Request $request){
        //menggunakan request karena untuk passing nilai
        Request()->validate([
            'namaProduk' => 'required',
            'kategoriProduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'paket'=> 'required',
            'keteranganProduk' => 'required',
            'gambarProduk'=>'required | mimes:jpg,bmp,png',
        ],
        [
            'namaProduk.required'=>'Nama Produk Wajib Isi',
            'kategoriProduk'=>'Kategori Produk Wajib Isi',
            'harga.required'=>'Harga Produk Wajib Isi',
            'paket.required'=>'Paket Produk Wajib Isi',
            'stok.required'=>'Stok Produk Wajib Isi',
            'keteranganProduk.required'=>'Keterangan Produk Wajib Isi',
            'gambarProduk.required'=>'Gambar Produk Wajib Isi',
            'gambarProduk.mimes'=>'Tipe Gambar Tidak Sesuai'
        ]);

        date_default_timezone_set("Asia/Jakarta");
        if (Request()->kategoriProduk=="Makanan") {
            $kode="MK";
        }
        elseif(Request()->kategoriProduk=="Minuman"){
            $kode="MM";
        }
        else{
            $kode="LY";
        }

        $kodeTime=date("myis");
        $kodeAcak=rand(1,200);
        $generateKodeProduk=$kode.$kodeTime.$kodeAcak;

        if (isset($_POST['tbProses'])) {
            $gambarProduk=$_FILES['gambarProduk'];
            $gambarProdukName=$_FILES['gambarProduk']['name'];
            //tipe action methode: $_FILES, $_POST

            move_uploaded_file($gambarProduk['tmp_name'],'../public/img/'.$gambarProdukName);
            $dataCollectSave=[
                'kode_barang'=>$generateKodeProduk,
                //'kode_barang' di database akan menyimpan data dari form
                'nama_barang'=>Request()->namaProduk,
                'kategori'=>Request()->kategoriProduk,
                'stok'=>Request()->stok,
                'satuan'=>'Porsi',
                'paket'=>Request()->paket,
                'deskripsi_produk'=>Request()->keteranganProduk,
                'foto_produk'=>$gambarProdukName,
                'harga_produk'=>Request()->harga

            ];
            $this->m_produk->saveProduk($dataCollectSave);

            return redirect()->route('tambahProduk', ['mssgInfo'=>'SuccessSaveData']);
        }
    }

    public function listProduk(){

        if (isset($_GET['dropId'])) {
            try {
                $dropId=$_GET['dropId'];
                $decryptDropId= Crypt::decryptString($dropId);

                $this->m_produk->deleteProduk($decryptDropId);
                return redirect()->route('listProduk', ['mssgInfo'=>'successDelete']);
            } catch (\Throwable $th) {
                return redirect()->route('listProduk', ['mssgInfo'=>'accessInvalid']);
            }

        }else {
            $datacollect=[
                'ambilDataProduk' => $this -> m_produk -> ambilDataProduk()
            ];
            return view('listProduk', $datacollect);
        }
    }

    public function editProduk(){
        if (isset($_GET['updateId']))
        {
            try
            {
                $editId=$_GET['updateId'];
                $decryptEditId= Crypt::decryptString($editId);
                $dataCollect=[
                    'editIdEncrypt'=>$editId,
                    'detailProduk'=>$this->m_produk->detailProduk($decryptEditId),
                ];
                return view('frmEditProduk',$dataCollect);
            }
            catch (\Throwable $th)
            {
                return redirect()->route('listProduk', ['mssgInfo'=>'accessInvalid']);
            }
        }
        else
        {
            return redirect()->route('listProduk');
        }
    }

    public function prosesEditProduk (Request $request)
    {
        $updateId=$_GET['updateId'];
        try {
            if(isset($_POST['tbProses']))
            {
                $decryptUpdateId=crypt::decryptString($updateId);

                Request()->validate([
                    'namaProduk' => 'required',
                    'kategoriProduk' => 'required',
                    'harga' => 'required',
                    'stok' => 'required',
                    'paket'=> 'required',
                    'keteranganProduk' => 'required',
                ],
                [
                    'namaProduk.required'=>'Nama Produk Wajib Isi',
                    'kategoriProduk'=>'Kategori Produk Wajib Isi',
                    'harga.required'=>'Harga Produk Wajib Isi',
                    'paket.required'=>'Paket Produk Wajib Isi',
                    'stok.required'=>'Stok Produk Wajib Isi',
                    'keteranganProduk.required'=>'Keterangan Produk Wajib Isi',
                ]);

                date_default_timezone_set("Asia/Jakarta");
                if (Request()->kategoriProduk=="Makanan") {
                    $kode="MK";
                }
                elseif(Request()->kategoriProduk=="Minuman"){
                    $kode="MM";
                }
                else{
                    $kode="LY";
                }

                $kodeTime=date("myis");
                $kodeAcak=rand(1,200);
                $generateKodeProduk=$kode.$kodeTime.$kodeAcak;

                $gambarProduk=$_FILES['gambarProduk'];
                $gambarProdukName=$_FILES['gambarProduk']['name'];
                //tipe action methode: $_FILES, $_POST

                if(empty($gambarProdukName))
                {
                    $dataCollectUpdate=[
                        'kode_barang'=>$generateKodeProduk,
                        //'kode_barang' di database akan menyimpan data dari form
                        'nama_barang'=>Request()->namaProduk,
                        'kategori'=>Request()->kategoriProduk,
                        'stok'=>Request()->stok,
                        'satuan'=>'Porsi',
                        'paket'=>Request()->paket,
                        'deskripsi_produk'=>Request()->keteranganProduk,
                        'harga_produk'=>Request()->harga

                    ];
                }
                else
                {
                    move_uploaded_file($gambarProduk['tmp_name'],'../public/img/'.$gambarProdukName);
                    $dataCollectUpdate=[
                        'kode_barang'=>$generateKodeProduk,
                        //'kode_barang' di database akan menyimpan data dari form
                        'nama_barang'=>Request()->namaProduk,
                        'kategori'=>Request()->kategoriProduk,
                        'stok'=>Request()->stok,
                        'satuan'=>'Porsi',
                        'paket'=>Request()->paket,
                        'deskripsi_produk'=>Request()->keteranganProduk,
                        'foto_produk'=>$gambarProdukName,
                        'harga_produk'=>Request()->harga

                    ];
                }


                $this->m_produk->updateProduk($dataCollectUpdate, $decryptUpdateId);

                return redirect()->route('listProduk', ['mssgInfo'=>'SuccessUpdateData']);

            }
            else
            {
                return redirect()->route('listProduk');
            }
            //code...
        } catch (\Throwable $th) {
            return redirect()->route('listProduk', ['mssgInfo'=>'accessInvalid','updateId'=>$updateId]);
        }
    }
}
