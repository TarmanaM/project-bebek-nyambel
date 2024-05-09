@extends('userThame.mainUser')

@section('title')
    Selamat Datang Di Bebek Nyambel
@endsection

@section('content')
<section class="slider">
    <div class="flexslider">
      <ul class="slides">
        <li><img src="{{asset('user/images/bg3.jpg')}}" alt="" /> </li>
        <li><img src="{{asset('user/images/bg6.jpg')}}" alt="" /> </li>
      </ul>
      <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="#">Previous</a></li>
        <li><a class="flex-next" href="#">Next</a></li>
      </ul>
    </div>
    <!-- flexslider ends here -->
  </section>

  <!-- Welcome Message ==================================================
  ================================================== -->
  <div id="cbp-so-scroller" class="cbp-so-scroller cbp-so-scroller clearfix">
    <div class="container">
      <section class="cbp-so-section">
        <div class="one_half">
          <article class="cbp-so-side cbp-so-side-left">
            <h2>Welcome to Winery</h2>
            <p class="special">Uniqueness, classy and creative design is our passion and our passion makes!</p>
            <p>Design is art and art should never ever be generic. Uniqueness, classy and creative design is our passion and our passion makes you different and us proud!</p>
            <a class="homebutton" href="http://www.anarieldesign.com/themes/">Read more about us</a> </article>
        </div>
        <div class="one_half lastcolumn">
          <figure class="cbp-so-side cbp-so-side-right"> <img src="{{asset('user/images/winegear.jpg')}}" alt="img01" /> </figure>
        </div>
      </section>
      <!-- cbp-so-section ends here -->
    </div>
    <!-- container ends here -->

    <!-- History ==================================================
  ================================================== -->
    <div class="bg">
      <div class="container">
        <section class="cbp-so-section">
          <div class="one_half">
            <figure class="cbp-so-side cbp-so-side-left">
              <h2 class="transparent">Events</h2>
            </figure>
          </div>
          <div class="one_half lastcolumn">
            <article class="cbp-so-side cbp-so-side-right">
              <h4 class="date">Jan 15, 2014</h4>
              <p class="special">Viris fuisset insol!</p>
              <p>Lorem ipsum dolor sit amet, ius cibo ludus conclusionemque ad, his ad elit time cum at vide incorrupte. Autem ancillae ...</p>
              <br />
              <a class="morebutton" href="http://www.anarieldesign.com/themes/">Read more</a> </article>
          </div>
        </section>
        <!-- cbp-so-section ends here -->
      </div>
      <!-- container ends here -->
    </div>
    <!-- bg ends here -->
  </div>
  <!-- cbp-so-scroller ends here -->
  <!-- Latest Events News ==================================================
  ================================================== -->
  <div id="cbp-so-scroller1" class="cbp-so-scroller clearfix">
    <div class="container">
      <section class="cbp-so-section">
        <div class="one_half">
          <article class="cbp-so-side cbp-so-side-left">
            <h2>Reserve Tasting</h2>
            <p class="special">Neque porro quisquam ipsum!</p>
            <p>Lorem ipsum dolor sit amet, ius cibo ludus conclusionemque ad, his ad elit time cum at vide incorrupte. Autem ancillae his ad elit time cum at vide incorrupte.</p>
            <a class="homebutton" href="http://www.anarieldesign.com/themes/">Reserve now</a> </article>
        </div>
        <div class="one_half lastcolumn">
          <figure class="cbp-so-side cbp-so-side-right"> <img src="{{asset('user/images/lebel.jpg')}}" alt="img01" /> </figure>
        </div>
      </section>
      <!-- cbp-so-section ends here -->
    </div>
    <!-- container ends here -->
    <!-- Info ==================================================
  ================================================== -->
    <div class="bg1 title">
      <div class="container">
        <section class="cbp-so-section">
          <div class="one_third">
            <article class="cbp-so-side cbp-so-side-left">
              <div class="home-welcome">
                <h3>Welcome to Winery <br />
                  Good Ol' Wine</h3>
                <h4>Open Daily <br />
                  12:00am-8:00pm</h4>
              </div>
            </article>
          </div>
          <div class="one_third">
            <article class="cbp-so-side cbp-so-side-left home-banner-event">
              <div class="home-event-date">
                <h3>January</h3>
                <h4>19</h4>
              </div>
              <div class="home-event-description">
                <h4>Putent &amp; delectus</h4>
                <a href="#">Lorem ipsum dolor sit amet, ius cibo ludus...</a> </div>
            </article>
          </div>
          <div class="one_third lastcolumn">
            <article class="cbp-so-side cbp-so-side-right">
              <div class="home-event-one">
                <h3>Join our <br />
                  Mailing list</h3>
                <div id="mc_embed_signup">
                  <form action="http://anarieldesign.us5.list-manage2.com/subscribe/post?u=91beeeb55ba321b040f8c583c&amp;id=1cead7613e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="" />
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required="" />
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" />
                  </form>
                </div>
              </div>
            </article>
          </div>
        </section>
        <!-- cbp-so-section ends here -->
      </div>
      <!-- container ends here -->
    </div>
    <!-- bg1 ends here -->

    <!-- Wines ==================================================
  ================================================== -->
    <div class="container wines">
      <section class="cbp-so-section">
        <article class="cbp-so-side cbp-so-side-right">
          <div class="title">
            <h2 class="center">Produk Kami</h2>
            <h4>Makanan dan Minumam Fresh Oven 100%</h4>
          </div>
          <div class="main">
            <ul class="cbp-ig-grid">
                @foreach ($ambilProdukLatest6 as $fnambilProdukLatest6)
                <li> <a href="#"> <img src="{{asset('img/'.$fnambilProdukLatest6->foto_produk)}}" alt="img01" style="width: 320px ; height: 270px"/>
                    <h3 class="cbp-ig-title">{{$fnambilProdukLatest6->nama_barang}}</h3>
                    <span class="cbp-ig-category">Hanya Rp. {{number_format($fnambilProdukLatest6->harga_produk,0)}} / Porsi</span> </a> </li>
                @endforeach
            </ul>
          </div>
        </article>
      </section>
      <!-- cbp-so-section ends here -->
    </div>
    <!-- container ends here -->
  </div>
@endsection
