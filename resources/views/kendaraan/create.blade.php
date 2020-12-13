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
        @if($errors->any())
          <div class="alert">
            <ul>
              @foreach($errors->all() as $item)
                <li>{{$item}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="{{route('kendaraan.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Jenis Kendaraan</label>
            <select class="form-control" name="jenis_kendaraan">
              <option>Jenis Kedaraan</option>
              <option value="mobil">Mobil</option>
              <option value="motor">Sepeda Motor</option>
            </select>
          </div>
          <div class="form-group">
            <label>Merk Kendaraan</label>
            <input type="text" class="form-control" placeholder="Jenis Mobil" name="merk_kendaraan">
          </div>
          <div class="form-group">
            <label>Tahun kendaraan</label>
            <input type="number" class="form-control" placeholder="Tahun Mobil" name="tahun_kendaraan">
          </div>
          <div class="form-group">
            <label>Bahan Bakar</label>
            <input type="text" class="form-control" placeholder="Bahan Bakar" name="bahan_bakar">
          </div>
          <div class="form-group">
            <label>Nomor Polisi</label>
            <input type="text" class="form-control" placeholder="Nomor Polisi" name="nopol">
          </div>
          <!-- <div class="form-group">
            <label>Mulai iklan</label>
            <input type="date" class="form-control" name="mulai_iklan">
          </div>
          <div class="form-group">
            <label>Akhir iklan</label>
            <input type="date" class="form-control" name="akhir_iklan">
          </div>
          <div class="form-group">
            <label>Total Harga Pengiklanan</label>
            <input type="number" class="form-control" placeholder="Harga Iklan" name="harga_iklan">
          </div> -->
          <div class="form-group">
            <label>Harga Sewa Mobil/hari</label>
            <input type="number" class="form-control" placeholder="Harga Sewa Per Hari" name="harga_sewa">
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <input type="file" class="form-control" placeholder="Harga Sewa Per Hari" name="gambar">
          </div>
          <div class="form-group">
            <label>Status Iklan</label>
            <select class="form-control" name="status_iklan">
              <option>status iklan</option>
              <option value="belum tersedia">belum tersedia</option>
              <option value="tersedia">tersedia</option>
            </select>
          </div>
          <div class="form-group" hidden>
            <input type="number" class="form-control" name="rental_id" value="{{ $suser }}">
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@endsection