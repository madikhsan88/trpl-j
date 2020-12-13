@extends('layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-6">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">

            <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Nama Lengkap</b> <a class="pull-right">{{auth()->user()->name}}</a>
              </li>
              <li class="list-group-item">
                <b>Alamat</b> <a class="pull-right">jambi</a>
              </li>
              <li class="list-group-item">
                <b>Nik</b> <a class="pull-right">18284135820842</a>
              </li>
              <li class="list-group-item">
                <b>No Hp</b> <a class="pull-right">082237178288</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection