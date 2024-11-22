<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('MaMH') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Mã môn học <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="15" class="form-control"  placeholder="Mã khóa học" name="MaMH" value="{{ old('MaMH',isset($monhoc) ? $monhoc->MaMH : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('MaMH') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('TenMH') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Tên môn học <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="255" class="form-control"  placeholder="Tên khóa học" name="TenMH" value="{{ old('TenMH',isset($monhoc) ? $monhoc->TenMH : '') }}" required>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('TenMH') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('image') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Hình ảnh</label>
                            <div>
                                <input type="file" maxlength="255" class="form-control" name="image">
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('image') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Mô tả môn học </label>
                            <div>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control" style="height: 225px;">{{ old('content', isset($monhoc) ? $monhoc->content : '') }}</textarea>
                                <script>
                                    ckeditor(content);
                                </script>
                                @if ($errors->first('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
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
