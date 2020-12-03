<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Trang cá nhân | AdminLTE 3</title>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">

</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="{{ route('admin.dashboard') }}" class="brand-link">
					<img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">Trang cá nhân</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 d-flex">
						<div class="image">
							@if($user->gender == 'Nam')
								<img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
							@else
								<img src="{{ asset('adminlte/dist/img/avatar2.png') }}" class="img-circle elevation-2" alt="User Image">
							@endif
							
						</div>
						<div class="info">
							<a href="#" class="d-block">{{ $user->name }}</a>
						</div>
					</div>

					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			 	<!-- Add icons to the links using the .nav-icon class
			 		with font-awesome or any other icon font library -->
			 		<li class="nav-item user-panel mb-2">
			 			<a href="{{ route('rooms.all') }}" class="nav-link">
			 				<i class="nav-icon fas fa-globe"></i>
			 				<p>
			 					Quay lại trang web
			 				</p>
			 			</a>
			 		</li>

			 		<li class="nav-item">
			 			<a href="{{ route('client.dashboard') }}" class="nav-link active">
			 				<i class="nav-icon fas fa-tachometer-alt"></i>
			 				<p>
			 					Dashboard
			 				</p>
			 			</a>
			 		</li>

			 		<li class="nav-item">
			 			<a href="{{ route('client.information') }}" class="nav-link">
			 				<i class="nav-icon fas fa-user"></i>
			 				<p>
			 					Thông tin cá nhân
			 				</p>
			 			</a>
			 		</li>
			 		<li class="nav-item">
			 			<a href="{{ route('client.password.edit') }}" class="nav-link">
			 				<i class="nav-icon fa fa-key"></i>
			 				<p>
			 					Thay đổi mật khẩu
			 				</p>
			 			</a>
			 		</li>
			 		<li class="nav-item">
			 			<a href="{{ route('client.room') }}" class="nav-link">
			 				<i class="nav-icon fa fa-home"></i>
			 				<p>
			 					Thông tin phòng
			 				</p>
			 			</a>
			 		</li>

			 		<li class="nav-item">
			 			<a href="{{ route('client.notification.index') }}" class="nav-link">
			 				<i class="nav-icon fas fa-bell"></i>
			 				<p>Thông báo</p>
			 				@if(count($notifyTotal) != 0)
			 				<span class="right badge badge-warning">{{ count($notifyTotal) }}</span>
			 				@endif
			 			</a>
			 		</li>

			 		<li class="nav-item">
			 			<a href="{{ route('logout') }}" class="nav-link">
			 				<i class="nav-icon fas fa-sign-out-alt"></i>
			 				<p>
			 					Đăng xuất
			 				</p>
			 			</a>
			 		</li>
			 	</ul>
			 </nav>
			 <!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>


		@yield('content')


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
				
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2014-<?=date('Y') ?> <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
	<!-- SweetAlert2 -->
	<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

	<!-- Summernote -->
	<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

	<script>
		$(function () {
	 // Summernote
	 $('.textarea').summernote()
	})
</script>
<!-- //Summernote -->

<script type="text/javascript">
	function confirmDestroy() {
		return confirm('Bạn chắc chứ?');
	}

	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		@if(session()->get('flag'))
		@if(session()->get('flag') == 'success')
		$('.swalDefaultSuccess').ready(function() {
			Toast.fire({
				icon: "success",
				title: "&nbsp &nbsp {{ session()->get('message') }}."
			})
		}); 
		@elseif(session()->get('flag') == 'error')
		$('.swalDefaultError').ready(function() {
			Toast.fire({
				icon: "error",
				title: "&nbsp &nbsp {{ session()->get('message') }}."
			})
		}); 
		@elseif(session()->get('flag') == 'warning')
		$('.swalDefaultWarning').ready(function() {
			Toast.fire({
				icon: "warning",
				title: "&nbsp &nbsp {{ session()->get('message') }}."
			})
		}); 
		@endif
		@endif

		$('.swalDefaultWarning').click(function() {
			Toast.fire({
				icon: 'warning',
				title: 'Không thể xóa phòng khi có khách hàng đang ở.'
			})
		});
	});
</script>
</body>
</html>
