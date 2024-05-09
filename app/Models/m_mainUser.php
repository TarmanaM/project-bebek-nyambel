<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_mainUser extends Model
{
    use HasFactory;

    public function ambilProdukLatest6(){
        return DB::table('tb_produk')
        ->orderBy('id_produk','DESC')
        ->limit(6)
        ->get();
    }
}
