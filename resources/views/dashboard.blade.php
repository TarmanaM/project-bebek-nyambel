@extends('adminThame.mainAdmin')

@section('title')
    Dashboard Admin
@endsection

@section('content')
 <!-- Start: Topbar -->
<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="dashboard.html">Dashboard</a>
            </li>
            <li class="crumb-icon">
                <a href="dashboard.html">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">
                <a href="index.html">Home</a>
            </li>
            <li class="crumb-trail">Dashboard</li>
        </ol>
    </div>

</header>
<!-- End: Topbar -->

<!-- Begin: Content -->
<section id="content">

    <!-- Dashboard Tiles -->
    <div class="row mb10">
        <div class="col-md-3">
            <div class="panel bg-alert light of-h mb10">
                <div class="pn pl20 p5">
                    <div class="icon-bg"> <i class="fa fa-comments-o"></i> </div>
                    <h2 class="mt15 lh15"> <b>523</b> </h2>
                    <h5 class="text-muted">Comments</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel bg-info light of-h mb10">
                <div class="pn pl20 p5">
                    <div class="icon-bg"> <i class="fa fa-twitter"></i> </div>
                    <h2 class="mt15 lh15"> <b>348</b> </h2>
                    <h5 class="text-muted">Tweets</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel bg-danger light of-h mb10">
                <div class="pn pl20 p5">
                    <div class="icon-bg"> <i class="fa fa-bar-chart-o"></i> </div>
                    <h2 class="mt15 lh15"> <b>267</b> </h2>
                    <h5 class="text-muted">Reach</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel bg-warning light of-h mb10">
                <div class="pn pl20 p5">
                    <div class="icon-bg"> <i class="fa fa-envelope"></i> </div>
                    <h2 class="mt15 lh15"> <b>714</b> </h2>
                    <h5 class="text-muted">Comments</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin-panels -->
    <div class="admin-panels fade-onload sb-l-o-full">

        <!-- full width widgets -->
        <div class="row">

            <!-- Three panes -->
            <div class="col-md-12 admin-grid">
                <div class="panel sort-disable" id="p0">
                    <div class="panel-heading">
                        <span class="panel-title">Data Panel (Dragging Disabled)</span>
                    </div>
                    <div class="panel-body mnw700 of-a">
                        <div class="row">

                            <!-- Chart Column -->
                            <div class="col-md-4 pln br-r mvn15">
                                <h5 class="ml5 mt20 ph10 pb5 br-b fw700">Visitors <small class="pull-right fw600">13,253 <span class="text-primary">(8,251 unique)</span> </small> </h5>
                                <div id="high-column2" style="width: 100%; height: 255px; margin: 0 auto"></div>
                            </div>

                            <!-- Multi Text Column -->
                            <div class="col-md-4 br-r">
                                <h5 class="mt5 mbn ph10 pb5 br-b fw700">Top Referrals <small class="pull-right fw700 text-primary">View Report </small> </h5>
                                <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                    <thead>
                                        <tr class="hidden">
                                            <th>Source</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                <span>www.google.com</span>
                                            </td>
                                            <td>1,926</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                <span>www.yahoo.com</span>
                                            </td>
                                            <td>1,254</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                <span>www.themeforest.com</span>
                                            </td>
                                            <td>783</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h5 class="mt15 mbn ph10 pb5 br-b fw700">Top Search Terms <small class="pull-right fw700 text-primary">View Report </small> </h5>
                                <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                    <thead>
                                        <tr class="hidden">
                                            <th>Source</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                <span>admin theme</span>
                                            </td>
                                            <td>988</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                <span>admin dashboard</span>
                                            </td>
                                            <td>612</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                <span>admin template</span>
                                            </td>
                                            <td>256</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Flag/Icon Column -->
                            <div class="col-md-4">
                                <h5 class="mt5 ph10 pb5 br-b fw700">Traffic Sources <small class="pull-right fw700 text-primary">View Stats </small> </h5>
                                <table class="table mbn">
                                    <thead>
                                        <tr class="hidden">
                                            <th>#</th>
                                            <th>First Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="va-m fw600 text-muted">
                                                <span class="flag-xs flag-us mr5 va-b"></span>United States</td>
                                            <td class="fs15 fw700 text-right">24%</td>
                                        </tr>
                                        <tr>
                                            <td class="va-m fw600 text-muted">
                                                <span class="flag-xs flag-de mr5 va-b"></span>Germany</td>
                                            <td class="fs15 fw700 text-right">7%</td>
                                        </tr>
                                        <tr>
                                            <td class="va-m fw600 text-muted">
                                                <span class="flag-xs flag-fr mr5 va-b"></span>France</td>
                                            <td class="fs15 fw700 text-right">14%</td>
                                        </tr>
                                        <tr>
                                            <td class="va-m fw600 text-muted">
                                                <span class="flag-xs flag-tr mr5 va-b"></span>Spain</td>
                                            <td class="fs15 fw700 text-right">31%</td>
                                        </tr>
                                        <tr>
                                            <td class="va-m fw600 text-muted">
                                                <span class="flag-xs flag-es mr5 va-b"></span>Turkey</td>
                                            <td class="fs15 fw700 text-right">22%</td>
                                        </tr>
                                        <tr>
                                            <td class="va-m fw600 text-muted">
                                                <span class="flag-xs flag-us mr5 va-b"></span>United States</td>
                                            <td class="fs15 fw700 text-right">24%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Icon Column -->
                            <div class="col-md-4 hidden">
                                <h5 class="mt5 ph10 pb5 br-b fw700">Content Viewed <small class="pull-right fw700 text-primary">Refresh </small> </h5>
                                <table class="table mbn">
                                    <thead>
                                        <tr class="hidden">
                                            <th class="mw30">#</th>
                                            <th>First Name</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fs17 text-center w30">
                                                <span class="fa fa-desktop text-warning"></span>
                                            </td>
                                            <td class="va-m fw600 text-muted">Television</td>
                                            <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$855,913</td>
                                        </tr>
                                        <tr>
                                            <td class="fs17 text-center">
                                                <span class="fa fa-microphone text-primary"></span>
                                            </td>
                                            <td class="va-m fw600 text-muted">Radio</td>
                                            <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-down text-danger pr10"></i>$349,712</td>
                                        </tr>
                                        <tr>
                                            <td class="fs17 text-center">
                                                <span class="fa fa-newspaper-o text-info"></span>
                                            </td>
                                            <td class="va-m fw600 text-muted">Newspaper</td>
                                            <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$1,259,742</td>
                                        </tr>
                                        <tr>
                                            <td class="fs17 text-center">
                                                <span class="fa fa-facebook text-alert"></span>
                                            </td>
                                            <td class="va-m fw600 text-muted">Social Media</td>
                                            <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$3,512,672</td>
                                        </tr>
                                        <tr>
                                            <td class="fs17 text-center">
                                                <span class="fa fa-bank text-alert"></span>
                                            </td>
                                            <td class="va-m fw600 text-muted">Investments</td>
                                            <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$3,512,672</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Primary Chart -->
    <div class="row hidden">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body pl5 pr10 pt25 pb5 bg-light">
                    <div id="graph" style="height: 280px; width: 100%;"></div>
                    <div class="p10 pb20 ml30 pull-left">
                        <span class="mr20 text-muted"> <i class="fa fa-square pr5 text-success"></i> Regular Traffic </span>
                        <span class="mr20 text-muted"> <i class="fa fa-square pr5 text-danger"></i> Possible Threats </span>
                        <span class="mr20 text-muted"> <i class="fa fa-square pr5 text-warning"></i> Crawlers/bots </span>
                    </div>
                    <ul class="list-inline list-inline-cspacer pull-right p10">
                        <li class="active">Page Views</li>
                        <li>Visitors</li>
                        <li>Bandwidth</li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-footer hidden">
                    <div class="row">
                        <div class="col-lg-3 visible-lg mt5">
                            <div class="text-block text-center">
                                <h5 class="mbn text-muted">This Years Total Sales</h5>
                                <h4 class="mb5"> <b>$1,532,512</b> </h4>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-9 mt5 pr25">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 text-center">
                                    <div class="media">
                                        <div class="media-object pull-left pt10 mrn">
                                            <span class="stateface stateface-ca fs26 text-primary"></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading mbn">San Jose, CA</h6>
                                            <h5 class="mb5">$47,112</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 text-center">
                                    <div class="media">
                                        <div class="media-object pull-left pt10 mrn">
                                            <span class="stateface stateface-tx fs24 text-warning"></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading mbn">Denver, CO</h6>
                                            <h5 class="mb5">$32,512</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 text-center">
                                    <div class="media">
                                        <div class="media-object pull-left pt10 mrn">
                                            <span class="stateface stateface-mo fs22 text-teal"></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading mbn">St. Louis, MO</h6>
                                            <h5 class="mb5">$14,532</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 text-center prn">
                                    <div class="media">
                                        <div class="media-object pull-left pt10 mrn">
                                            <span class="stateface stateface-ny fs24 text-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading mbn"> <a class="text-info">New York, NY</a> </h6>
                                            <h5 class="mb5">$75,116</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <!-- Panel Something -->
            <div class="panel of-h mb10 hidden">
                <div class="row">
                    <div class="col-md-4 facebook-color text-center p20"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                    <div class="col-md-4 twitter-color text-center p20"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                    <div class="col-md-4 bg-success text-center p20"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center p10">
                        <h3 class="text-muted">1,215</h3>
                    </div>
                    <div class="col-md-4 text-center p10">
                        <h3>584</h3>
                    </div>
                    <div class="col-md-4 text-center p10">
                        <h3>907</h3>
                    </div>
                </div>
            </div>
            <div class="row hidden">
                <div class="col-sm-6">
                    <div class="panel of-h mb10">
                        <div class="row table-layout">
                            <div class="col-xs-5 facebook-color text-center va-m p10"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                            <div class="col-xs-7 va-m pl15">
                                <h3 class="mt15 lh5"> <b>5,159</b> </h3>
                                <h5 class="text-muted">Likes</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel of-h mb10">
                        <div class="row table-layout">
                            <div class="col-xs-5 twitter-color text-center va-m p10"> <i class="fa fa-twitter fs35 text-white"></i> </div>
                            <div class="col-xs-7 va-m pl15">
                                <h3 class="mt15 lh5"> <b>248</b> </h3>
                                <h5 class="text-muted">Tweets</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hidden">
                <div class="col-sm-6">
                    <div class="panel of-h mb10">
                        <div class="row table-layout">
                            <div class="col-xs-5 bg-success text-center va-m p10"> <i class="fa fa-credit-card fs35 text-white"></i> </div>
                            <div class="col-xs-7 va-m pl15">
                                <h3 class="mt15 lh5"> <b>1459</b> </h3>
                                <h5 class="text-muted">Orders</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel of-h mb10">
                        <div class="row table-layout">
                            <div class="col-xs-5 bg-info text-center va-m p10"> <i class="fa fa-inbox fs35 text-white"></i> </div>
                            <div class="col-xs-7 va-m pl15">
                                <h3 class="mt15 lh5"> <b>32</b> </h3>
                                <h5 class="text-muted">Emails</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel of-h">
                <div class="panel-heading hidden">
                    <span class="panel-title"> <i class="fa fa-calendar"></i> Thursday - April 10th </span>
                    <div class="panel-header-menu pull-right mr10">
                        <span class="small text-muted">14/22/2014</span>
                    </div>
                </div>
                <div class="row table-layout table-clear-xs">
                    <div class="col-sm-4 panel-sidemenu border-right p25 pt20">
                        <h4 class="mb25">Todays Appointments</h4>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <div class="media-object border border-orange br64 bw2 p2">
                                    <span class="glyphicon glyphicon-magnet icon-circle bg-success text-white"></span>
                                </div>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading p4"> Simon Rivers <br/>
          <small>What's up, buddy</small> </h5>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left mr15" href="#">
                                <div class="media-object border border-purple br64 bw2 p2">
                                    <span class="glyphicon glyphicon-magnet icon-circle bg-primary text-white"></span>
                                </div>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading p4"> Tracy Faught <br/>
          <small>What's up, buddy</small> </h5>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left mr15" href="#">
                                <div class="media-object border border-teal br64 bw2 p2">
                                    <span class="glyphicon glyphicon-magnet icon-circle bg-info text-white"></span>
                                </div>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading p4"> Kevin Smith <br/>
          <small>What's up, buddy</small> </h5>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left mr15" href="#">
                                <div class="media-object border border-orange br64 bw2 p2">
                                    <span class="glyphicon glyphicon-magnet icon-circle bg-success icon-purple text-white"></span>
                                </div>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading p4"> Courtney Sullivan <br/>
          <small>What's up, buddy</small> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 va-m p15 pt20">
                        <div id="clndr"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <!-- Group Chat Panel -->
            <div class="panel of-h chat-panel">
                <div class="panel-heading">
                    <span class="panel-title"> <i class="fa fa-calendar"></i> Group Chat </span>
                    <div class="pull-right pr15">
                        <span class="small text-muted">4 New Messages</span>
                    </div>
                </div>
                <div class="panel-body p20 pb10 pt10">
                    <div class="panel-tray hidden">
                        <div class="panel-tray-toggle"> <i class="fa fa-gear"></i> </div>
                        <div class="panel-tray-body">
                            <input class="form-control input-xs" type="text" placeholder="Filter..">
                            <div class="p10">
                                <h5 class="media-heading mb10"> Simon Rivers <small class="text-success">- Online Now</small> </h5>
                                <h5 class="media-heading mb10"> Mike Ross <small class="text-success">- Online Now</small> </h5>
                                <h5 class="media-heading mb10"> Shiela Scary <small class="text-red2">- Busy</small> </h5>
                                <h5 class="media-heading mb10"> Dell Lat <small class="text-muted">- 11 Hours</small> </h5>
                                <h5 class="media-heading mb10"> Forest Whitaker <small class="text-muted">- 2 Days</small> </h5>
                                <h5 class="media-heading mb10"> Ryan Markup <small class="text-muted">- 3 Hours</small> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pl10">
                            <div class="media mt15">
                                <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="assets/img/avatars/2.jpg" alt="..."> </a>
                                <div class="media-body">
                                    <h5 class="media-heading mb5"> Simon Rivers <small>- 3 hours ago</small> </h5>
                                    <p class="text-muted">Hey Louis, I was wondering if you had time yet</p>
                                </div>
                            </div>
                            <div class="media mt15">
                                <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="assets/img/avatars/6.jpg" alt="..."> </a>
                                <div class="media-body">
                                    <h5 class="media-heading mb5"> Tracy Rope <small>- 8 hours ago</small> </h5>
                                    <p class="text-muted">Bam baby get at, I was wondering</p>
                                </div>
                            </div>
                            <div class="media mt15 mbn">
                                <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="assets/img/avatars/8.jpg" alt="..."> </a>
                                <div class="media-body">
                                    <h5 class="media-heading mb5"> Courtney Dash <small>- 3 days ago</small> </h5>
                                    <p class="text-muted">I was wonde awesome brief and walnuts</p>
                                </div>
                            </div>
                            <div class="media mt15">
                                <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="assets/img/avatars/2.jpg" alt="..."> </a>
                                <div class="media-body">
                                    <h5 class="media-heading mb5"> Simon Rivers <small>- 3 hours ago</small> </h5>
                                    <p class="text-muted">Hey Louis, I was wondering if you had time yet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-8 col-sm-9 prn">
                            <input type="text" class="form-control" placeholder="Type Here...">
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <button type="button" class="btn btn-default btn-gradient btn-block">Reply</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: .chat-panel -->

        </div>
    </div>
</section>
<!-- End: Content -->
@endsection
