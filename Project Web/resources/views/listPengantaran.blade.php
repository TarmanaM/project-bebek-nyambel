@extends('adminThame.mainAdmin')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@section('title')
    List Pengantaran
@endsection

@section('content')

<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List Pengantaran Baru</div>
                </div>
                <div class="panel-body pn">
                    <a href="/listPengantaran/pengantaranSudahDiproses">
                        <button class="btn btn-default" style="margin-left: 10px; margin-top:10px; margin-bottom:10px" > <i class="fa fa-check"></i>
                            PENGANTARAN SUDAH DIPROSES
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
                                <th>Info Driver</th>
                                <th>Tindakan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambilPengantaran as $fnambilPengantaran )
                                <tr>
                                    <td style="vertical-align: top">{{$fnambilPengantaran->name}} <br />{{$fnambilPengantaran->email}} <br /> {{$fnambilPengantaran->phone}}</td>
                                    <td style="vertical-align: top">{{$fnambilPengantaran->no_invoice}}</td>
                                    <td style="vertical-align: top">
                                        @foreach (explode(',', $fnambilPengantaran->nama_barang_quantity) as $barang_quantity)
                                            {{$barang_quantity}} Pcs<br>
                                        @endforeach</td>
                                    <td style="vertical-align: top">
                                        Pesanan: {{$fnambilPengantaran->status_pengantaran}}
                                        @if (!empty ($fnambilPengantaran->alamat_pengantaran))
                                            <br />
                                            {{$fnambilPengantaran->alamat_pengantaran}}
                                        @endif</td>
                                    <td style="vertical-align: top">Grand Total:
                                        Rp. {{$fnambilPengantaran->grand_total}}
                                        <br />
                                        Metode : {{$fnambilPengantaran->metode_pembayaran}}<br />
                                        {!! $fnambilPengantaran->keteranganTransfer !!} <br />
                                        <i class="fa fa-search"></i> <a href="{{asset('img/'.$fnambilPengantaran->gambar_transfer)}}">Bukti Transfer</a>
                                        <p>
                                            <br />Status Konfirmasi: {{ $fnambilPengantaran->status_konfirmsi}}
                                        </p>
                                    </td>
                                    <td style="vertical-align: top">
                                        @if (empty($fnambilPengantaran->nama_driver) && empty($fnambilPengantaran->no_hp_driver))
                                            Driver belum ditentukan
                                        @endif
                                    </td>
                                    <td style="vertical-align: top">
                                        <a href="/listPengantaran?konfirmasi={{crypt::encryptString ($fnambilPengantaran->id_pengantaran)}}" >
                                            <button class="btn btn-info">Konfirmasi</button>
                                        </a>
                                    </td>
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
