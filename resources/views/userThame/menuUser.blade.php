<!--Content Part - Navigation and Logo ==================================================
================================================== -->

<div class="header">
    <div style="width: 100% ; background-color:white" class="">
        <div class="row">
            <div class="col-sm-12" style="text-align: right; margin-right:50px">
                @if (isset(Auth()->user()->level))
                    <b>Hi. {{ Auth()->user()->name}}</b>|  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="bi bi-person-plus"> </i> Logout </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                @else
                    <a href="/daftar"><i class="bi bi-person-plus"> </i> Daftar </a>|
                    <a href="/masuk"> <i class="bi bi-person-check"> </i> Masuk</a>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
      <div class="logo"> <a href="/">
        <h1>Bebek Nyambel</h1>
        <h4>Enaknya bikin Nagih....</h4>
        </a> </div>
      <!-- Nav -->
      <nav id="navigation">
        <ul id="nav">
          <li><a href="/">Utama</a></li>
          <li><a href="/Menu">Menu</a></li>
          <li><a href="/cekPemesanan">Cek Pemesanan</a></li>
          <li><a href="/review">Review</a></li>
          <li><a href="/kontak">Kontak</a></li>
        </ul>
        <!-- Responsive Menu -->
      </nav>
    </div>
    <!-- container ends here -->
</div>
