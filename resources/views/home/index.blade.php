<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
</head>
<body>

<header>

</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Danh sách khóa học</h1>
            <p class="lead text-muted">Chúng tôi cung cấp những khóa học phù hợp nhất với bạn. Vui lòng đăng ký tài khoản thi thử để chúng tôi gợi ý cho bạn khóa học phù  hợp nhất</p>
            <p>
                <a href="{{ route('user.home') }}" class="btn btn-primary my-2">Trang chủ</a>
                <a href="{{ route('get.register') }}" class="btn btn-success my-2">Đăng ký tài khoản</a>
                <a href="{{ route('get.login') }}" class="btn btn-info my-2">Đăng nhập</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($monhoc as $item)
                <div class="col-md-4">
                    <a href="{{ route('course.detail', $item->id) }}"><img src="{{ asset('img/'. $item->image) }}" alt="" width="100%" height="225"></a>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <a href="{{ route('course.detail', $item->id) }}"><p class="card-text">{{ $item->TenMH }}</p></a>

                            <div class="d-flex justify-content-between align-items-center" style="margin-top: 15px">
                                <div class="btn-group">
                                    <a href="{{ route('course.detail', $item->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Chi tiết </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>


</body>
</html>
