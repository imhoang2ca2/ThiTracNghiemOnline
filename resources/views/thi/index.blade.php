@extends('templates.master')
@section('title', 'Thi trắc nghiệm online')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="card">
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="m-0 text-center">BỘ GIÁO DỤC VÀ ĐÀO TẠO TRƯỜNG ĐẠI HỌC KIẾN TRÚC</h5>
                            <h5 class="m-0 text-center">ĐỀ THI KẾT THÚC HỌC PHẦN</h5>
                        </div>

                        <div class="card-body">
                            <div class="row invoice-info">
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <div style="margin-left: 20%">
                                        <b>Học kỳ:</b> {{ $thi->MaHK }}, năm học: 2024-2025<br>
                                        <b>Ngày thi: </b> {{ $thi->NgayThi }}<br>
                                        <b>Tên học phần: </b> {{ $thi->monhoc->TenMH }}<br>
                                        <b>Mã học phần: </b> {{ $thi->monhoc->MaMH }} <br>
                                    </div>
                                </div>
                                <div class="col-sm-6 invoice-col">
                                    <div style="margin-left: 20%">
                                        <b>Họ và tên: </b> {{ $user->HoTen }} <br>
                                        <b>Lớp: </b> {{ $thi->hocky->Lop }} <br>
                                        <b>Thời gian làm bài: </b> {{ $thi->ThoiGianThi }} / phút <br>
                                        <b>Số câu: </b> {{ $thi->SoLuongCauHoi }} câu <br>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row invoice-info">
                                <div class="container">
                                    <form action="{{ route('traloide', [$thi->MaDeThi, $thi->id]) }}" method="POST">
                                        @csrf
                                        @if (!$cauhoidethi->isEmpty())
                                            @foreach($cauhoidethi as $key => $cauhoi)
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label">Câu :  {{ $key + 1 }}. {{ $cauhoi->cauhoi->NoiDung }}</label>
                                                    <div class="row">
                                                        <div class="col-md-12 role-item">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" class="" value="A" name="question[{{ $cauhoi->cauhoi->MaCH }}][]"
                                                                       id="{{ safeTitle($cauhoi->cauhoi->PhuongAnA) }}_{{$cauhoi->cauhoi->MaCH}}"
                                                                >
                                                                <label for="{{ safeTitle($cauhoi->cauhoi->PhuongAnA) }}_{{$cauhoi->cauhoi->MaCH}}">A. {{ $cauhoi->cauhoi->PhuongAnA }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 role-item">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" class="" value="B" name="question[{{ $cauhoi->cauhoi->MaCH }}][]"
                                                                       id="{{ safeTitle($cauhoi->cauhoi->PhuongAnB) }}_{{$cauhoi->cauhoi->MaCH}}"
                                                                >
                                                                <label for="{{ safeTitle($cauhoi->cauhoi->PhuongAnB) }}_{{$cauhoi->cauhoi->MaCH}}" >B. {{ $cauhoi->cauhoi->PhuongAnB }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 role-item">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" class="" value="C" name="question[{{ $cauhoi->cauhoi->MaCH }}][]"
                                                                       id="{{ safeTitle($cauhoi->cauhoi->PhuongAnC) }}_{{$cauhoi->cauhoi->MaCH}}"
                                                                >
                                                                <label for="{{ safeTitle($cauhoi->cauhoi->PhuongAnC) }}_{{$cauhoi->cauhoi->MaCH}}">C. {{ $cauhoi->cauhoi->PhuongAnC }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 role-item">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" class="" value="D" name="question[{{ $cauhoi->cauhoi->MaCH }}][]"
                                                                       id="{{ safeTitle($cauhoi->cauhoi->PhuongAnD) }}_{{$cauhoi->cauhoi->MaCH}}"
                                                                >
                                                                <label for="{{ safeTitle($cauhoi->cauhoi->PhuongAnD) }}_{{$cauhoi->cauhoi->MaCH}}">D. {{ $cauhoi->cauhoi->PhuongAnD }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($cauhoi as $key => $ch)
                                            <div class="form-group">
                                                <label for="inputEmail3" class="control-label">Câu :  {{ $key + 1 }}. {{ $ch->NoiDung }}</label>
                                                <div class="row">
                                                    <div class="col-md-12 role-item">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" class="" value="A" name="question[{{ $ch->MaCH }}][]"
                                                                   id="{{ safeTitle($ch->PhuongAnA) }}_{{$ch->MaCH}}"
                                                            >
                                                            <label for="{{ safeTitle($ch->PhuongAnA) }}_{{$ch->MaCH}}">A. {{ $ch->PhuongAnA }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 role-item">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" class="" value="B" name="question[{{ $ch->MaCH }}][]"
                                                                   id="{{ safeTitle($ch->PhuongAnB) }}_{{$ch->MaCH}}"
                                                            >
                                                            <label for="{{ safeTitle($ch->PhuongAnB) }}_{{$ch->MaCH}}" >B. {{ $ch->PhuongAnB }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 role-item">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" class="" value="C" name="question[{{ $ch->MaCH }}][]"
                                                                   id="{{ safeTitle($ch->PhuongAnC) }}_{{$ch->MaCH}}"
                                                            >
                                                            <label for="{{ safeTitle($ch->PhuongAnC) }}_{{$ch->MaCH}}">C. {{ $ch->PhuongAnC }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 role-item">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" class="" value="D" name="question[{{ $ch->MaCH }}][]"
                                                                   id="{{ safeTitle($ch->PhuongAnD) }}_{{$ch->MaCH}}"
                                                            >
                                                            <label for="{{ safeTitle($ch->PhuongAnD) }}_{{$ch->MaCH}}">D. {{ $ch->PhuongAnD }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                        <button style="z-index:999;position:fixed;bottom:3%;right:170px;padding:5px 10px;font-weight:bold;font-size:20px" id="submit" type="submit" class="btn btn-success">Nộp Bài</button>
                                        <div id="count_down" class="is-countdown">
                                            <span id="min"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@stop

@section('script')
    <script>
        function startTimer(duration, display, btnSubmit, warningThreshold = 30) {  // Set threshold to 30 seconds
            var timer = duration, minutes, seconds;
            timer = timer + 60;
            var setTime = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = 0;
                    btnSubmit.click();
                    clearInterval(setTime);
                    return false;
                }

                var notification = window.localStorage.getItem('show-notification');
                // Trigger warning when 30 seconds are left
                if (timer <= warningThreshold && notification == 'show') {
                    $.confirm({
                        title: 'Thông báo',
                        content: 'Thời gian thi sắp hết, vui lòng nộp bài thi',
                        buttons: {
                            confirm: function () {
                                return true;
                            },
                        }
                    });
                    window.localStorage.setItem('show-notification', 'hidden')
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveMinutes = 60 * parseInt({{ getTimeThi($thi->NgayThi, $thi->ThoiGianThi) }});
            var display = document.querySelector('#min');
            var btnSubmit = document.querySelector('#submit');

            window.localStorage.setItem('show-notification', 'show')
            startTimer(fiveMinutes, display, btnSubmit);
        };
    </script>
@stop
