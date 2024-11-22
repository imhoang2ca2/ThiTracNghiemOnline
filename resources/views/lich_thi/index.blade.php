<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <title>Danh sách lịch thi</title>
</head>
<body>
<div class="header">
    <div class="header-img">
        <img src="{{ asset('img/sv_header_login.png') }}" alt="">
    </div>
    <div class="header-logout">
        <i class="fas fa-sign-out-alt header-logout-icon"></i>
        <a class="header-logout-link" href="{{ url('logout') }}">Đăng xuất </a>
        <a href=""></a>
    </div>
</div>
<div class="wrapper">
    <div class="detail-heading">Danh sách lịch thi</div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('taolich') }}" class="btn btn-success btn-create"> Tạo lịch thi</a>
            <div class="col-12">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Học kỳ</th>
                        <th scope="col">Môn Học</th>
                        <th scope="col">Ngày thi</th>
                        <th scope="col">Thời gian thi</th>
                        <th scope="col">Số lượng câu hỏi</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!$lichthi->isEmpty())
                            @php $i = $lichthi->firstItem() @endphp
                            @foreach($lichthi as $key => $lich)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $lich->Lop }}</td>
                                    <td>{{ $lich->MaHK }}</td>
                                    <td>{{ $lich->MaMH }}</td>
                                    <td>{{ $lich->NgayThi }}</td>
                                    <td>{{ $lich->ThoiGianThi }}/ phút</td>
                                    <td>{{ $lich->SoLuongCauHoi }}/ câu</td>
                                    <td>
                                        <a href="{{ route('chinhsualich', $lich->id) }}">Edit</a>
                                        <a href="{{ route('xoalich', $lich->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="box-footer text-right" >

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
</html>
