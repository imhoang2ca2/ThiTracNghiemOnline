@extends('templates.main_auth')
@section('title', 'Thi trắc nghiệm online')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img src="{{ asset('img/Logo_dhktdn.png') }}" alt="" style="width: 130px"></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                {{--<p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>--}}
                @if (Session::has('danger') && ($message = Session::get('danger')))
                    <div class="alert alert-danger alert-dismissible">
                        <p style="font-size: 14px;">{!! $message !!}</p>
                    </div>
                @endif
                @if (Session::has('success') && ($message = Session::get('success')))
                    <div class="alert alert-success alert-dismissible">
                        <p style="font-size: 14px;"> {!! $message !!}</p>
                    </div>
                @endif
                <form action="{{ route('post.register') }}" method="post">
                    <div class="input-group mb-3">
                        <input type="text" id="HoTen" name="HoTen" value="{{ old('HoTen') }}" autofocus class="form-control" placeholder="Họ và tên">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{--<span class="fas fa-lock"></span>--}}
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('HoTen'))
                                <span class="text-danger">{{ $errors->first('HoTen') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{--<span class="fas fa-lock"></span>--}}
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{--<span class="fas fa-lock"></span>--}}
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="r_password" id="r_password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{--<span class="fas fa-lock"></span>--}}
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('r_password'))
                                <span class="text-danger">{{ $errors->first('r_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="NgaySinh" id="NgaySinh" type="date" class="form-control" value="{{ old('NgaySinh') }}" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{--<span class="fas fa-lock"></span>--}}
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('NgaySinh'))
                                <span class="text-danger">{{ $errors->first('NgaySinh') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block col-6" style="margin: auto;">Đăng ký</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>Đã có tài khoản? <a href="{{ route('get.login') }}">Đăng nhập</a> </p>

                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@stop