@extends('userThame.mainUser')

@section('title')
    kontak
@endsection

@section('content')
<div class="container contactpage">
    <div class="two_third newsarticles">
      <div id="contactForm">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5204062365638!2d106.82037647499124!3d-6.326539393662987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed8cc8ab57cb%3A0xb8e05a64951962af!2sRumah%20Pohon%20Jagakarsa!5e0!3m2!1sid!2sid!4v1697517706801!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <form action="process.php" method="post" id="contact_form" />
          <div class="name">
            <label for="name">Your Name:</label>
            <p> Please enter your full name</p>
            <input id="name" name="email" type="text" placeholder="e.g. Mr. John Smith" required="" />
          </div>
          <div class="email">
            <label for="email">Your Email:</label>
            <p> Please enter your email address</p>
            <input id="email" name="email" type="email" placeholder="example@domain.com" required="" />
          </div>
          <div class="message">
            <label for="message">Your Message:</label>
            <p> Please enter your question</p>
            <textarea id="message" name="message" rows="6" cols="10" required=""></textarea>
          </div>
          <div id="loader">
            <input type="submit" value="Submit" />
          </div>
        </form>
      </div>
      <!-- end contactForm -->
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
