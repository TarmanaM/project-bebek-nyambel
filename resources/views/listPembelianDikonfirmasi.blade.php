@extends('adminThame.mainAdmin')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@section('title')
    List Pembelian Dikonfirmasi
@endsection

@section('content')

<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List Pembelian Dikonfirmasi |
                        <a href="/listPembelian"><i class="fa fa-backward"></i> Semua List</a>
                     </div>
                </div>
                <div class="panel-body pn">
                    <a href="/listPembelian/pembelianDikonfirmasi">
                        <button class="btn btn-default" style="margin-left: 10px; margin-top:10px; margin-bottom:10px" > <i class="fa fa-check"></i>
                            PEMBELIAN
                            DIKONFIRMASI
                        </button>
                    </a>
                    <a href="/listPembelian/pembelianDitolak">
                        <button class="btn btn-default" style="margin-left: 10px; margin-top:10px; margin-bottom:10px" > <i class="fa fa-ban"></i>
                            PEMBELIAN
                            DITOLAK
                        </button>
                    </a>
                    <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Data Pembeli</th>
                                <th>No invoice</th>
                                <th>Data Produk</th>
                                <th>Pengiriman</th>
                                <th>Pembayaran</th>
                                <th>Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambilPembelianDikonfirmasi as $fnambilPembelian )
                                <tr>
                                    <td style="vertical-align: top">{{$fnambilPembelian->name}} <br />{{$fnambilPembelian->email}} <br /> {{$fnambilPembelian->phone}}</td>
                                    <td style="vertical-align: top">{{$fnambilPembelian->no_invoice}}</td>
                                    <td style="vertical-align: top">
                                        @foreach (explode(',', $fnambilPembelian->nama_barang_quantity) as $barang_quantity)
                                            {{$barang_quantity}} Pcs<br>
                                        @endforeach</td>
                                    <td style="vertical-align: top">
                                        Pesanan: {{$fnambilPembelian->status_pengantaran}}
                                        @if (!empty ($fnambilPembelian->alamat_pengantaran))
                                            <br />
                                            {{$fnambilPembelian->alamat_pengantaran}}
                                        @endif</td>
                                    <td style="vertical-align: top">Grand Total:
                                        Rp. {{$fnambilPembelian->grand_total}}
                                        <br />
                                        Metode : {{$fnambilPembelian->metode_pembayaran}}<br />
                                        {!! $fnambilPembelian->keteranganTransfer !!} <br />
                                        <i class="fa fa-search"></i> <a href="{{asset('img/'.$fnambilPembelian->gambar_transfer)}}">Bukti Transfer</a>
                                    </td>
                                    <td style="vertical-align: top"> {{ strtoupper($fnambilPembelian->status_konfirmsi)}} DIKONFIRMASI</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">List Produk</span>
                </div>
                <div class="panel-body">
                    <table border="1">
                        <tr>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Kategori</td>
                            <td>Stok</td>
                            <td>Paket</td>
                            <td>Deskripsi</td>
                            <td>Harga Produk</td>
                        </tr>
                        @foreach ($ambilDataProduk as $fnambilProduk )
                            <tr>
                                <td>{{$fnambilProduk->kode_barang}}</td>
                                <td>{{$fnambilProduk->nama_barang}}</td>
                                <td>{{$fnambilProduk->kategori}}</td>
                                <td>{{$fnambilProduk->stok}}</td>
                                <td>{{$fnambilProduk->paket}}</td>
                                <td>{{$fnambilProduk->deskripsi_produk}}</td>
                                <td>{{$fnambilProduk->harga_produk}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</div> --}}
@endsection
