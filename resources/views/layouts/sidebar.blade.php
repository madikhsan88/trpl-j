<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info"><br>
            <p>{{ Auth::user()->name }}</p>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        @if (Auth::user()->hasAnyRole('admin'))
            @include('layouts.sidebarAdmin')
        @endif
        @if (Auth::user()->hasAnyRole('rental'))
            @include('layouts.sidebarRental')
        @endif
        @if (Auth::user()->hasAnyRole('customer'))
            @include('layouts.sidebarCustomer')
        @endif
        
    </section>
<!-- /.sidebar -->
</aside>