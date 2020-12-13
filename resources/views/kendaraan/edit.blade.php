@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Form Kendaraan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box col-md-4">
        <div class="box-body col-sm-6">
          <form method="POST" action="/kendaraan/{{$kendaraan->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label>Jenis Kendaraan</label>
              <select class="form-control" name="jenis_kendaraan" value="{{ $kendaraan->jenis_kendaraan }}">
                <option value="">Jenis Kendaraan</option>
                <option value="mobil">Mobil</option>
                <option value="motor">Sepeda Motor</option>
              </select>
            </div>
            <div class="form-group">
              <label>Merk Kendaraan</label>
              <input type="text" class="form-control" placeholder="Jenis Mobil" name="merk_kendaraan" value="{{ $kendaraan->merk_kendaraan }}">
            </div>
            <div class="form-group">
              <label>Tahun Kendaraan</label>
              <input type="number" class="form-control" placeholder="Tahun Mobil" name="tahun_kendaraan" value="{{ $kendaraan->tahun_kendaraan }}">
            </div>
            <div class="form-group">
              <label>Bahan Bakar</label>
              <input type="text" class="form-control" placeholder="Bahan Bakar" name="bahan_bakar" value="{{ $kendaraan->bahan_bakar }}">
            </div>
            <div class="form-group">
              <label>Nomor Polisi</label>
              <input type="text" class="form-control" placeholder="Nomor Polisi" name="nopol" value="{{ $kendaraan->nopol }}">
            </div>
            <div class="form-group">
              <label>Harga Sewa Mobil/hari</label>
              <input type="number" class="form-control" placeholder="Harga Sewa Per Hari" name="harga_sewa" value="{{ $kendaraan->harga_sewa }}">
            </div>
            <div class="form-group">
            <label>Gambar</label>
            <input type="file" class="form-control" placeholder="Harga Sewa Per Hari" name="gambar">
          </div>
            <!-- <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status_iklan" value="{{ $kendaraan->status_iklan }}">
                <option value="">status</option>
                <option value="tersedia">tersedia</option>
                <option value="tidak tersediq">tidak tersedia</option>
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

