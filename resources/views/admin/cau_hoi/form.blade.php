<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('MaCH') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Mã câu hỏi <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="15" class="form-control"  placeholder="Mã câu hỏi" name="MaCH" value="{{ old('MaCH',isset($cauhoi) ? $cauhoi->MaCH : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('MaCH') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Môn học <sup class="text-danger">(*)</sup></label>
                            <div class="form-group">
                                <select class="custom-select" name="MaMH" required>
                                    <option value="">Chọn môn học</option>
                                    @foreach($monhoc as $key => $item)
                                        <option value="{{ $item->MaMH }}" {{ old('MaMH', isset($cauhoi->MaMH) ? $cauhoi->MaMH : '') == $item->MaMH ? "selected='selected'" : "" }}>{{  $item->TenMH }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('yr_union_birth_id'))
                                <span class="text-danger">{{ $errors->first('yr_union_birth_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->first('NoiDung') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Nội dung <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Nội dung" name="NoiDung" value="{{ old('NoiDung',isset($cauhoi) ? $cauhoi->NoiDung : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('NoiDung') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('PhuongAnA') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Phương án A <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Phương án A" name="PhuongAnA" value="{{ old('PhuongAnA',isset($cauhoi) ? $cauhoi->PhuongAnA : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('PhuongAnA') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('PhuongAnB') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Phương án B <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Phương án B" name="PhuongAnB" value="{{ old('PhuongAnB',isset($cauhoi) ? $cauhoi->PhuongAnB : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('PhuongAnB') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('PhuongAnC') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Phương án C <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Phương án C" name="PhuongAnC" value="{{ old('PhuongAnC',isset($cauhoi) ? $cauhoi->PhuongAnC : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('PhuongAnC') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('PhuongAnD') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Phương án D <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Phương án D" name="PhuongAnD" value="{{ old('PhuongAnD',isset($cauhoi) ? $cauhoi->PhuongAnD : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('PhuongAnD') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('DapAnDung') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Đáp án đúng <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Đáp án đúng" name="DapAnDung" value="{{ old('DapAnDung',isset($cauhoi) ? $cauhoi->DapAnDung : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('DapAnDung') }}</p></span>
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
