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

  <title>Quản lý KTX | AdminLTE 3</title>

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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo e(asset('adminlte/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KTX Captain Hoàng Trí</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('adminlte/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

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
                  <i class="fas fa-list-ol nav-icon"></i>
                  <p>Quản lý phòng</p>
                </a>
              </li>
            </ul>
          </li>

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
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách tài khoản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.role')); ?>" class="nav-link">
                  <i class="fas fa-id-badge nav-icon"></i>
                  <p>Vai trò</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Yêu cầu</p>
                  <span class="right badge badge-danger">New</span>
                </a>
              </li>
            </ul>
          </li>

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
                  <i class="fas fa-house-user nav-icon"></i>
                  <p>Đơn đặt phòng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-house-damage nav-icon"></i>
                  <p>Đơn hủy phòng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-coffee nav-icon"></i>
                  <p>Đơn yêu cầu</p>
                  <span class="right badge badge-danger">New</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(route('admin.review.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Đánh giá phòng
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
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
<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>
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
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    <?php if(Session::has('success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbspThêm khu vực thành công.'
      })
    });  
    <?php elseif(Session::has('error_flash_message')): ?>
    $('.swalDefaultError').ready(function() {
      Toast.fire({
        icon: 'error',
        title: '&nbsp &nbspThêm khu vực thất bại.'
      })
    }); 
    <?php elseif(Session::has('delete_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Xóa khu vực thành công.'
      })
    }); 
    <?php elseif(Session::has('update_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Sửa khu vực thành công.'
      })
    }); 
    <?php elseif(Session::has('add_typeroom_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Thêm loại phòng thành công.'
      })
    }); 
    <?php elseif(Session::has('add_typeroom_error_flash_message')): ?>
    $('.swalDefaultError').ready(function() {
      Toast.fire({
        icon: 'error',
        title: '&nbsp &nbsp Thêm loại phòng thất bại.'
      })
    }); 
    <?php elseif(Session::has('update_typeroom_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Sửa loại phòng thành công.'
      })
    }); 
    <?php elseif(Session::has('delete_typeroom_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Xóa loại phòng thành công.'
      })
    });   
    <?php elseif(Session::has('add_room_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Thêm phòng thành công.'
      })
    }); 
    <?php elseif(Session::has('add_room_error_flash_message')): ?>
    $('.swalDefaultError').ready(function() {
      Toast.fire({
        icon: 'error',
        title: '&nbsp &nbsp Thêm phòng thất bại.'
      })
    }); 
    <?php elseif(Session::has('update_room_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Sửa phòng thành công.'
      })
    }); 
    <?php elseif(Session::has('delete_room_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Xóa phòng thành công.'
      })
    });
    <?php elseif(Session::has('delete_user_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Xóa tài khoản thành công.'
      })
    }); 
    <?php elseif(Session::has('add_role_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Thêm vai trò thành công.'
      })
    }); 
    <?php elseif(Session::has('change_role_for_user_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Thay đổi vai trò cho người dùng thành công.'
      })
    }); 
    <?php elseif(Session::has('update_status_booking_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Thay đổi trạng thái thành công.'
      })
    }); 
    <?php elseif(Session::has('delete_review_success_flash_message')): ?>
    $('.swalDefaultSuccess').ready(function() {
      Toast.fire({
        icon: 'success',
        title: '&nbsp &nbsp Xóa đánh giá thành công.'
      })
    }); 
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