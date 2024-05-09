 <!-- Start: Header -->
 <header class="navbar navbar-fixed-top bg-light">
    <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html"> <b>Admin</b>Designs
        </a>
        <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
        <ul class="nav navbar-nav pull-right hidden">
            <li>
                <a href="#" class="sidebar-menu-toggle">
                    <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                </a>
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/5.jpg" alt="avatar" class="mw30 br64 mr15">
                <span>{{Auth()->user()->name}}</span>
                <span class="caret caret-tp"></span>
            </a>
            <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                <li class="br-t of-h">
                    <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                        <span class="fa fa-gear pr5"></span> Account Settings </a>
                </li>
                <li class="br-t of-h">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" class="fw600 p12 animated animated-short fadeInDown">
                        <span class="fa fa-power-off pr5"></span> Logout </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- End: Header -->
<aside id="sidebar_left" class="nano nano-primary">
    <div class="nano-content">
        <!-- sidebar menu -->
        <ul class="nav sidebar-menu ">
            <li class="{{Request()->is('dashboard') ? 'active':'menu-close'}}">
                <a href="/dashboard">
                    <span class="glyphicons glyphicons-home"></span>
                    <span class="sidebar-title">Dashboard </span>
                </a>
            </li>
            <li class="sidebar-label pt15">Data Produk</li>
            <li>
                <a class="accordion-toggle {{Request()->is('tambahProduk','listProduk') ? 'menu-open':''}}" href="#">
                    <span class="glyphicons glyphicons-fire"></span>
                    <span class="sidebar-title">Produk</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="{{Request()->is('tambahProduk') ? 'active':''}}">
                        <a href="/tambahProduk">
                            <span class="glyphicon glyphicon-plus-sign"></span> Tambah Produk </a>
                    </li>
                    <li class="{{Request()->is('listProduk') ? 'active':''}}">
                        <a href="/listProduk">
                            <span class="glyphicon glyphicon-indent-right"></span> List Produk </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-label pt15">Data Pembelian</li>
            <li>
                <a class="accordion-toggle {{Request()->is('listPembelian', 'konfirmasiPembelian','listPembelian/pembelianDikonfirmasi', 'listPembelian/pembelianDitolak') ? 'menu-open':''}}" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">Pembelian</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="{{Request()->is('listPembelian', 'konfirmasiPembelian', 'listPembelian/pembelianDikonfirmasi', 'listPembelian/pembelianDitolak') ? 'active':''}}">
                        <a href="/listPembelian">
                            <span class="glyphicon glyphicon-indent-right"></span> List Pembelian</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-label pt15">Data Pengantaran</li>
            <li>
                <a class="accordion-toggle {{Request()->is('tambahPengantaran', 'listPengantaran', 'konfirmasiPengantaran', 'listPengantaran/pengantaranSudahDiproses') ? 'menu-open':''}}" href="#">
                    <span class="glyphicon glyphicon-send"></span>
                    <span class="sidebar-title">Pengantaran</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    {{-- <li class="{{Request()->is('tambahPengantaran') ? 'active':''}}">
                        <a href="/tambahPengantaran">
                            <span class="glyphicon glyphicon-plus-sign"></span> Tambah Pengantaran </a>
                    </li> --}}
                    <li class="{{Request()->is('listPengantaran', 'konfirmasiPengantaran', 'listPengantaran/pengantaranSudahDiproses') ? 'active':''}}">
                        <a href="/listPengantaran">
                            <span class="glyphicon glyphicon-indent-right"></span> List Pengantaran </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-label pt15">Data Konsumen</li>
            <li>
                <a class="accordion-toggle {{Request()->is ('listKonsumen','blacklistKonsumen')? 'menu-open':''}}" href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="sidebar-title">Konsumen</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="{{Request()->is('listKonsumen') ? 'active':''}}">
                        <a href="/listKonsumen">
                            <span class="glyphicon glyphicon-indent-right"></span> List Konsumen </a>
                    </li>
                    {{-- <li class="{{Request()->is('blacklistKonsumen') ? 'active':''}}">
                        <a href="/blacklistKonsumen">
                            <span class="glyphicon glyphicon-ban-circle"></span> Konsumen Blacklist </a>
                    </li> --}}
                </ul>
            </li>
            <li class="sidebar-label pt15">Data Laporan</li>
            <li>
                <a class="accordion-toggle {{Request()->is('laporanPembelian') ? 'menu-open':''}}" href="#">
                    <span class="glyphicon glyphicon-print"></span>
                    <span class="sidebar-title">Laporan</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="{{Request()->is('laporanPembelian') ? 'active':''}}">
                        <a href="/laporanPembelian">
                            <span class="glyphicon glyphicon-list-alt"></span> Laporan Pembelian </a>
                    </li>
                </ul>
            </li>


        </ul>
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
    </div>
</aside>
