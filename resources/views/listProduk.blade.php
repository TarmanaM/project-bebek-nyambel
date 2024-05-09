@extends('adminThame.mainAdmin')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@section('title')
    List Produk
@endsection

@section('content')

<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List Produk</div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Paket</th>
                                <th>Gambar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambilDataProduk as $fnambilDataProduk )
                                <tr>
                                    <td>{{$fnambilDataProduk->kode_barang}}</td>
                                    <td>{{$fnambilDataProduk->nama_barang}}</td>
                                    <td>{{$fnambilDataProduk->kategori}}</td>
                                    <td>{{$fnambilDataProduk->harga_produk}}</td>
                                    <td>{{$fnambilDataProduk->stok}}</td>
                                    <td>{{$fnambilDataProduk->paket}} {{$fnambilDataProduk->satuan}}</td>
                                    <td><img src="{{asset('img/'.$fnambilDataProduk->foto_produk)}}" style="width: 100px"></td>
                                    <td>
                                        <a href="/listProduk?dropId={{crypt::encryptString ($fnambilDataProduk->id_produk)}}">
                                            <button class="btn btn-danger">  <i class="fa fa-trash"></i></button>
                                        </a>

                                        <a href="/editProduk?updateId={{crypt::encryptString($fnambilDataProduk->id_produk)}}">
                                            <button class="btn btn-success">  <i class="fa fa-edit"></i></button>
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
