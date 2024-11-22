@extends('admin.layouts.main')
@section('title', 'Trang chủ danh sách khóa học')
@section('style-css')
    <!-- Add any additional CSS styling here -->
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3 align-items-center">
                <div class="col-sm-6">
                    <h1 class="text-primary">Quản lý công việc</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Quản lý bài thi</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Filter Card -->
            <div class="card card-default shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-secondary font-weight-bold">Lọc dữ liệu</h3>
                    <button type="button" class="btn btn-tool text-primary" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <form action="">
                        <!-- Add form inputs for filtering data here -->
                    </form>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- Add additional content cards or elements here -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <!-- Include any additional JavaScript or scripts here -->
@stop
