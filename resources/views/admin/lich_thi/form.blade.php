<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label class="label-input">Danh sách lớp<span class="text-danger">*</span></label>
                            <select class="custom-select" name="Lop" required>
                                <option value="">Chọn lớp</option>
                                @foreach($lop as $key => $item)
                                    <option value="{{ $item->Lop }}" {{ old('Lop', isset($lichthi->Lop) ? $lichthi->Lop : '') == $item->Lop ? "selected='selected'" : "" }}>{{ $item->Lop }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-input">Học kỳ<span class="text-danger">*</span></label>
                            <select class="custom-select" name="MaHK" required>
                                <option value="">Chọn học kỳ</option>
                                @foreach($hocky as $key => $hk)
                                    <option value="{{ $hk->MaHK }}" {{ old('MaHK',  isset($lichthi->MaHK) ? $lichthi->MaHK : '') == $hk->MaHK ? "selected='selected'" : "" }}>{{ $hk->MaHK }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="label-input">Môn học<span class="text-danger">*</span></label>
                            <select class="custom-select" name="MaMH" required>
                                <option value="">Chọn môn học</option>
                                @foreach($monhoc as $key => $mh)
                                    <option value="{{ $mh->MaMH }}" {{ old('MaMH',  isset($lichthi->MaMH) ? $lichthi->MaMH : '') == $mh->MaMH ? "selected='selected'" : "" }}>{{ $mh->TenMH }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="label-input">Số lượng câu hỏi<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" value="{{ old('SoLuongCauHoi', isset($lichthi->SoLuongCauHoi) ? $lichthi->SoLuongCauHoi : '') }}" required name="SoLuongCauHoi">
                        </div>

                        <!-- Thêm trường chọn ngày và giờ thi -->
                        <div class="form-group">
                            <label class="label-input">Ngày và giờ thi<span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" 
                                value="{{ old('NgayThi', isset($lichthi->NgayThi) ? date('Y-m-d\TH:i', strtotime($lichthi->NgayThi)) : '') }}" 
                                required name="NgayThi">
                        </div>

                        <div class="form-group">
                            <label class="label-input">Thời gian thi (phút)<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" value="{{ old('ThoiGianThi', isset($lichthi->ThoiGianThi) ? $lichthi->ThoiGianThi : '') }}" required name="ThoiGianThi">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Xuất bản</h3>
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
