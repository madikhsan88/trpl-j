@extends('layouts.master')

@push('pagescript')
  <link rel="stylesheet" href="{{ asset('admin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="">
        <td>
          <a href="{{url('/customer/create')}}" class="btn btn-primary"> <i class="fa fa-edit"></i> Tambah Customer</a>
        </td>
      </div><br>

      @if (session('status'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> {{session('status')}} </h4>
        </div>
      @endif
      
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tabel Customer</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>NIK</th>
              <th>Email</th>
              <th>Pengaturan</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              <tr>
                <td>{{$customer->nama_lengkap}}</td>
                <td>{{$customer->alamat}}</td>
                <td>{{$customer->nik}}</td>
                <td>{{$customer->hp}}</td>
                <td>
                  <a href="/customer/{{$customer->id}}/edit" class="btn btn-success">Edit</a>
                  <form class="d-inline" method="POST" action="/customer/{{$customer->id}}">
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
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endpush