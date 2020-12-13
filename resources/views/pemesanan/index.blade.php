@extends('layouts.master')

@push('pagescript')
<link rel="stylesheet" href="{{ asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')


<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Pengajuan iklan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pengajuan iklan</li>
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
        <h3 class="box-title">Pengajuan iklan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Jenis kendaraan</th>
              <th>Merk Kendaraan</th>
              <th>Mulai Iklan</th>
              <th>Batas Iklan</th>
              <th>Harga Iklan</th>
              <th>Bukti Transfer</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pemesanan as $item)
            <tr>
              <td>{{$item->kendaraans->jenis_kendaraan}}</td>
              <td>{{$item->kendaraans->merk_kendaraan}}</td>
              <td>{{$item->mulai_iklan}}</td>
              <td>{{$item->akhir_iklan}}</td>
              <td>{{$item->harga_iklan}}</td>
              <td><img src="{{asset('storage/'. $item->bukti)}}" width="100" alt=""></td>
              <td>{{$item->status}}</td>
              @if(Auth::user()->hasAnyRole('rental'))
              <td>
                <a href="/pemesanan/{{$item->id}}/edit" class="btn btn-success">Ajukan</a>
                <form class="d-inline" method="POST" action="">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit">hapus</button>
                </form>
              </td>
              @endif
              @if(Auth::user()->hasAnyRole('admin'))
              <td>
                @if ($item->status=='diterima')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalStatus">
                  Tolak
                </button>
                @endif
                @if ($item->status=='ditolak')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTerima">
                Terima
                </button>
                @endif
                @if ($item->status=='belum diterima')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTerima">
                Terima
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalStatus">
                  Tolak
                </button>
                @endif
              </td>
              @endif
            </tr>
            @endforeach
            </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

  </section>
</div>
<div id="modalStatus" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Verifikasi Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menolak verifikasi</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{url('/tolak/'.$item->id)}}" class="btn btn-primary">Ya, Saya yakin</a>
      </div>
    </div>
  </div>
</div>

<div id="modalTerima" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menerima verifikasi</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{url('/terima/'.$item->id)}}" class="btn btn-primary">Ya, Saya yakin</a>
      </div>
    </div>
  </div>
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