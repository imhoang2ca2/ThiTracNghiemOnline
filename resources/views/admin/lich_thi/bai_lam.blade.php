<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thi.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
<div class="header">
    <div class="header-tt">
        <span class="header-tt-hp">ĐỀ THI KẾT THÚC HỌC PHẦN</span>
    </div>
    <div class="header-info">
        <span class="header-info-text">Học kỳ: {{ $thi->MaHK }}, năm học: 2021- 2022</span>
        <span class="header-info-text">Ngày thi: {{ $thi->NgayThi }}</span>
        <span class="header-info-text">Tên học phần: {{ $thi->monhoc->TenMH }}</span>
        <span class="header-info-text">Mã học phần: {{ $thi->monhoc->MaMH }}</span>
        <span class="header-info-text">Lớp: {{ $thi->hocky->Lop }}</span>
        <span class="header-info-text">Thời gian làm bài: {{ $thi->ThoiGianThi }} / phút</span>
        <span class="header-info-text">Số câu: {{ $thi->SoLuongCauHoi }} câu</span>
        <hr width="100%" />
    </div>
    {{-- @php
        dd($traloi);
    @endphp --}}
    <div class="wrapper">
        <div class="wrapper-heading">
            ĐỀ THI
        </div>
        <div class="wrapper-content">
            <div id="quiz">
                <form action="{{ route('traloide', [$thi->MaDeThi, $thi->id]) }}" method="POST">
                    @csrf
                    @if (!$cauhoidethi->isEmpty())
                        @foreach($cauhoidethi as $key => $cauhoi)
                            <div class="question">
                                Câu {{ $key + 1 }}. {{ $cauhoi->cauhoi->NoiDung }}
                            </div>
                            <div class="answers">
                                <label>
                                    <input type="radio" name="question[{{ $cauhoi->cauhoi->MaCH }}][]" value="A" {{ isset($traloi[$cauhoi->cauhoi->MaCH]) && $traloi[$cauhoi->cauhoi->MaCH] == 'A' ? "checked" : '' }}> A. {{ $cauhoi->cauhoi->PhuongAnA }}
                                </label>
                                <label>
                                    <input type="radio" name="question[{{ $cauhoi->cauhoi->MaCH }}][]" value="B" {{ isset($traloi[$cauhoi->cauhoi->MaCH]) && $traloi[$cauhoi->cauhoi->MaCH] == 'B' ? "checked" : ''}}> B. {{ $cauhoi->cauhoi->PhuongAnB }}
                                </label>
                                <label>
                                    <input type="radio" name="question[{{ $cauhoi->cauhoi->MaCH }}][]" value="C" {{ isset($traloi[$cauhoi->cauhoi->MaCH]) &&  $traloi[$cauhoi->cauhoi->MaCH] == 'C' ? "checked" : '' }}> C. {{ $cauhoi->cauhoi->PhuongAnC }}
                                </label>
                                <label>
                                    <input type="radio" name="question[{{ $cauhoi->cauhoi->MaCH }}][]" value="D" {{ isset($traloi[$cauhoi->cauhoi->MaCH]) &&  $traloi[$cauhoi->cauhoi->MaCH] == 'D' ? "checked" : '' }} > D. {{ $cauhoi->cauhoi->PhuongAnD }}
                                </label>
                            </div>
                        @endforeach
                    @else
                        @foreach($cauhoi as $key => $ch)
                            <div class="question">
                                Câu {{ $key + 1 }}. {{ $ch->NoiDung }}
                            </div>
                            <div class="answers">
                                <label>
                                    <input type="radio" name="question[{{ $ch->MaCH }}][]" value="A"> A. {{ $ch->PhuongAnA }}
                                </label>
                                <label>
                                    <input type="radio" name="question[{{ $ch->MaCH }}][]" value="B"> B. {{ $ch->PhuongAnB }}
                                </label>
                                <label>
                                    <input type="radio" name="question[{{ $ch->MaCH }}][]" value="C"> C. {{ $ch->PhuongAnC }}
                                </label>
                                <label>
                                    <input type="radio" name="question[{{ $ch->MaCH }}][]" value="D"> D. {{ $ch->PhuongAnD }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>

</div>
</body>

</html>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script>
    $(function () {
        function startTimer(duration, display, btnSubmit) {
            var timer = duration, minutes, seconds;
            var setTime = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = 0;
                    btnSubmit.click();
                    clearInterval(setTime)
                    return false;
                }
            }, 1000);
        }
        window.onload = function () {
            var fiveMinutes = 60 * parseInt({{ getTimeThi($thi->NgayThi, $thi->ThoiGianThi) }});
            var display = document.querySelector('#min');
            var btnSubmit = document.querySelector('#submit');
            startTimer(fiveMinutes, display, btnSubmit);
        };
    })

</script>