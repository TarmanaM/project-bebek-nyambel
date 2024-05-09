<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_pengantaran extends Model
{
    use HasFactory;
    public function ambilPengantaran(){
        return DB::table('tb_pembelian')
        ->join('users', 'users.id', '=', 'tb_pembelian.id_user')
        ->join('tb_keranjang', 'tb_keranjang.no_order', '=', 'tb_pembelian.no_order')
        ->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
        ->leftJoin('tb_pengantaran', 'tb_pengantaran.no_invoice', '=', 'tb_pembelian.no_invoice')
        ->leftJoin('tb_pembayaran', 'tb_pembayaran.no_invoice', '=', 'tb_pembelian.no_invoice' )
        // ->join('tb_pengantaran', 'tb_pengantaran.no_invoice', '=', 'tb_pembelian.no_invoice')
        ->select('tb_pembelian.no_invoice',DB::raw('GROUP_CONCAT(tb_keranjang.no_order," ", tb_produk.nama_barang, " @", tb_keranjang.quantity) as nama_barang_quantity'), 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', 'tb_pembelian.status_pengantaran','tb_pembelian.status_pengantaran',
        'tb_pengantaran.alamat_pengantaran', 'users.name','users.email','users.phone', 'tb_pembayaran.metode_pembayaran', 'tb_pembayaran.keteranganTransfer', 'tb_pembayaran.gambar_transfer', 'tb_pembayaran.status_konfirmsi','tb_pengantaran.id_pengantaran', 'tb_pengantaran.nama_driver', 'tb_pengantaran.no_hp_driver')
        ->where('tb_pembelian.status_baru', 'baru')
        ->where('tb_pembayaran.status_konfirmsi', 'sudah')
        ->where('tb_pengantaran.status_pengiriman', 'Sedang Diproses')
        ->where('tb_pengantaran.no_hp_driver', NULL)
        // ->where('tb_pembelian.no_invoice', 'like', '%'.$noInvoice.'%')
        ->groupBy('tb_pembelian.no_invoice', 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', )
        ->orderBy('tb_pembelian.no_invoice', 'Desc')
        ->get();
    }

    public function getDataPengantaran($decryptKonfirmasi){
        return DB::table('tb_pembayaran')
        ->join('tb_pembelian', 'tb_pembelian.no_invoice', '=', 'tb_pembayaran.no_invoice')
        ->join('tb_keranjang', 'tb_keranjang.no_order', '=' , 'tb_pembelian.no_order')
        ->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
        ->join('users', 'users.id', '=', 'tb_pembelian.id_user')
        ->leftjoin('tb_pengantaran','tb_pengantaran.no_invoice', '=', 'tb_pembayaran.no_invoice')
        ->select('tb_pembayaran.id_pembayaran','tb_pembayaran.no_invoice', 'tb_pembayaran.metode_pembayaran', 'tb_pembayaran.keteranganTransfer', 'tb_pembayaran.gambar_transfer', 'tb_pembayaran.tggl_upload_bukti','tb_pembayaran.status_konfirmsi', 'tb_pembelian.grand_total', DB::RAW('GROUP_CONCAT(tb_pembelian.no_order," (", tb_produk.nama_barang ,")", "-",tb_pembelian.subTotal) as orderPembelian'), 'users.name','users.email', 'users.phone', 'tb_pengantaran.alamat_pengantaran')
        ->where('tb_pengantaran.id_pengantaran',$decryptKonfirmasi)
        ->where('tb_pengantaran.no_hp_driver', NULL)
        ->groupBy('tb_pembayaran.no_invoice')
        ->get();
    }

    public function cekStatusPengantaran($idPengantaran){
        return DB::table('tb_pengantaran')
        ->where('id_pengantaran',$idPengantaran)
        ->where('status_pengiriman', 'Sedang Diproses')
        ->count();
    }

    public function prosesUpdatePengantaran($updatePengantaran,$idPengantaran){
        DB::table('tb_pengantaran')
        ->where('id_pengantaran',$idPengantaran)
        ->update($updatePengantaran);
    }

    public function ambilPengantaranSudahDiproses(){
        return DB::table('tb_pembelian')
        ->join('users', 'users.id', '=', 'tb_pembelian.id_user')
        ->join('tb_keranjang', 'tb_keranjang.no_order', '=', 'tb_pembelian.no_order')
        ->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_keranjang.id_produk')
        ->leftJoin('tb_pengantaran', 'tb_pengantaran.no_invoice', '=', 'tb_pembelian.no_invoice')
        ->leftJoin('tb_pembayaran', 'tb_pembayaran.no_invoice', '=', 'tb_pembelian.no_invoice' )
        // ->join('tb_pengantaran', 'tb_pengantaran.no_invoice', '=', 'tb_pembelian.no_invoice')
        ->select('tb_pembelian.no_invoice',DB::raw('GROUP_CONCAT(tb_keranjang.no_order," ", tb_produk.nama_barang, " @", tb_keranjang.quantity) as nama_barang_quantity'), 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', 'tb_pembelian.status_pengantaran','tb_pembelian.status_pengantaran',
        'tb_pengantaran.alamat_pengantaran', 'users.name','users.email','users.phone', 'tb_pembayaran.metode_pembayaran', 'tb_pembayaran.keteranganTransfer', 'tb_pembayaran.gambar_transfer', 'tb_pembayaran.status_konfirmsi','tb_pengantaran.id_pengantaran', 'tb_pengantaran.nama_driver', 'tb_pengantaran.no_hp_driver')
        ->where('tb_pembelian.status_baru', 'baru')
        ->where('tb_pembayaran.status_konfirmsi', 'sudah')
        ->where('tb_pengantaran.status_pengiriman', 'Sedang Diproses')
        ->where('tb_pengantaran.no_hp_driver','!=', NULL)
        // ->where('tb_pembelian.no_invoice', 'like', '%'.$noInvoice.'%')
        ->groupBy('tb_pembelian.no_invoice', 'tb_pembelian.grand_total', 'tb_pembelian.tggl_pembelian', )
        ->orderBy('tb_pembelian.no_invoice', 'Desc')
        ->get();
    }
}
