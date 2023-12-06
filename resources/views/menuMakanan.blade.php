@extends('userThame.mainUser')

@section('title')
    Menu 
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
                <h2 class="center">Menu Bebek Nyambel</h2>
                <h4>Pilih Menu Makanan dan Minuman Kesukaan Anda</h4>
            </div>
            <div class="main">
                <div class="card-group">
                    @foreach ($allProduk as $fnallProduk)
                        <div class="card">
                            <img src="{{asset('img/'.$fnallProduk->foto_produk)}}" class="card-img-top" alt="..." style="height: 280px">
                            <div class="card-body">
                            <h5 class="card-title">Rp. {{number_format($fnallProduk->harga_produk,0)}} /Porsi</h5>
                            <p class="card-text">{{$fnallProduk->nama_barang}}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">
                                    <form action="/prosesPickProduk" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="idProduk" value="{{$fnallProduk->id_produk}}">
                                        <input type="number" name="qty" min="1" max="{{$fnallProduk->stok}}">
                                        <button type="submit" name="tbPick" class="btn btn-danger">
                                            <i class="fa fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </small>
                            </div>
                        </div>
                    @endforeach
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
              @if($allKeranjangBelanja!="[]")
                <hr />
                @php
                    $totalQuantity=0;
                    $totalPembelian=0;
                @endphp
                @foreach ($allKeranjangBelanja as $fnallKeranjangBelanja)
                    @php
                        $totalQuantity=$totalQuantity+$fnallKeranjangBelanja->quantity;
                        $totalPembelian=$totalPembelian+($fnallKeranjangBelanja->quantity*$fnallKeranjangBelanja->harga_produk);
                    @endphp
                @endforeach
                <a href="/keranjangBelanja">
                    <button class="btn btn-info" title="KLik Untuk Lihat List Pembelian">
                        <i class="fa fa-cart-plus"></i> {{$totalQuantity}} Pembelian ({{$totalPembelian}})
                    </button>
                </a>
                <hr />
              @endif
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
