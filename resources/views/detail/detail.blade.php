@extends('templates.master')
@section('title', 'Thi trắc nghiệm online')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center">THÔNG TIN SINH VIÊN</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row invoice-info">
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Thông tin</b><br>
                                    <br>
                                    <b>Họ tên:</b> {{ $user->HoTen }}<br>
                                    <b>Lớp:</b> {{ $user->Lop }}<br>
                                    <b>Ngày sinh:</b> {{ $user->NgaySinh }}<br>
                                    <b>Email:</b> {{ $user->email }}
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Danh sách bài thi</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Môn học</th>
                                    <th scope="col">Khóa </th>
                                    <th scope="col">Thời gian làm bài </th>
                                    <th scope="col">Số lượng câu hỏi </th>
                                    <th scope="col">Điểm</th>
                                    <th scope="col">Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!$danhSachThi->isEmpty())
                                    @php $i = $danhSachThi->firstItem() @endphp
                                    @php $suggest = []; @endphp
                                    @foreach($danhSachThi as $key => $thi)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $thi->monhoc->TenMH }}</td>
                                            <td>{{ $thi->MaHK }}</td>
                                            <td>{{ $thi->ThoiGianThi }}/ phút</td>
                                            @if ($thi->TrangThai)
                                                <?php
                                                $bailam = \DB::table('bailam')->where('MaDeThi', $thi->MaDeThi)->get()->toArray();
                                                $cauhoidethi = \DB::table('cauhoidethi')->where('MaDeThi', $thi->MaDeThi)->get();
                                                $point = 0;
                                                foreach($bailam as $key => $bl) {
                                                    foreach($cauhoidethi as $keys => $chdt) {
                                                        if ($bl->MaCH == $chdt->MaCH && $bl->TraLoi == $chdt->dapan ) {
                                                            $point = $point + 1;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <th scope="col">{{ $point }} / {{ $thi->SoLuongCauHoi }} câu</th>
                                                <?php
                                                $percent = ((($point / $thi->SoLuongCauHoi) * 100) * 10) / 100 ;
                                                if ($percent < 5 && $thi->monhoc->MaMH == 'PHPCOBAN') {
                                                    $suggest = ['PHPCOBAN'];
                                                } else if ($percent >= 5 && $thi->monhoc->MaMH == 'PHPCOBAN') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO'];
                                                }

                                                if ($percent < 5 && $thi->monhoc->MaMH == 'PHPNANGCAO') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO'];
                                                } else if($percent >= 5 && $thi->monhoc->MaMH == 'PHPNANGCAO') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO', 'MYSQLCOBAN'];
                                                }

                                                if ($percent < 5 && $thi->monhoc->MaMH == 'MYSQLCOBAN') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO', 'MYSQLCOBAN'];
                                                } else if ($percent >= 5 && $thi->monhoc->MaMH == 'MYSQLCOBAN') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO', 'MYSQLCOBAN', 'MYSQLNANGCAO'];
                                                }

                                                if ($percent < 5 && $thi->monhoc->MaMH == 'MYSQLNANGCAO') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO', 'MYSQLCOBAN', 'MYSQLNANGCAO'];
                                                } else if ($percent >= 5 && $thi->monhoc->MaMH == 'MYSQLNANGCAO') {
                                                    $suggest = ['PHPCOBAN', 'PHPNANGCAO', 'MYSQLCOBAN', 'MYSQLNANGCAO', 'PHPMYSQL'];
                                                }
                                                ?>
                                                <th>{{ round($percent, 2) }}</th>
                                            @else
                                                <th scope="col">{{ $thi->SoLuongCauHoi }}</th>
                                                <th>Chưa thi</th>
                                            @endif
                                            <td>
                                                @if ($thi->TrangThai)
                                                    <button type="button" class="btn btn-block btn-success btn-xs">Đã thi</button>
                                                @else
                                                    <a href="{{ route('vaothi', $thi->id) }}" class="btn btn-block btn-success btn-xs">Vào thi</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <div class="row footer-nav">
                                    {{ $danhSachThi->appends($query = '')->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@stop