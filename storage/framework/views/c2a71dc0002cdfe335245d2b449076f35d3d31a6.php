
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý tài khoản 
						<a href="<?php echo e(route('users.index')); ?>"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">


				<div class="col-xl-3 col-12">
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle"
								src="
								<?php if(strstr($user->avatar,'https')): ?>
								<?php echo e($user->avatar); ?>

								<?php else: ?>
								<?php echo e(asset('upload/avatar/'.$user->avatar)); ?>

								<?php endif; ?>
								"
								alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>

							<p class="text-muted text-center">
								<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($role->id == $user->id_role): ?>
								<p class="text-muted text-center"><?php echo e($role->name); ?></p>
								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Giới tính</b> <a class="float-right"><?php echo e($user->gender); ?></a>
								</li>
								<li class="list-group-item">
									<b>Ngày sinh</b> <a class="float-right"><?php echo e(date('d-m-Y',strtotime($user->date_of_birth))); ?></a>
								</li>
								<li class="list-group-item">
									<b>CMND</b> <a class="float-right"><?php echo e($user->identity_card_number); ?></a>
								</li>
								<li class="list-group-item">
									<b>Email</b> <a class="float-right"><?php echo e($user->email); ?></a>
								</li>
								<li class="list-group-item">
									<b>Điện thoại</b> <a class="float-right"><?php echo e($user->phone); ?></a>
								</li>
							</ul>

							<form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post" accept-charset="utf-8">
								<?php echo csrf_field(); ?>
								<?php echo method_field('delete'); ?>
								<input type="submit" name="deleteUser" value="Xóa tài khoản" class="btn btn-outline-danger btn-block" onclick="return confirm('Bạn chắc chưa?')">
							</form>
							
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl-9 col-12">
					<div class="card card-primary card-outline card-outline-tabs">
						<div class="card-header p-0 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Thông tin chung</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Địa chỉ</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Khác</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-four-tabContent">
								<div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
									<div class="row" style="line-height: 35px">
										<div class="col-xl-6">
											<b>Họ tên</b>
											<a class="float-right">
												<?php echo e($user->name); ?>

											</a>
											<br>
											<b>Mã khách hàng</b>
											<a class="float-right">
												<?php echo e($user->id); ?>

											</a>
											<br>
											<b>Giới tính</b>
											<a class="float-right">
												<?php echo e($user->gender); ?>

											</a>
											<br>
											<b>Ngày sinh</b>
											<a class="float-right">
												<?php echo e(date('d-m-Y',strtotime($user->date_of_birth))); ?>

											</a>
											<br>
											<b>Nơi sinh</b>
											<a class="float-right">
												<?php echo e($user->place_of_birth); ?>

											</a>
											<br>
											<b>Username</b>
											<a class="float-right">
												<?php echo e($user->username); ?>

											</a>
											<br>
										</div>
										<div class="col-xl-6">
											<b>CMND</b>
											<a class="float-right">
												<?php echo e($user->identity_card_number); ?>

											</a>
											<br>
											<b>Ngày cấp</b>
											<a class="float-right">
												<?php echo e(date('d-m-Y',strtotime($user->issued_on))); ?>

											</a>
											<br>
											<b>Nơi cấp</b>
											<a class="float-right">
												<?php echo e($user->issued_at); ?>

											</a>
											<br>
											<b>Dân tộc</b>
											<a class="float-right">
												<?php echo e($user->nation); ?>

											</a>
											<br>
											<b>Tôn giáo</b>
											<a class="float-right">
												<?php echo e($user->religious); ?>

											</a>
											<br>
											<b>Quốc tịch</b>
											<a class="float-right">
												<?php echo e($user->nationality); ?>

											</a>
											<br>
										</div>										
									</div>

								</div>
								<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
									<div class="row" style="line-height: 35px">
										<div class="col-xl-6">
											<b>Địa chỉ</b>
											<br>
											<a class="">
												<?php echo e($user->address); ?>

											</a>
											<br>
											<b>Tỉnh thành</b>
											<a class="float-right">
												<?php echo e($user->province); ?>

											</a>
											<br>
											<b>Quận huyện</b>
											<a class="float-right">
												<?php echo e($user->district); ?>

											</a>
											<br>
											<b>Phường xã</b>
											<a class="float-right">
												<?php echo e($user->ward); ?>

											</a>
											<br>
										</div>									
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<div class="row">
										<div class="col-xl-12">
											<b>Ngày tạo</b>
											<a class="float-right">
												<?php echo e($user->created_at); ?>

											</a>
											<br>
											<b>Ngày kích hoạt tài khoản</b>
											<a class="float-right">
												<?php echo e($user->email_verified_at); ?>

											</a>
											<br>
										</div>	
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/users/show.blade.php ENDPATH**/ ?>