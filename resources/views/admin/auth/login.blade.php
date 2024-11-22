@extends('admin.layouts.main_auth')
@section('title', 'Đăng nhập')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#" class="text-uppercase"><b>Đăng nhập</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card shadow-lg rounded-3">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-muted">Đăng nhập để bắt đầu phiên làm việc</p>
                @if (session('danger'))
                    <p class="login-box-msg text-danger">{{ session('danger') }}</p>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->first('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->first('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block shadow-lg">Đăng nhập</button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="#" class="text-primary">Quên mật khẩu?</a>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@stop

@push('styles')
    <style>
        /* Background */
        body {
            background: linear-gradient(to right, #4caf50, #81c784); /* Gradient từ xanh lá */
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 360px;
            padding: 20px;
            background: #ffffff; /* Màu nền cho login box */
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-logo a {
            font-size: 36px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
            background: -webkit-linear-gradient(45deg, #ff6f61, #ff8a00);
            -webkit-background-clip: text;
            color: transparent;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .login-card-body {
            padding: 30px;
            background-color: #ffffff;
        }

        .login-box-msg {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group-text {
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .input-group input {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-block {
            width: 100%;
            border-radius: 5px;
            padding: 15px;
            font-size: 16px;
        }

        .text-primary {
            font-weight: bold;
            text-decoration: none;
        }

        .text-primary:hover {
            text-decoration: underline;
        }

        /* Màu sắc cho các thông báo lỗi */
        .text-danger {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
@endpush
