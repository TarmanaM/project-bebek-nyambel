<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_cekPemesanan extends Model
{
    use HasFactory;
    // public function ambilData($id){
    //     return DB::table('tb_pembelian')
    //     ->join('tb_keranjang', 'tb_keranjang.no_order', '=', 'tb_pembelian.no_order')
    //     ->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
    //     ->select('tb_produk.nama_barang', 'tb_pembelian.no_invoice', 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', 'tb_pembelian.status_pengantaran' )
    //     ->where('tb_pembelian.id_user',$id)
    //     ->groupBy('tb_pembelian.no_invoice','tb_keranjang.no_order' )
    //     ->get();
    // }

    public function ambilData($id,$noInvoice){
        return DB::table('tb_pembelian')
        ->join('tb_keranjang', 'tb_keranjang.no_order', '=', 'tb_pembelian.no_order')
        ->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
        ->leftJoin('tb_pengantaran', 'tb_pengantaran.no_invoice', '=', 'tb_pembelian.no_invoice')
        // ->join('tb_pengantaran', 'tb_pengantaran.no_invoice', '=', 'tb_pembelian.no_invoice')
        ->select('tb_pembelian.no_invoice', DB::raw('GROUP_CONCAT(tb_produk.nama_barang, " @", tb_keranjang.quantity) as nama_barang_quantity'), 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', 'tb_pembelian.status_pengantaran','tb_pembelian.status_pengantaran',
        'tb_pengantaran.alamat_pengantaran')
        ->where('tb_pembelian.id_user', $id)
        ->where('tb_pembelian.no_invoice', 'like', '%'.$noInvoice.'%')
        ->groupBy('tb_pembelian.no_invoice', 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', 'tb_pembelian.status_pengantaran')
        ->orderBy('tb_pembelian.no_invoice', 'Desc')
        ->get();
    }
}
