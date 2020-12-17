<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Quản lý KTX | AdminLTE 3</title>
	<link rel="shortcut icon" href="<?php echo e(asset('image/iconweb.png')); ?>">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/adminlte.min.css')); ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.css')); ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/daterangepicker/daterangepicker.css')); ?>">

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
				<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge"><?php echo e(count($notifyTotal)); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="<?php echo e(route('booking.index')); ?>" class="dropdown-item">
							<i class="fas fa-hands-helping mr-2"></i><?php echo e(count($notifyBooking)); ?> đơn đặt phòng
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo e(route('cancel.index')); ?>" class="dropdown-item">
							<i class="fas fa-handshake-slash mr-2"></i><?php echo e(count($notifyCancel)); ?> đơn trả phòng sớm
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo e(route('request.index')); ?>" class="dropdown-item">
							<i class="fas fa-american-sign-language-interpreting mr-2"></i><?php echo e(count($notifyRequest)); ?> đơn yêu cầu
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo e(route('admin.notification.index')); ?>" class="dropdown-item dropdown-footer">Xem tất cả</a>
					</div>
				</li>
				<?php endif; ?>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
						class="fas fa-th-large"></i></a>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-danger elevation-4 ">
				<!-- Brand Logo -->
				<a href="<?php echo e(route('admin.dashboard')); ?>" class="brand-link">
					<img src="<?php echo e(asset('image/icon2.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">KTX Captain Hoàng Trí</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 d-flex">
						<div class="image">
							<img src="<?php echo e(asset('adminlte/dist/img/boxed-bg.png')); ?>" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="" class="d-block"><?php echo e($user->name); ?></a>
						</div>
					</div>
 
					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
			 	<!-- Add icons to the links using the .nav-icon class
			 		with font-awesome or any other icon font library -->
			 		<li class="nav-item user-panel mb-2">
			 			<a href="<?php echo e(route('index')); ?>" class="nav-link">
			 				<i class="nav-icon fas fa-globe"></i>
			 				<p>
			 					Xem trang web
			 				</p>
			 			</a>
			 		</li>

			 		<li class="nav-item">
			 			<a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link active">
			 				<i class="nav-icon fas fa-chart-pie"></i>
			 				<p>
			 					Dashboard
			 				</p>
			 			</a>
			 		</li>

			 		<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
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
			 					<a href="<?php echo e(route('areas.index')); ?>" class="nav-link">
			 						<i class="fas fa-map-marked-alt nav-icon"></i>
			 						<p>Quản lý khu vực</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="<?php echo e(route('typesroom.index')); ?>" class="nav-link">
			 						<i class="fab fa-buffer nav-icon"></i>
			 						<p>Quản lý loại phòng</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="<?php echo e(route('rooms.index')); ?>" class="nav-link">
			 						<i class="fas fa-door-open nav-icon"></i>
			 						<p>Quản lý phòng</p>
			 					</a>
			 				</li>
			 			</ul>
			 		</li>
			 		<?php endif; ?>

			 		<?php if(Gate::any(['Admin'])): ?>
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
			 					<a href="<?php echo e(route('users.index')); ?>" class="nav-link">
			 						<i class="fas fa-address-book nav-icon"></i>
			 						<p>Danh sách tài khoản</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="<?php echo e(route('admin.role')); ?>" class="nav-link">
			 						<i class="fas fa-user-tag nav-icon"></i>
			 						<p>Vai trò</p>
			 					</a>
			 				</li>
			 				
			 			</ul>
			 		</li>
			 		<?php endif; ?>

			 		<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
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
			 					<a href="<?php echo e(route('booking.index')); ?>" class="nav-link">
			 						<i class="fas fa-calendar-check nav-icon"></i>
			 						<p>Đơn đặt phòng</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="<?php echo e(route('cancel.index')); ?>" class="nav-link">
			 						<i class="fas fa-calendar-times nav-icon"></i>
			 						<p>Đơn hủy phòng</p>
			 					</a>
			 				</li>
			 				<li class="nav-item">
			 					<a href="<?php echo e(route('request.index')); ?>" class="nav-link">
			 						<i class="fas fa-coffee nav-icon"></i>
			 						<p>Đơn yêu cầu</p>
			 						<span class="right badge badge-danger">New</span>
			 					</a>
			 				</li>
			 			</ul>
			 		</li>
			 		<?php endif; ?>

			 		<?php if(Gate::any(['Admin', 'Cashier'])): ?>
			 		<li class="nav-item">
			 			<a href="<?php echo e(route('order.index')); ?>" class="nav-link">
			 				<i class="nav-icon fas fa-file-invoice"></i>
			 				<p>Hóa đơn</p>
			 			</a>
			 		</li>
			 		<?php endif; ?>

			 		<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
			 		<li class="nav-item">
			 			<a href="<?php echo e(route('admin.notification.index')); ?>" class="nav-link">
			 				<i class="nav-icon fas fa-bell"></i>
			 				<p>Thông báo</p>
			 				<?php if(count($notifyTotal) != 0): ?>
			 				<span class="right badge badge-warning"><?php echo e(count($notifyTotal)); ?></span>
			 				<?php endif; ?>
			 			</a>
			 		</li>
			 		<?php endif; ?>

			 		<li class="nav-item">
			 			<a href="<?php echo e(route('admin.review.index')); ?>" class="nav-link">
			 				<i class="nav-icon fas fa-comment-alt"></i>
			 				<p>
			 					Đánh giá phòng
			 				</p>
			 			</a>
			 		</li>

			 		<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
			 		<li class="nav-item">
			 			<a href="<?php echo e(route('admin.feedback.index')); ?>" class="nav-link">
			 				<i class="nav-icon fas fa-comment"></i>
			 				<p>Phản hồi</p>
			 				<?php if(count($notifyFeedback) != 0): ?>
			 				<span class="right badge badge-warning"><?php echo e(count($notifyFeedback)); ?></span>
			 				<?php endif; ?>
			 			</a>
			 		</li>
			 		<?php endif; ?>

			 		<li class="nav-item">
			 			<a href="<?php echo e(route('logout')); ?>" class="nav-link">
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


		<?php echo $__env->yieldContent('content'); ?>


		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">

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
	<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

	<!-- AdminLTE App -->
	<script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>
	<!-- AdminLTE for demo purposes || tuy chinh thanh menu ben phai-->
	<script src="<?php echo e(asset('adminlte/dist/js/demo.js')); ?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo e(asset('adminlte/dist/js/pages/dashboard.js')); ?>"></script>

	<!-- overlayScrollbars -->
	<script src="<?php echo e(asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo e(asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
	<!-- Summernote -->
	<script src="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>


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

			<?php if(session()->get('flag')): ?>
				<?php if(session()->get('flag') == 'success'): ?>
				$('.swalDefaultSuccess').ready(function() {
					Toast.fire({
						icon: "success",
						title: "&nbsp &nbsp <?php echo e(session()->get('message')); ?>."
					})
				}); 
				<?php elseif(session()->get('flag') == 'error'): ?>
				$('.swalDefaultError').ready(function() {
					Toast.fire({
						icon: "error",
						title: "&nbsp &nbsp <?php echo e(session()->get('message')); ?>."
					})
				}); 
				<?php elseif(session()->get('flag') == 'warning'): ?>
				$('.swalDefaultWarning').ready(function() {
					Toast.fire({
						icon: "warning",
						title: "&nbsp &nbsp <?php echo e(session()->get('message')); ?>."
					})
				}); 
				<?php endif; ?>
			<?php endif; ?>

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
<?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/layouts/admin.blade.php ENDPATH**/ ?>