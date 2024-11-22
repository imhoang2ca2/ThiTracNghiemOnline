@extends('templates.main_auth')
@section('title', 'Thi trắc nghiệm online')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img src="{{ asset('img/Logo_dhktdn.png') }}" alt="" style="width: 130px"></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>
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
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input name="mssv" type="text" class="form-control" placeholder="Mã số sinh viên or email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('mssv'))
                                <span class="text-danger">{{ $errors->first('mssv') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($errors->first('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block col-6" style="margin: auto;">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>Chưa có tài khoản? <a href="{{ route('get.register')  }}">Đăng ký</a> </p>

                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@stop