<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('MaSV') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Mã Sinh viên <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="15" class="form-control"  placeholder="Mã sinh viên" name="MaSV" value="{{ old('MaSV',isset($sinhvien) ? $sinhvien->MaSV : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('MaSV') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('HoTen') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Họ Và Tên <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Họ và Tên" name="HoTen" value="{{ old('HoTen',isset($sinhvien) ? $sinhvien->HoTen : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('HoTen') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('Lop') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Lớp <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Lớp" name="Lop" value="{{ old('Lop',isset($sinhvien) ? $sinhvien->Lop : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('Lop') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('NgaySinh') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Ngày Sinh <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="date"class="form-control"  placeholder="Ngày Sinh" name="NgaySinh" value="{{ old('NgaySinh',isset($sinhvien) ? $sinhvien->NgaySinh : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('HoTen') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Email<sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="email" name="email" value="{{ old('email',isset($sinhvien) ? $sinhvien->email : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('email') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">password<sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="password" name="password" value="{{ old('password',isset($sinhvien) ? $sinhvien->password : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('password') }}</p></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Xuất bản</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-set">
                            <button type="submit" name="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Lưu dữ liệu
                            </button>
                            <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                <i class="fa fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
