<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_keranjangBelanja extends Model
{
    use HasFactory;
    public function allKeranjangBelanja($idUser){
        return DB::table('tb_keranjang')
        ->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk' )
        ->select('tb_keranjang.quantity', 'tb_produk.nama_barang', 'tb_produk.harga_produk', 'tb_produk.foto_produk', 'tb_keranjang.id_keranjang', 'tb_keranjang.no_order', 'tb_keranjang.id_produk' )
        ->where('tb_keranjang.id_user', $idUser)
        ->where('tb_keranjang.status_pembelian','Baru')
        ->get();
    }

    public  function deleteProduk($decryptDropId){
        DB::table('tb_keranjang')
        ->where('id_keranjang', $decryptDropId)
        ->delete();
    }

    public function cekJumlahKeranjang($idUser)
    {
        return DB::table('tb_keranjang')
        ->where('status_pembelian', 'Baru')
        ->where('id_user', $idUser)
        ->count();
    }

    public function prosSavePembelian($dataCollectSave)
    {
        DB::table('tb_pembelian')
        ->insert($dataCollectSave);
    }

    public function prosUpdateKeranjang($updateKeranjang,$noOrder,$idUser)
    {
        DB::table('tb_keranjang')
        ->where('no_order',$noOrder)
        ->where('id_user', $idUser)
        ->update($updateKeranjang);
    }

    public function prosesPembayaran($prosesPembayaran)
    {
        DB::table('tb_pembayaran')
        ->insert($prosesPembayaran);
    }

    public function prosesPengantaran($prosesPengantaran)
    {
        DB::table('tb_pengantaran')
        ->insert($prosesPengantaran);
    }
}
