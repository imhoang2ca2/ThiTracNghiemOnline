@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lich.thi.index') }}">Lịch thi</a></li>
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
                                    <a href="{{ route('lich.thi.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Lớp</th>
                                        <th>Khóa </th>
                                        <th>Khóa học</th>
                                        {{--<th>Ngày thi</th>--}}
                                        <th>Thời gian thi</th>
                                        <th>Số lượng câu hỏi</th>
                                        <th>Danh sách</th>
                                        {{--<th>Trạng thái</th>--}}
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$lichthi->isEmpty())
                                        @php $i = $lichthi->firstItem(); @endphp
                                        @foreach($lichthi as $key => $lich)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td>{{ $lich->Lop }}</td>
                                                <td>{{ $lich->MaHK }}</td>
                                                <td>{{ $lich->MaMH }}</td>
                                                {{--<td>{{ $lich->NgayThi }}</td>--}}
                                                <td>{{ $lich->ThoiGianThi }}/ phút</td>
                                                <td>{{ $lich->SoLuongCauHoi }}/ câu</td>
                                                <td><a href="{{ route('danh.sach.sinh.vien', $lich->id) }}">Danh sách</a></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('lich.thi.update', $lich->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('lich.thi.delete', $lich->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($lichthi->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $lichthi->appends($query = '')->links() }}
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
