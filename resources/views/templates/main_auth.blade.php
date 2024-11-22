<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('admin/dist/css/adminlte.min.css') !!}">
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #4b6cb7, #182848);
            background-size: 400% 400%;
            animation: gradientBackground 15s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            text-align: center;
        }

        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            color: #333;
        }

        .login-logo a {
            font-size: 2rem;
            font-weight: 600;
            color: #4b6cb7;
            text-shadow: 1px 1px rgba(255, 255, 255, 0.5);
        }

        .login-box .btn-primary {
            background-color: #4b6cb7;
            border: none;
            transition: all 0.3s;
        }

        .login-box .btn-primary:hover {
            background-color: #354a7d;
        }

        .icheck-primary input[type="checkbox"] {
            border-radius: 3px;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>THI TRẮC NGHIỆM</b> ONLINE</a>
        </div>
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{!! asset('admin/plugins/jquery/jquery.min.js') !!}"></script>
    <!-- Bootstrap 4 -->
    <script src="{!! asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <!-- AdminLTE App -->
    <script src="{!! asset('admin/dist/js/adminlte.min.js') !!}"></script>
</body>
</html>
