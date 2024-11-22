@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lich.thi.index') }}">Danh sách sinh viên</a></li>
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
                                {{--<div class="btn-group">--}}
                                    {{--<a href="{{ route('lich.thi.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>Mã sinh viên</th>
                                    <th>Mã Học kỳ</th>
                                    <th>Mã Môn học</th>
                                    <th>Ngày thi</th>
                                    <th>Thời gian thi</th>
                                    <th>Số lượng câu hỏi</th>
                                    <th>Mã đề thi</th>
                                    <th>Giờ vào thi</th>
                                    <th>Trạng thái</th>
                                    <th>Bài Làm</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!$thi->isEmpty())
                                    @foreach($thi as $key => $item)
                                        <tr>
                                            <td>{{ $item->MaSV }}</td>
                                            <td>{{ $item->MaHK }}</td>
                                            <td>{{ $item->MaMH }}</td>
                                            <td>{{ $item->NgayThi }}</td>
                                            <td>{{ $item->ThoiGianThi }}/ phút</td>
                                            @if ($item->TrangThai)
                                                <?php
                                                $bailam = \DB::table('bailam')->where('MaDeThi', $item->MaDeThi)->get()->toArray();
                                                $cauhoidethi = \DB::table('cauhoidethi')->where('MaDeThi', $item->MaDeThi)->get();
                                                $point = 0;
                                                foreach($bailam as $key => $bl) {
                                                    foreach($cauhoidethi as $keys => $chdt) {
                                                        if ($bl->MaCH == $chdt->MaCH && $bl->TraLoi == $chdt->dapan ) {
                                                            $point = $point + 1;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <th scope="col">{{ $point }} / {{ $item->SoLuongCauHoi }} câu</th>
                                            @else
                                                <th scope="col">{{ $item->SoLuongCauHoi }} câu</th>
                                            @endif
                                            <td>{{ $item->MaDeThi }}</td>
                                            <td>{{ $item->GioVaoThi }}</td>
                                            <td>{{ $item->TrangThai ? 'Đã thi' : 'Chưa thi' }}</td>
                                            <td><a href="{{ route('bai.lam', [$item->MaSV, $item->MaDeThi]) }}">Bài làm</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
