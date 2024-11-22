<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>@yield('title', 'Admin')</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{!! asset('admin/plugins/fontawesome-free/css/all.min.css') !!}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{!! asset('admin/dist/css/adminlte.min.css') !!}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style>
		.footer-nav > nav {
			margin: auto;
		}
		#count_down {
			z-index: 999;
			position: fixed;
			bottom: 3%;
			right: 50px;
			padding: 7px 10px;
			background-color: yellow;
			color: red;
			font-weight: bold;
			font-size: 20px;
			border-radius: 3px;
		}
		#count_down span {
			display: inline;
		}
	</style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
		<div class="container">
			<a href="{{ route('detail') }}" class="navbar-brand">
				<img src="{{ asset('img/Logo_dhktdn.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					 style="opacity: .8">
				<span class="brand-text font-weight-light">Thi trắc nghiệm online</span>
			</a>

			<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
			</div>

			<!-- Right navbar links -->
			<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item">
					<a class="nav-link" href="{{ url('logout') }}">
						<i class="fas fa-sign-out-alt header-logout-icon"></i>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- /.navbar -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
		<div class="p-3">
			<h5>Title</h5>
			<p>Sidebar content</p>
		</div>
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">
			Anything you want
		</div>
		<!-- Default to the left -->
		<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
@yield('script')

</body>
</html>
