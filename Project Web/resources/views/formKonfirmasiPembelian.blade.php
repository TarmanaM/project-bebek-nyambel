@extends('adminThame.mainAdmin')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@section('title')
   Form Konfirmasi Pembelian
@endsection

@section('content')

<div id="content">
    <div class="row">
        <div class="col-md-12">
            <form action=""></form>
            <div class="panel panel-visible">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class=""></span>Konfirmasi Pembelian</div>
                </div>
                <div class="panel-body pn">
                    @foreach ($getDataPembayaran as $fngetDataPembayaran)
                        <table class="table table-responsive">
                            <tr>
                                <td style="vertical-align: top">No Invoice</td>
                                <td style="vertical-align: top">:</td>
                                <td>{{$fngetDataPembayaran->no_invoice}}</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Data Pembeli</td>
                                <td style="vertical-align: top">:</td>
                                <td>{{$fngetDataPembayaran->name}} <br /> {{$fngetDataPembayaran->email}} <br />{{$fngetDataPembayaran->phone}} </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Data Order</td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    @foreach (explode(',', $fngetDataPembayaran->orderPembelian) as $hasilOrder)
                                        {{$hasilOrder }} <br />
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Grand Total</td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    {{$fngetDataPembayaran->grand_total}}
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top"><b>Info Pembayaran</b></td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    {{ strtoupper($fngetDataPembayaran->metode_pembayaran)}} <br /> <br />
                                    {!! $fngetDataPembayaran->keteranganTransfer !!} <br /> <br />
                                    <a href="{{asset('img/'. $fngetDataPembayaran->gambar_transfer)}}">
                                    <i class="fa fa-search"></i> Preview bukti tranfer</a> <br /> <br />
                                    {{$fngetDataPembayaran->tggl_upload_bukti}} <br />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"> Form Konfirmasi Pembelian</td>
                           </tr>
                           <tr>
                                <td style="vertical-align: top"><b>Status Konfirmasi</b></td>
                                <td style="vertical-align: top">:</td>
                                <td>
                                    @php
                                        $arStatus = array('sudah', 'tolak');
                                    @endphp
                                    <form method="POST" action="prosesKonfirmasiPembelian" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="idPembayaran" value="{{$konfirmasi}}">
                                        <input type="hidden" name="noInvoice" value="{{$fngetDataPembayaran->no_invoice}}">
                                        <select name="statusKonfirmasi" id="" class="form-control">
                                                <option value="">Pilih Status Konfirmasi</option>
                                                @foreach (range(0,1) as $i)
                                                    @if (old('statusKonfirmasi')==$arStatus[$i])
                                                        <option value="{{$arStatus[$i]}}" selected="selected" >{{$arStatus[$i]}}</option>
                                                    @else
                                                        <option value="{{$arStatus[$i]}}">{{$arStatus[$i]}}</option>
                                                    @endif

                                                @endforeach
                                        </select>
                                        <div align="right">
                                            @error('statusKonfirmasi')
                                                <span class="badge bg-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <br />
                                        <button type="submit" name="tbProses" class="btn btn-success">Proses</button>
                                    </form>
                                </td>
                           </tr>
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
