@extends('layouts.master')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Form Pemesanan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    @if($errors->any())
          <div class="alert">
            <ul>
              @foreach($errors->all() as $item)
                <li>{{$item}}</li>
              @endforeach
            </ul>
          </div>
        @endif
    <!-- Main content -->
    <section class="content">
        <div class="box col-md-4">
            <div class="box-body col-sm-6">
                <form method="POST" action="/pemesanan/{{$pemesanan->id}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-control" name="jenis_kendaraan" value="{{ $pemesanan->kendaraans->jenis_kendaraan }}">
                            @if ($pemesanan->kendaraans->jenis_kendaraan == 'mobil')
                            <option value="mobil" selected >Mobil</option>
                            @else
                            <option value="motor" selected>Motor</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Merk Kendaraan</label>
                        <input type="text" class="form-control" placeholder="Jenis Mobil" name="merk_kendaraan" value="{{ $pemesanan->kendaraans->merk_kendaraan }}">
                    </div>
                    <div class="form-group">
                        <label>Mulai iklan</label>
                        <input type="date" class="form-control" name="mulai_iklan" value="{{ $pemesanan->mulai_iklan }}">
                    </div>
                    <div class="form-group">
                        <label>Akhir iklan</label>
                        <input type="date" class="form-control" name="akhir_iklan" value="{{ $pemesanan->akhir_iklan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Iklan</label>
                        <input type="number" class="form-control" placeholder="Harga Iklan" name="harga_iklan" value="{{ $pemesanan->harga_iklan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" placeholder="Harga Sewa Per Hari" name="bukti" value="{{ $pemesanan->bukti }}">
                    </div>
                    <!-- <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" value="{{ $pemesanan->status }}">
                            <option value="">status</option>
                            <option value="diajukan">diajukan</option>
                            <option value="tidak">tidak diajukan</option>
                        </select>
                    </div> -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection