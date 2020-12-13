@extends('layouts.master')

@push('pagescript')
<link rel="stylesheet" href="{{ asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Kendaraan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kendaraan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @if(Auth::user()->hasAnyRole('rental'))
    <div class="">
      <td>
        <a href="{{url('/kendaraan/create')}}" class="btn btn-primary"> <i class="fa fa-edit"></i> Tambah Data</a>
      </td>
    </div><br>
    @endif

    @if (session('status'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> {{session('status')}} </h4>
    </div>
    @endif

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Kendaraan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Lengkap</th>
              <th>Jenis Kendaraan</th>
              <th>Merk Kendaraan</th>
              <th>Tahun Kendaraan</th>
              <th>Bahan Bakar</th>
              <th>Nomor Polisi</th>
              <th>Harga Rental</th>
              <th>Gambar</th>
              <th>Status Kendaraan</th>
              <!-- <th>Status</th> -->
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kendaraans as $kendaraan)
            @php
            $data = \DB::table('rentals')->where('id', $kendaraan->rental_id)->value('nama_lengkap');
            @endphp
            <tr>
              <td>{{$data}}</td>
              <td>{{$kendaraan->jenis_kendaraan}}</td>
              <td>{{$kendaraan->merk_kendaraan}}</td>
              <td>{{$kendaraan->tahun_kendaraan}}</td>
              <td>{{$kendaraan->bahan_bakar}}</td>
              <td>{{$kendaraan->nopol}}</td>
              <td>{{$kendaraan->harga_sewa}}</td>
              <td><img src="{{asset('storage/'. $kendaraan->gambar)}}" width="100" alt=""></td>
              <td>{{$kendaraan->status_iklan}}</td>
              <!-- <td>{{$kendaraan->status}}</td> -->
              <!-- @if (Auth::user()->hasAnyRole('admin'))
              <td>
                @if ($kendaraan->status=='diterima')
                <a href="{{url('/detail/'.$kendaraan->id)}}" class="btn btn-success">Detail</a>
                @endif
                @if ($kendaraan->status=='diajukan')
                <a href="{{url('/verifikasi/'.$kendaraan->id)}}" class="btn btn-primary">Verif</a>
                <a href="{{url('/penolakan/'.$kendaraan->id)}}" class="btn btn-danger">Tolak</a>
                @endif
              </td>
              @endif -->
              <td>
                <a href="/kendaraan/{{$kendaraan->id}}/edit" class="btn btn-success btn-sm"> Edit</a>
                <form class="d-inline" method="POST" action="/kendaraan/{{$kendaraan->id}}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit">hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
            </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </section>
</div>

@endsection

@push('script')
<script src="{{ asset('admin/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
@endpush