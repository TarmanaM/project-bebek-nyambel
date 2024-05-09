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
    <div class="two_third newsarticles">
        <section class="cbp-so-section">
            <article class="cbp-so-side cbp-so-side-right">
            <div class="title">
                <h2 class="center">Selesaikan Proses Pembelian</h2>
                <h4>Isi Form Yang Tersedia Untuk Selesaikan Pembelian</h4>
            </div>

            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-md-offset-1">

                            <form clas="form-horizontal" method="POST" action="/keranjangBelanja/checkout" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <div class="card">
                                    <div class="card-body">
                                        @php
                                            $total=0;
                                            $totalPembelian=0;
                                            $no=1;
                                        @endphp
                                        @foreach ($allKeranjangBelanja as  $fnallKeranjangBelanja)
                                            @php
                                                $idUser=Auth()->user()->id;
                                                $idProduk=$fnallKeranjangBelanja->id_produk;
                                                $ambilData=mysqli_fetch_row(mysqli_query($conn,"Select sum(quantity) as quantity from tb_keranjang where id_produk='$idProduk' and status_pembelian='Baru' and id_user='$idUser'"));
                                                $sumQuantity=$ambilData[0];

                                                $total=$sumQuantity*$fnallKeranjangBelanja->harga_produk;
                                                $totalPembelian=$totalPembelian+$total;
                                            @endphp
                                            <table class="table table-hover" style="width: 100%">
                                                <tr>
                                                    <td class="col-sm-3 col-md-3" style="vertical-align: top">
                                                        <input type="hidden" name="noOrder{{$no}}" value="{{$fnallKeranjangBelanja->no_order}}">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('img/'.$fnallKeranjangBelanja->foto_produk)}}" style="width: 150px; height: 72px;"> </a>
                                                    </td>
                                                    <td class="col-sm-9 col-md-9" style="vertical-align: top">
                                                        <h4 class="media-heading">
                                                            <a href="#">
                                                                {{$fnallKeranjangBelanja->nama_barang}} - Rp. {{number_format($fnallKeranjangBelanja->harga_produk,0)}}
                                                            </a>
                                                        </h4>
                                                        {{$sumQuantity}} Porsi - Total Rp. {{number_format($total,0)}}
                                                    </td>
                                                </tr>
                                            </table>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                        <b>Subtotal</b> - Rp. {{number_format($totalPembelian,0)}}
                                            <input type="hidden" name="subTotal" id="subTotal" value="{{$totalPembelian}}">
                                        <br />
                                        <font size="-2">
                                            <a href="/keranjangBelanja" style="text-decoration: none"><i class="fa fa-arrow-left"></i> Keranjang Belanja</a>
                                        </font>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6" >
                                        <div class="card">
                                            <div class="card-body">
                                                <b>Nama Member:</b> {{Auth()->user()->name}}
                                                <br />
                                                <b>Nomor HP:</b> {{Auth()->user()->phone}}
                                                <br />
                                                <b>Email:</b> {{Auth()->user()->email}}
                                                <hr />
                                                Pengiriman (Ekspedisi)<br />
                                                <select name="pengiriman" id="pengiriman" onChange="myFunction()" class="form-control">
                                                    <option value="">Pilih Pengiriman</option>
                                                    @php
                                                    $ekspedisi =array("Diantar", "Ambil Sendiri");
                                                    @endphp
                                                    @foreach (range(0,1) as $i)
                                                        @if (old('pengiriman')==$ekspedisi[$i])
                                                            <option value="{{$ekspedisi[$i]}}" selected>{{$ekspedisi[$i]}}</option>
                                                        @else
                                                            <option value="{{$ekspedisi[$i]}}">{{$ekspedisi[$i]}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('pengiriman')
                                                    <span class="badge bg-danger">{{$message}}</span>
                                                @enderror

                                                <div id="test">
                                                    <font size="-2"><p>Ongkos Kirim Anda Rp.{{old('ongkosKirim')}}</p>
                                                    </font>
                                                </div>
                                                <font size="-2">
                                                    <p id="totalEkspedisi"></p>
                                                    <div id="ekspedisiHidden"></div>
                                                </font>


                                                Alamat Lengkap <br />
                                                <textarea name="alamatLengkap" id="" class="form-control">{{old('alamatLengkap')}}</textarea>
                                                @error('alamatLengkap')
                                                    <span class="badge bg-danger">{{$message}}</span>
                                                @enderror
                                                <br />

                                                <div id="test2">
                                                    @php
                                                        $ongkir=old('ongkosKirim');
                                                        $subTotal=old('subTotal');
                                                        $grand=$ongkir+$subTotal;
                                                    @endphp
                                                    <font size="-2"><h6>Total Yang Dibayarkan Rp. {{$grand}}</h6>
                                                    </font>
                                                </div>

                                                <h6 id="grandTotal"></h6>
                                                <div id="totalHidden"></div>
                                                <font size="-2">* Include Ongkos Kirim</font>
                                                <hr />
                                                Silahkan Transfer Uang Pembelian Anda ke Rekening Bank Bebek Nyambel
                                                <br />
                                                <b>Nama Bank : BCA <br />
                                                Pemilik: Agung Wicaksana <br />
                                                No Rekening: 11111111 </b> <br />
                                                <hr>
                                                Upload Bukti Transfer Anda
                                                <input type="file" name="buktiTransfer" class="from-control" id="">
                                                    @error('buktiTransfer')
                                                        <span class="badge bg-danger">{{$message}}</span>
                                                    @enderror
                                                <br><br />
                                                Keterangan Tranfer
                                                <textarea name="keteranganTransfer" id="" cols="30" rows="10" placeholder="Inputkan Keterangan Transfer seperti Asal Bank, Nama yang mentransfer, kapan melakukan proses transfer" class="form-control"></textarea>
                                                @error('keteranganTransfer')
                                                    <span class="badge bg-danger">{{$message}}</span>
                                                @enderror
                                                <br>
                                                <button type="submit" id="proses" onClick="myFunction()" name="tbProses" class="btn btn-success" value="Proses">Proses</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </article>
        </section>
    </div>
    <aside>
      <div class="one_third lastcolumn newssidebar">
        <div class="inner">
          <div class="home-welcome">
            <h3>Selamat Datang di Bebek Nyambel</h3>
            <h4>Buka Setiap Hari <br />
              14.00-22.00</h4>
          </div>
          <img src="user/images/product6.jpg" alt="img01" />
          <div class="home-event-one">
            <h3>Join our Mailing list</h3>
            <div class="clearfix">
              <div id="mc_embed_signup">
                <form action="http://anarieldesign.us5.list-manage2.com/subscribe/post?u=91beeeb55ba321b040f8c583c&amp;id=1cead7613e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="" />
                  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required="" />
                  <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" />
                </form>
              </div>
            </div>
          </div>
          <div>
            <h3>Latest Events</h3>
            <section class="slider">
              <div class="flexslider">
                <ul class="slides">
                  <li><img src="user/images/slide1.jpg" alt="" /> </li>
                  <li><img src="user/images/slide2.jpg" alt="" /> </li>
                </ul>
                <ul class="flex-direction-nav">
                  <li><a class="flex-prev" href="#">Previous</a></li>
                  <li><a class="flex-next" href="#">Next</a></li>
                </ul>
              </div>
              <!-- flexslider ends here -->
            </section>
            <article class="cbp-so-side cbp-so-side-right">
              <h3>Viris fuisset insol!</h3>
              <h4 class="date">Jan 15, 2014</h4>
              <p>Lorem ipsum dolor sit amet, ius cibo ludus conclusionemque ad, his ad elit time cum at vide incorrupte. Autem ancillae ...</p>
              <a class="morebutton" href="http://www.anarieldesign.com/themes/">Read more</a> </article>
          </div>
        </div>
      </div>
    </aside>
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
