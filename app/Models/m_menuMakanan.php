<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_menuMakanan extends Model
{
    use HasFactory;

    public function allProduk()
    {
        return DB::table('tb_produk')
        ->select('id_produk','kode_barang','nama_barang','kategori','foto_produk','harga_produk','stok')
        ->orderBy('kategori','asc')
        ->get();
    }

    public function prosesPickPembelian($dataCollectSave)
    {
        DB::table('tb_keranjang')
        ->insert($dataCollectSave);
    }

    public function allKeranjangBelanja()
    {
        return DB::table('tb_keranjang')
        ->join('tb_produk','tb_produk.id_produk','=','tb_keranjang.id_produk')
        ->select('tb_keranjang.quantity','tb_produk.nama_barang','tb_produk.harga_produk')
        ->where('status_pembelian','Baru')
        // ->where(); AUthentication
        ->get();
    }

    public function cekIdProduk($idProduk)
    {
        return DB::table("tb_keranjang")
        ->where('id_produk',$idProduk)
        ->where('status_pembelian','Baru')
        ->count();
    }

    public function getLatestQuantity($idProduk)
    {
        return DB::table("tb_keranjang")
        ->select('quantity')
        ->where('id_produk',$idProduk)
        ->where('status_pembelian','Baru')
        ->orderBy('id_produk','Desc')
        ->first();
    }

    public function prosesUpdate($dataCollectUpdate,$idProduk)
    {
        DB::table('tb_keranjang')
        ->where('id_produk',$idProduk)
        ->update($dataCollectUpdate);
    }
}
