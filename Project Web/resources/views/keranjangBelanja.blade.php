@extends('userThame.mainUser')

@php
    use Illuminate\Support\Facades\Crypt;
    $local=env('DB_HOST').":".env('DB_PORT');
    $conn=mysqli_connect($local,env('DB_USERNAME'),env('DB_PASSWORD'),env('DB_DATABASE'));
@endphp


@section('title')
    Keranjang Belanja
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
                <h2 class="center">Keranjang Belanja Anda</h2>
                <h4>Lakukan Konfirmasi Pembelian Jika Sudah Sesuai</h4>
            </div>
            @if($tampilPesan=="successDelete")
                <span class="badge bg-success">
                    Keranjang Belanja Yang Anda Pilih Telah Berhasil Dihapus
                </span>
            @endif
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-md-offset-1">
                            @if($tampilPesan=="successPembelian")
                                <div align="center">
                                    <img src="{{asset('img/suksesPay.png')}}" style="width:700px" alt="" srcset="">
                                    <br />
                                    <b>
                                    Selamat Pembelian Anda Telah Berhasil Di Proses<br />
                                    Silahkan Lakukan Pembelian Yang Lain Jika Anda Menginginkannya<br />
                                    Terima Kasih</b>
                                </div>
                            @else
                                @if($allKeranjangBelanja=="[]")
                                    <div align="center">
                                        <img src="{{asset('img/emptyCart.png')}}" style="width: 340px" alt="" srcset="">
                                        <br />
                                        <b>Maaf. Keranjang Belanja Anda Kosong</b>
                                    </div>
                                @else
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Total</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total=0;
                                                $totalPembelian=0;
                                            @endphp
                                            @foreach ($allKeranjangBelanja as  $fnallKeranjangBelanja)
                                                @php
                                                    $idUser= Auth()->user()->id;
                                                    $idProduk=$fnallKeranjangBelanja->id_produk;

                                                    $ambilData=mysqli_fetch_row(mysqli_query($conn,"Select sum(quantity) as quantity from tb_keranjang where id_produk='$idProduk' and status_pembelian='Baru' and id_user='$idUser'" ));
                                                    $sumQuantity=$ambilData[0];

                                                    $total=$sumQuantity*$fnallKeranjangBelanja->harga_produk;
                                                    $totalPembelian=$totalPembelian+$total;
                                                @endphp
                                                <tr>
                                                    <td class="col-sm-6 col-md-6">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('img/'.$fnallKeranjangBelanja->foto_produk)}}" style="width: 72px; height: 72px;"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">{{$fnallKeranjangBelanja->nama_barang}}</a></h4>
                                                        </div>
                                                    </div></td>
                                                    <td class="col-sm-1 col-md-1">
                                                        {{$sumQuantity}}
                                                    </td>
                                                    <td class="col-sm-2 col-md-2 text-center"> Rp. {{number_format($fnallKeranjangBelanja->harga_produk,0)}}</td>
                                                    <td class="col-sm-2 col-md-2 text-center">Rp. {{number_format($total,0)}}</td>
                                                    <td class="col-sm-1 col-md-1">
                                                        <a href="/keranjangBelanja?dropId={{crypt::encryptString($fnallKeranjangBelanja->id_keranjang)}}">
                                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                            @error('dropId')
                                                                <span class="badge bg-danger">{{$message}}</span>
                                                            @enderror
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            <tr>
                                                <td>   </td>
                                                <td>   </td>
                                                <td><h5>Subtotal</h5></td>
                                                <td class="text-right" colspan="2"><h5>Rp. {{number_format($totalPembelian,0)}}</h5></td>
                                            </tr>
                                            <tr>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>
                                                    <font size="-2">
                                                        <a href="/Menu" style="text-decoration: none"><i class="fa fa-plus"></i> Produk</a>
                                                    </font>
                                                </td>
                                                <td>
                                                    <a href="keranjangBelanja?checkOut=ok">
                                                        <button type="button" class="btn btn-success">
                                                            Checkout <span class="glyphicon glyphicon-play"></span>
                                                        </button>
                                                    </a>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            @endif
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
@endsection
