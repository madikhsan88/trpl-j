@extends('layouts.master')
@section('content')
    
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Form Data Customer 
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
          <form method="POST" action="/customer/{{$customer->id}}">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" value="{{ $customer->nama_lengkap }}">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $customer->alamat }}">
            </div>
            <div class="form-group">
              <label>Nomor Induk Kependudukan</label>
              <input type="number" class="form-control" placeholder="Nomor Induk Kependudukan" name="nik" value="{{ $customer->nik }}">
            </div>
            <div class="form-group">
              <label>No Handphone</label>
              <input type="number" class="form-control" placeholder="No Handphone" name="hp" value="{{ $customer->hp }}">
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