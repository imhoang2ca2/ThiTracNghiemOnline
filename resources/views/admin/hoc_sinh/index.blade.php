@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hoc.sinh.index') }}">Sinh Viên</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('hoc.sinh.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Mã sinh viên</th>
                                        <th>Học và tên</th>
                                        <th>Lớp</th>
                                        <th>Ngày Sinh</th>
                                        <th>Email</th>
                                        {{--<th>Trạng thái</th>--}}
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$sinhvien->isEmpty())
                                        @php $i = $sinhvien->firstItem(); @endphp
                                        @foreach($sinhvien as $item)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td>{{ $item->MaSV }}</td>
                                                <td>{{ $item->HoTen }}</td>
                                                <td>{{ $item->Lop }}</td>
                                                <td>{{ $item->NgaySinh }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('hoc.sinh.update', $item->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('hoc.sinh.delete', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($sinhvien->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $sinhvien->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop