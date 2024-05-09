<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class m_produk extends Model
{
    use HasFactory;

    public function saveProduk($dataCollectSave){
        DB::table('tb_produk')
        ->insert($dataCollectSave);
    }

    public function ambilDataProduk(){
        return DB::table('tb_produK')
        ->get();
    }

    public  function deleteProduk($decryptDropId){
        //wajib pake where untuk kondisi
        DB::table('tb_produk')
        ->where('id_produk', $decryptDropId)
        ->delete();
    }

    public function detailProduk($decryptEditId)
    {
        return DB::table('tb_produk')
        ->where('id_produk',$decryptEditId)
        ->get();
        // ambil seluruh data dari tabel produk yang idproduk sesuai dengan yang diklik
    }

    public function editProduk($decryptEditId)
    {
        return DB::table('tb_produk')
        ->where('id_produk',$decryptEditId)
        ->get();
        // ambil seluruh data dari tabel produk yang idproduk sesuai dengan yang diklik
    }

    public function updateProduk($dataCollectUpdate, $decryptUpdateId)
    {
        DB::table('tb_produk')
        ->where('id_produk',$decryptUpdateId)
        ->update($dataCollectUpdate);
    }
}
