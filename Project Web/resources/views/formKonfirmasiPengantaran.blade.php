@extends('adminThame.mainAdmin')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@section('title')
   Form Konfirmasi Pengantaran
@endsection

@section('content')

<div id="content">
    <div class="row">
        <div class="col-md-12">
            <form action=""></form>
            <div class="panel panel-visible">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class=""></span>Konfirmasi Driver</div>
                </div>
                <div class="panel-body pn">
                    @foreach ($getDataPengantaran as $fngetDataPengantaran)
                        <table class="table table-responsive">
                            <tr>
                                <td style="vertical-align: top">No Invoice</td>
                                <td style="vertical-align: top">:</td>
                                <td>{{$fngetDataPengantaran->no_invoice}}</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Data Pembeli</td>
                                <td style="vertical-align: top">:</td>
                                <td>{{$fngetDataPengantaran->name}} <br /> {{$fngetDataPengantaran->email}} <br />{{$fngetDataPengantaran->phone}} </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Data Order</td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    @foreach (explode(',', $fngetDataPengantaran->orderPembelian) as $hasilOrder)
                                        {{$hasilOrder }} <br />
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Grand Total</td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    {{$fngetDataPengantaran->grand_total}}
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top"><b>Info Pembayaran</b></td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    {{ strtoupper($fngetDataPengantaran->metode_pembayaran)}} <br /> <br />
                                    {!! $fngetDataPengantaran->keteranganTransfer !!} <br /> <br />
                                    <a href="{{asset('img/'. $fngetDataPengantaran->gambar_transfer)}}">
                                    <i class="fa fa-search"></i> Preview bukti tranfer</a> <br /> <br />
                                    {{$fngetDataPengantaran->tggl_upload_bukti}} <br />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"> <span class="badge bg-danger" style="width: 100%">
                                    Antarkan Ke Alamat {{$fngetDataPengantaran->alamat_pengantaran}}
                                </span></td>
                            </tr>
                            <tr>
                                <td colspan="3"> Form Informasi Driver</td>
                           </tr>
                           <form method="POST" action="prosesKonfirmasiPengantaran" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idPengantaran" value="{{$konfirmasi}}">
                                <input type="hidden" name="noInvoice" value="{{$fngetDataPengantaran->no_invoice}}">
                                <tr>
                                        <td style="vertical-align: top"><b>Nama Driver</b></td>
                                        <td style="vertical-align: top">:</td>
                                        <td>
                                            <input type="text" name="namaDriver" class="form-control" placeholder="Harap Inputkan Nama Driver Anda" id="">
                                            @error('namaDriver')
                                                <span class="badge bg-danger">{{$message}}</span>
                                            @enderror
                                        </td>

                                </tr>
                                <tr>
                                        <td style="vertical-align: top"><b>Nomor Hp Driver</b></td>
                                        <td style="vertical-align: top">:</td>
                                        <td>
                                            <input type="text" name="nomorHpDriver" class="form-control" placeholder="Harap Inputkan nomor Hp Driver" id="">
                                            @error('nomorHpDriver')
                                                <span class="badge bg-danger">{{$message}}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                <tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" name="tbKonfirmasi" class="btn btn-success">Konfirmasi</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    @endforeach
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
