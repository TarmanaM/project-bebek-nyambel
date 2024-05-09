@extends('userThame.mainUser')

@php
    use Illuminate\Support\Facades\Crypt;
    $local=env('DB_HOST').":".env('DB_PORT');
    $conn=mysqli_connect($local,env('DB_USERNAME'),env('DB_PASSWORD'), env('DB_DATABASE'));
@endphp


@section('title')
    Chekout
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container contactpage">
    <div class="newsarticles">
        <section class="cbp-so-section">
            <article class="cbp-so-side cbp-so-side-right">
            <div class="title">
                <h3 class="center">Informasi Riwayat Pembelian Anda</h3>
                <hr>
                <form action="/cekPemesanan" method="GET" enctype="multipart/form-data">
                    @csrf
                   <div class="row">
                        <div class="col-10">
                            <input type="text" name="noInvoice"
                            placeholder="Inputkan Invoice yang Mau Dicari"
                            class="form-control"
                            value="{{$noInvoice}}"
                            style="width: 100%">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-info" name="tbCari">Pencarian</button>
                        </div>
                   </div>
                </form>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <td style="background-color: black; color:white">No Invoice</td>
                        <td style="background-color: black; color:white">Detail Produk</td>
                        <td style="background-color: black; color:white">Grand Total</td>
                        <td style="background-color: black; color:white">Info Pembelian</td>
                        <td style="background-color: black; color:white">Tanggal Pembelian</td>
                    </tr>
                    @foreach ($ambilData as $fnambilData)
                        <tr>
                            <td>{{$fnambilData->no_invoice}}</td>
                            <td>
                                @foreach (explode(',', $fnambilData->nama_barang_quantity) as $barang_quantity)
                                    {{$barang_quantity}} Pcs<br>
                                @endforeach
                               {{-- {{ $fnambilData->nama_barang_quantity}} --}}
                            </td>
                            <td>Rp. {{number_format($fnambilData->grand_total,0)}}</td>
                            <td>

                                Pesanan: {{$fnambilData->status_pengantaran}}
                                @if (!empty ($fnambilData->alamat_pengantaran))
                                    <hr />
                                    {{$fnambilData->alamat_pengantaran}}
                                @endif


                            </td>
                            <td>{{date('d-M-Y H:i:s', strtotime($fnambilData->tggl_pembelian))}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-md-offset-1">


                        </div>
                    </div>
                </div>
            </div>
            </article>
        </section>
    </div>

  </div>
  <script type="text/javascript">
    function myFunction(){
        var subTotal=parseInt(document.getElementById('subTotal').value);
        var ekspedisi=document.getElementById('pengiriman').value;
        var fnEkspedisi=0;
        var grandTotal=0;
        if (ekspedisi==="") {
            fnEkspedisi=0;
            document.getElementById('test').hidden=true;
            document.getElementById('test2').hidden=true;
        }else if(ekspedisi==="Diantar"){
            fnEkspedisi=15000;
            document.getElementById('test').hidden=true;
            document.getElementById('test2').hidden=true;
        }
        else if(ekspedisi==="Ambil Sendiri"){
            fnEkspedisi=0;
            document.getElementById('test').hidden=true;
            document.getElementById('test2').hidden=true;
        }else{
            fnEkspedisi=0;
            document.getElementById('test').hidden=false;
            document.getElementById('test2').hidden=true;
        }
        grandTotal=fnEkspedisi+subTotal;
        console.log(grandTotal);
        document.getElementById('totalEkspedisi').innerHTML="Ongkos Kirim Anda Rp. " + fnEkspedisi;
        document.getElementById('ekspedisiHidden').innerHTML="<input type='hidden' name='ongkosKirim' value='"+fnEkspedisi+"'>";
        document.getElementById('grandTotal').innerHTML="Total Yang Dibayarkan Rp. " + grandTotal;
        document.getElementById('totalHidden').innerHTML="<input type='hidden' name='grandtotal' value='"+grandTotal+"'>";
        location.refresh(true);
    }
  </script>
@endsection
