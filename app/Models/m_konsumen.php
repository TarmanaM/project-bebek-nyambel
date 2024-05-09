<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_konsumen extends Model
{
    use HasFactory;
    public function ambilKonsumen(){
        return DB::table('users')
        ->select('users.id', 'users.name', 'users.phone', 'users.email')
        ->where('level', 'pembeli')
        ->get();
    }
    public function ambilPembelian($userId){
        return DB::table('tb_pembelian')
        ->select('no_order', 'no_invoice')
        ->where('id_user',$userId)
        ->get();
    }
    public function dropPembayaranPengantaran($noInvoice){
        DB::table('tb_pembayaran')
        ->where('no_invoice', $noInvoice)
        ->delete();

        DB::table('tb_pengantaran')
        ->where('no_invoice', $noInvoice)
        ->delete();
    }
    public function dropKeranjangPembelian($userId){
        DB::table('tb_keranjang')
        ->where('id_user', $userId)
        ->delete();

        DB::table('tb_pembelian')
        ->where('id_user', $userId)
        ->delete();

        DB::table('users')
        ->where('id', $userId)
        ->delete();
    }
}
