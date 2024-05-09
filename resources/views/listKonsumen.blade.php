@extends('adminThame.mainAdmin')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@section('title')
    List Konsumen
@endsection

@section('content')
<style type="text/css">
    .btn-circle.btn-lg, .btn-group-lg>.btn-circle.btn {
        width: 50px;
        height: 50px;
        padding: 14px 15px;
        font-size: 18px;
        line-height: 23px;
    }
    [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
        cursor: pointer;
    }
    .btn-circle {
        border-radius: 100%;
        width: 40px;
        height: 40px;
        padding: 10px;
    }
    /* Center the button in the cell */
    .center-btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-info {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-picture {
        margin-right: 10px;
    }

    .profile-name {
    max-width: 120px; /* Sesuaikan lebar maksimum nama sesuai kebutuhan */
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center; /* Tengahkan teks */
    margin-top: 5px; /* Sesuaikan margin atas sesuai kebutuhan */
    }
</style>
<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List Konsumen</div>
                    </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambilKonsumen as $fnambilKonsumen )
                                <tr>
                                    <td style="vertical-align:top">
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-2">
                                                    <div class="profile-picture">
                                                        <img alt="" style="max-width: 50px; height: auto;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="card-body">
                                                        <b>Nama Konsumen</b> <br />
                                                        {{$fnambilKonsumen->name}}<br />
                                                        <b>Email Konsumen</b> <br />
                                                        {{$fnambilKonsumen->email}}<br />
                                                        <b>Nomor Hp</b> <br />
                                                        {{$fnambilKonsumen->phone}}<br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align:top">
                                        <a href="/listKonsumen?drop_id={{ Crypt::EncryptString($fnambilKonsumen->id)}}">
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
