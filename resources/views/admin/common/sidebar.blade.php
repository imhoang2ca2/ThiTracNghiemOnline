<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-info">
        <img src="{!! asset('admin/dist/img/AdminLTELogo.png') !!}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Quản lý</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        @php
            $admin = Auth::guard('admins')->user();
        @endphp
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/admin/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{!! $admin->name !!}</a>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('mon.hoc.index') }}" class="nav-link {{ isset($monhoc_active) ? $monhoc_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-tasks"></i>
                        <p>Quản Lý Môn Học</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('cau.hoi.index') }}" class="nav-link {{ isset($cauhoi_active) ? $cauhoi_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-tasks"></i>
                        <p>Quản Lý Câu Hỏi</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('lich.thi.index') }}" class="nav-link {{ isset($lichthi_active) ? $lichthi_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-tasks"></i>
                        <p>Quản Lý Lịch Thi</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('hoc.sinh.index') }}" class="nav-link {{ isset($sinhvien_active) ? $sinhvien_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-tasks"></i>
                        <p>Quản Lý Sinh Viên</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
