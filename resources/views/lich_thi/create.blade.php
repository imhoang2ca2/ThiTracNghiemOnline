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
    <div class="detail-heading">Tạo lịch thi</div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('danhsachlichthi') }}" class="btn btn-success btn-create">Danh sách</a>
            <div class="col-12">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label-input">Danh sách lớp<span class="text-danger">*</span></label>
                                    <select class="custom-select" name="Lop" required>
                                        <option value="">Chọn lớp</option>
                                        @foreach($lop as $key => $item)
                                            <option value="{{ $item->Lop }}" {{ old('Lop') == $item->Lop ? "selected='selected'" : "" }}>{{ $item->Lop }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label-input">Học kỳ<span class="text-danger">*</span></label>
                                    <select class="custom-select" name="MaHK" required>
                                        <option value="">Chọn học kỳ</option>
                                        @foreach($hocky as $key => $hk)
                                            <option value="{{ $hk->MaHK }}" {{ old('MaHK') == $hk->MaHK ? "selected='selected'" : "" }}>{{ $hk->MaHK }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label-input">Môn học<span class="text-danger">*</span></label>
                                    <select class="custom-select" name="MaMH" required>
                                        <option value="">Chọn môn học</option>
                                        @foreach($monhoc as $key => $mh)
                                            <option value="{{ $mh->MaMH }}" {{ old('MaMH') == $mh->MaMH ? "selected='selected'" : "" }}>{{ $mh->TenMH }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label-input">Ngày thi<span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" value="" required name="NgayThi">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label-input">Thời gian thi<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="" required name="ThoiGianThi">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label-input">Số lượng câu hỏi<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="" required name="SoLuongCauHoi">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="submit" value="admin" class="btn btn-info btn-save">
                                    <i class="fa fa-save"></i> Lưu dữ liệu
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
</html>
