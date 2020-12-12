<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Quản lý KTX | AdminLTE 3</title>

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
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">

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

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				@if(Gate::any(['Admin', 'RoomManager']))
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">{{ count($notifyTotal) }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-hands-helping mr-2"></i>{{ count($notifyBooking) }} đơn đặt phòng
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-handshake-slash mr-2"></i>{{ count($notifyCancel) }} đơn trả phòng sớm
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-american-sign-language-interpreting mr-2"></i>{{ count($notifyRequest) }} đơn yêu cầu
						</a>
						<div class="dropdown-divider"></div>
						<a href="{{ route('admin.notification.index') }}" class="dropdown-item dropdown-footer">Xem tất cả</a>
					</div>
				</li>
				@endif
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
						class="fas fa-th-large"></i></a>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-danger elevation-4">
				<!-- Brand Logo -->
				<a href="{{ route('admin.dashboard') }}" class="brand-link">
					<img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">KTX Captain Hoàng Trí</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 d-flex">
						<div class="image">
							<img src="{{ asset('adminlte/dist/img/boxed-bg.png') }}" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="" class="d-block">{{ $user->name }}</a>
						</div>
					</div>
 
					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			 	<!-- Add icons to the links using the .nav-icon class
			 		with font-awesome or any other icon font library -->
			 		<li class="nav-item user-panel mb-2">
			 			<a href="{{ route('index') }}" class="nav-link">
			 				<i class="nav-icon fas fa-globe"></i>
			 				<p>
			 					Xem trang web
			 				</p>
			 			</a>
			 		</li>

			 		<li class="nav-item">
			 			<a href="{{ route('admin.dashboard') }}" class="nav-link active">
			 				<i class="nav-icon fas fa-chart-pie"></i>
			 				<p>
			 					Dashboard
			 				</p>
			 			</a>
			 		</li>

			 		@if(Gate::any(['Admin', 'RoomManager']))
			 		<li class="nav-item has-treeview">
			 			<a href="#" class="nav-link">
			 				<i class="nav-icon fas fa-home"></i>
			 				<p>
			 					Quản lý nơi ở
			 					<i class="right fas fa-angle-left"></i>
			 				</p>
			 			</a>
			 			<ul class="nav nav-treeview">
			 				<li class="nav-item">
			 					<a href="{{ route('areas.index') }}" class="nav-link">
			 						<i class="fas fa-map-marked-alt nav-icon"></i>
			 						<p>Quản lý khu vực</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="{{ route('typesroom.index') }}" class="nav-link">
			 						<i class="fab fa-buffer nav-icon"></i>
			 						<p>Quản lý loại phòng</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="{{ route('rooms.index') }}" class="nav-link">
			 						<i class="fas fa-door-open nav-icon"></i>
			 						<p>Quản lý phòng</p>
			 					</a>
			 				</li>
			 			</ul>
			 		</li>
			 		@endif

			 		@if(Gate::any(['Admin']))
			 		<li class="nav-item has-treeview">
			 			<a href="#" class="nav-link">
			 				<i class="nav-icon fas fa-user"></i>
			 				<p>
			 					Quản lý tài khoản
			 					<i class="right fas fa-angle-left"></i>
			 				</p>
			 			</a>
			 			<ul class="nav nav-treeview">
			 				<li class="nav-item">
			 					<a href="{{ route('users.index') }}" class="nav-link">
			 						<i class="fas fa-address-book nav-icon"></i>
			 						<p>Danh sách tài khoản</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="{{ route('admin.role') }}" class="nav-link">
			 						<i class="fas fa-user-tag nav-icon"></i>
			 						<p>Vai trò</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="{{ route('admin.users.request') }}" class="nav-link">
			 						<i class="fas fa-hand-sparkles nav-icon"></i>
			 						<p>Yêu cầu</p>
			 						<span class="right badge badge-danger">New</span>
			 					</a>
			 				</li>
			 			</ul>
			 		</li>
			 		@endif

			 		@if(Gate::any(['Admin', 'RoomManager']))
			 		<li class="nav-item has-treeview">
			 			<a href="#" class="nav-link">
			 				<i class="nav-icon fas fa-file-invoice-dollar"></i>
			 				<p>
			 					Quản lý đơn
			 					<i class="right fas fa-angle-left"></i>
			 				</p>
			 			</a>
			 			<ul class="nav nav-treeview">
			 				<li class="nav-item">
			 					<a href="{{ route('booking.index') }}" class="nav-link">
			 						<i class="fas fa-calendar-check nav-icon"></i>
			 						<p>Đơn đặt phòng</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="{{ route('cancel.index') }}" class="nav-link">
			 						<i class="fas fa-calendar-times nav-icon"></i>
			 						<p>Đơn hủy phòng</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="{{ route('request.index') }}" class="nav-link">
			 						<i class="fas fa-coffee nav-icon"></i>
			 						<p>Đơn yêu cầu</p>
			 						<span class="right badge badge-danger">New</span>
			 					</a>
			 				</li>
			 			</ul>
			 		</li>
			 		@endif

			 		@if(Gate::any(['Admin', 'Cashier']))
			 		<li class="nav-item">
			 			<a href="{{ route('admin.notification.index') }}" class="nav-link">
			 				<i class="nav-icon fas fa-file-invoice"></i>
			 				<p>Hóa đơn</p>
			 			</a>
			 		</li>
			 		@endif

			 		@if(Gate::any(['Admin', 'RoomManager']))
			 		<li class="nav-item">
			 			<a href="{{ route('admin.notification.index') }}" class="nav-link">
			 				<i class="nav-icon fas fa-bell"></i>
			 				<p>Thông báo</p>
			 				@if(count($notifyTotal) != 0)
			 				<span class="right badge badge-warning">{{ count($notifyTotal) }}</span>
			 				@endif
			 			</a>
			 		</li>
			 		@endif

			 		<li class="nav-item">
			 			<a href="{{ route('admin.review.index') }}" class="nav-link">
			 				<i class="nav-icon fas fa-comment-alt"></i>
			 				<p>
			 					Đánh giá phòng
			 				</p>
			 			</a>
			 		</li>

			 		@if(Gate::any(['Admin', 'RoomManager']))
			 		<li class="nav-item">
			 			<a href="{{ route('admin.feedback.index') }}" class="nav-link">
			 				<i class="nav-icon fas fa-comment"></i>
			 				<p>Phản hồi</p>
			 				@if(count($notifyFeedback) != 0)
			 				<span class="right badge badge-warning">{{ count($notifyFeedback) }}</span>
			 				@endif
			 			</a>
			 		</li>
			 		@endif

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
				Anything you want
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
	<!-- daterangepicker -->
	<script src="{{ asset('adminlte/plugins/moment/moment.min.js')}}"></script>
	<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
	<!-- Summernote -->
	<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- ChartJS -->
	<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
	<!-- Sparkline -->
	<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
	<!-- JQVMap -->
	<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
	<!-- jQuery Knob Chart -->
	<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
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
