
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Thay đổi mật khẩu</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="card card-primary card-outline">
						<div class="card-body">
							<div class="row">
								<div class="col-2"></div> 
								<div class="col-8">
									<form action="<?php echo e(route('client.password.update', $user->id)); ?>" method="post">
										<?php echo csrf_field(); ?>
										<div class="form-group mb-4">
											<label>Mật khẩu cũ</label>
											<input type="password" name="oldPassword" class="form-control"> 
										</div>
										<div class="form-group mb-4">
											<label>Mật khẩu mới</label>
											<input type="password" name="newPassword" class="form-control" minlength="8"> 
										</div>
										<div class="form-group mb-4">
											<label>Nhập lại mật khẩu mới</label>
											<input type="password" name="confirmPassword" class="form-control" minlength="8"> 
										</div>
										<div class="form-group mb-4">
											<input type="submit" name="changePassword" class="btn btn-success btn-block"> 
										</div>
									</form>
								</div>    
								<div class="col-2"></div> 
							</div>
						</div>
					</div><!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-6">
					<div class="card card-primary card-outline">
						<div class="card-body">
							<div class="card-title">
								Thông tin
							</div>
							<div class="card-text">
								<div class="row pt-4">
									<div class="col-6">
										<p>Thời gian tạo tài khoản</p>
										<p>Thời gian xác thực tài khoản</p>
										<p>Thời gian cập nhật tài khoản gần đây nhất</p>
									</div>
									<div class="col-6 text-right">
										<p><?php echo e(date("d-m-Y H:i:s", strtotime($user->created_at))); ?></p>
										<p> <?php if($user->email_verified_at == null): ?>
												Chưa xác thực tài khoản
											<?php else: ?>
												<?php echo e(date("d-m-Y H:i:s", strtotime($user->email_verified_at))); ?>

											<?php endif; ?>
										</p>
										<p><?php echo e(date("d-m-Y H:i:s", strtotime($user->updated_at))); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.card -->
					<div class="card card-info card-outline">
						<div class="card-body">
							<div class="card-title">
								Mô tả
							</div>
							<div class="card-text">
								<div class="row p-2">
									<p>Để tránh trường hợp hệ thống bị hack và bảo mật thông tin tài khoản, cá nhân. <br>Quý khách vui lòng đặt mật khẩu mạnh: trên 8 kí tự, có chữ IN HOA và chữ thường, kí tự và số
									<br> Vui lòng không cung cấp mật khẩu cho bất kì ai, kể cả Quản lý phòng và Thu Ngân.
									</p>
								</div>
							</div>
						</div>
					</div><!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/client/changePassword.blade.php ENDPATH**/ ?>