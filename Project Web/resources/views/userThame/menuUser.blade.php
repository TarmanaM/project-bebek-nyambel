<!--Content Part - Navigation and Logo ==================================================
================================================== -->

<div class="header">
    <div style="width: 100% ; background-color:white" class="">
        <div class="row">
            <div class="col-sm-12" style="text-align: right; margin-right:50px">
                @if (isset(Auth()->user()->level))
                    <b>Hi. {{ Auth()->user()->name}}</b>
                    |
                    @if (Auth()->user()->level == 'Admin')
                        <a href="/dashboard" style="text-decoration: none"> Dashboard Admin <i class="fa fa-forward"></i></a>
                    @else
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="text-decoration: none"> <i class="bi bi-person-lock"> </i> Logout </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif

                @else
                    <a href="/daftar" style="text-decoration: none"> <i class="bi bi-person-plus"> </i> Daftar </a>|
                    <a href="/masuk" style="text-decoration: none"> <i class="bi bi-person-check"> </i> Masuk</a>
                @endif
                &nbsp;&nbsp;&nbsp;
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
        @if (isset(Auth()->user()->name))
            <li><a href="/Menu">Menu</a></li>
        @else
            <li><a href="/MenuUmum">Menu</a></li>
        @endif

        @if (isset(Auth()->user()->name))
            <li><a href="/cekPemesanan">Cek Pemesanan</a></li>
        @else
            <li><a href="/masuk">Cek Pemesanan</a></li>
        @endif


          <li><a href="/review">Review</a></li>
          <li><a href="/kontak">Kontak</a></li>
        </ul>
        <!-- Responsive Menu -->
      </nav>
    </div>
    <!-- container ends here -->
</div>
