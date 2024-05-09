<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_menuMakanan;

class c_menuMakanan extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->m_menuMakanan=new m_menuMakanan();
    }

    public function index()
    {
        $idUser=Auth()->user()->id;
        $dataCollect=[
            'allProduk'=>$this->m_menuMakanan->allProduk(),
            'allKeranjangBelanja'=>$this->m_menuMakanan->allKeranjangBelanja($idUser),
        ];

        return view('menuMakanan',$dataCollect);
    }

    public function prosesPickProduk(Request $request)
    {
        $idUser=Auth()->user()->id;

        if(isset($_POST['tbPick']))
        {
            date_default_timezone_set("Asia/Jakarta");
            $now=date("Y-m-d H:i:s");

            $randomId=rand(100,500);
            $orderdate=date("ymis");
            $orderNumber="ON".$orderdate.$randomId;

            $idProduk=$_POST['idProduk'];
            $qty=$_POST['qty'];
            if(empty($qty))
            {
                return redirect()->route('menuMakanan',['mssg'=>'errorPickPembelian']);
            }
            else
            {
                $cekIdProduk=$this->m_menuMakanan->cekIdProduk($idProduk, $idUser);
                // dd($idProduk.$cekIdProduk);
                if($cekIdProduk>0)
                {
                    // jika sudah ada data
                    $getLatestQuantity=$this->m_menuMakanan->getLatestQuantity($idProduk, $idUser);
                    $quantity=$getLatestQuantity->quantity;
                    // dd($quantity);
                    $sumQuantiy=$quantity+$qty;
                    $dataCollectUpdate=[
                        'quantity'=>$sumQuantiy,
                    ];
                    $prosesUpdate=$this->m_menuMakanan->prosesUpdate($dataCollectUpdate,$idProduk, $idUser);
                    return redirect()->route('menuMakanan',['mssg'=>'successPickPembelian']);
                }
                else
                {
                    // jika belum ada data

                    // dd($idUser);
                    $dataCollectSave=[
                        'id_user'=>$idUser,
                        'id_produk'=>$idProduk,
                        'no_order'=>$orderNumber,
                        'quantity'=>$qty,
                        'tgl_order'=>$now,
                        'status_pembelian'=>'Baru',
                    ];
                    $this->m_menuMakanan->prosesPickPembelian($dataCollectSave);
                    return redirect()->route('menuMakanan',['mssg'=>'successPickPembelian']);
                }

            }
        }
        else
        {
            return redirect()->route('menuMakanan');
        }
    }
}
