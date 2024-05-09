@extends('adminThame.mainAdmin')

@section('title')
    Tambah Produk
@endsection

@section('content')
<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Form Tambah Produk</span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/tambahProduk/prosesProduk" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Nama Produk</label>
                            <div class="col-lg-8">
                                <input type="text" id="inputStandard" class="form-control" placeholder="Masukan nama produk" name="namaProduk" value="{{old('namaProduk')}}">
                                @error('namaProduk')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-3 control-label">Kategori Produk</label>
                            <div class="col-lg-8">
                               <select name="kategoriProduk" id="" class="form-control">
                                <option value="">Pilih kategori produk</option>
                                    @php
                                        $kategoriProduk= array("Makanan", "Minuman", "lainnya");
                                    @endphp
                                    @foreach (range (0,1) as $i )
                                        @if (old('kategoriProduk')==$kategoriProduk[$i])
                                            <option value="{{$kategoriProduk[$i]}}" selected="selected">{{$kategoriProduk[$i]}}</option>
                                        @else
                                            <option value="{{$kategoriProduk[$i]}}">{{$kategoriProduk[$i]}}</option>
                                        @endif
                                    @endforeach
                               </select>
                               @error('kategoriProduk')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-lg-3 control-label">Harga</label>
                            <div class="col-lg-8">
                                <input class="form-control" id="disabledInput" type="Number" name="harga" placeholder="Masukkan Harga Anda (ex: 52000)" min="0" value="{{old('harga')}}">
                                @error('harga')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-lg-3 control-label">Stok</label>
                            <div class="col-lg-8">
                                <input class="form-control" id="disabledInput" type="Number" name="stok" placeholder="Masukkan Stok Anda (ex: 55)" min="0" value="{{old('stok')}}">
                                @error('stok')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-lg-3 control-label">paket</label>
                            <div class="col-lg-8">
                               <select name="paket" class="form-control" id="">
                                    <option value="">Pilih Paket</option>
                                    @php
                                        $arPaket = array('Lengkap', 'Promo', 'Lauk Aja', 'Lauk Nasi', 'Nasi', 'Lauk Minum', 'Minum');
                                    @endphp
                                    @foreach (range(0,6) as $i )
                                        @if (old('paket')==$arPaket[$i])
                                            <option value="{{$arPaket[$i]}}" selected="selected">{{$arPaket[$i]}}</option>
                                        @else
                                            <option value="{{$arPaket[$i]}}">{{$arPaket[$i]}}</option>
                                        @endif
                                    @endforeach
                               </select>
                               @error('paket')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="textArea1">Keterangan Produk</label>
                            <div class="col-lg-8">
                                <textarea class="form-control textarea-grow" id="textArea1" rows="4" name="keteranganProduk" placeholder="Masukkan Keterangan Produk">{{old('keteranganProduk')}}</textarea>
                                @error('keteranganProduk')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Upload Gambar Produk</label>
                            <div class="col-lg-8">
                                <input type="file" id="inputStandard" class="form-control" placeholder="Masukan Gambar produk" name="gambarProduk" value="{{old('gambarProduk')}}">
                                @error('gambarProduk')
                                    <span class="badge bg-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"></label>
                            <div class="col-lg-8">
                               <button type="submit" name="tbProses" class="btn btn-success">Proses</button>
                               <button type="reset" name="tbReset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
