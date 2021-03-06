
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
			<div class="callout callout-info">
            	<h5 class="text-info">Tính năng này vẫn còn đang trong quá trình xây dựng</h5>
            	<p>Một vài chức năng sẽ bị vô hiệu quá do chưa hoàn thiện.</p>
            </div>
			<div class="row">
				<div class="col-xl-3 col-12">
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-circle"
								src="
								<?php if(strstr($user->avatar,'https')): ?>
								<?php echo e($user->avatar); ?>

								<?php else: ?>	
								<?php echo e(asset('upload/avatar/'.$user->avatar)); ?>

								<?php endif; ?>
								"
								alt="User profile picture" width="100px" height="100px" style="object-fit: cover;">
							</div>

							<h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>

							<p class="text-muted text-center">
								<p class="text-muted text-center"><?php echo e($user->role->name); ?></p>
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

							<form action="<?php echo e(route('users.resetpassword', $user->id)); ?>" method="post" accept-charset="utf-8" class="mb-2">
								<?php echo csrf_field(); ?>
								<input type="submit" value="Khôi phục mật khẩu" class="btn btn-primary btn-block" onclick="return confirm('Mật khẩu mặc định là password\nBạn chắc chứ?')">
							</form>
							<form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post" accept-charset="utf-8">
								<?php echo csrf_field(); ?>
								<input type="submit" name="deleteUser" value="Xóa tài khoản" class="btn btn-outline-danger btn-block" onclick="return confirmDestroy()" disabled="">
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
									<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#information" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Thông tin chung</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#address" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Địa chỉ</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#room" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Thông tin phòng</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#review" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Đánh giá</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#none" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Khác</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-four-tabContent">
								<div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
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
												<?php if($user->issuedAt == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->issuedAt->name); ?>

												<?php endif; ?>
											</a>
											<br>
											<b>Dân tộc</b>
											<a class="float-right">
												<?php if($user->nation == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->nation->name); ?>

												<?php endif; ?>	
											</a>
											<br>
											<b>Tôn giáo</b>
											<a class="float-right">
												<?php if($user->religious == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->religious->name); ?>

												<?php endif; ?>	
											</a>
											<br>
											<b>Quốc tịch</b>
											<a class="float-right">
												<?php if($user->nationality == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->nationality->name); ?>

												<?php endif; ?>	
											</a>
											<br>
										</div>										
									</div>

								</div>
								<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
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
												<?php if($user->province == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->province->name); ?>

												<?php endif; ?>	
											</a>
											<br>
											<b>Quận huyện</b>
											<a class="float-right">
												<?php if($user->district == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->district->name); ?>

												<?php endif; ?>	
											</a>
											<br>
											<b>Phường xã</b>
											<a class="float-right">
												<?php if($user->ward == null): ?>
													Chưa cập nhật
												<?php else: ?>
													<?php echo e($user->ward->name); ?>

												<?php endif; ?>	
											</a>
											<br>
										</div> 								
									</div>
								</div>
								<div class="tab-pane fade" id="room" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<div class="row">
										<div class="col-xl-12">
											<?php if($od == null): ?>
												Trước đây khách hàng <?php echo e($user->name); ?> chưa đặt phòng nào cả
											<?php else: ?>
												<?php if($od->status == 1): ?>
												<?php echo e($user->name); ?> vừa đặt phòng số <a href="<?php echo e(route('rooms.detail', $od->room_id)); ?>">#<?php echo e($od->room_id); ?></a>,
												mời quản lý phòng xác nhận
												<?php elseif($od->status == 2): ?>
												<?php echo e($user->name); ?> đang ở phòng số <a href="<?php echo e(route('rooms.detail', $od->room_id)); ?>">#<?php echo e($od->room_id); ?></a><br>
												<?php elseif($od->status == 3): ?>
												<?php echo e($user->name); ?> vừa hủy phòng số <a href="<?php echo e(route('rooms.detail', $od->room_id)); ?>">#<?php echo e($od->room_id); ?></a>, quản lý phòng vui lòng xác nhận<br>
												<?php else: ?>
												Bạn chưa có phòng
												<?php endif; ?>
											<?php endif; ?>
										</div>	
									</div>
								</div>
								<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<div class="row">
										<div class="col-xl-12">
											<table class="table table-responsive-xl table-striped table-head-fixed text-wrap">
												<thead>
													<tr>
														<th width="12%">Mã phòng</th>
														<th>Nội dung</th>
														<th width="20%">Thời gian</th>
													</tr>
												</thead>
												<tbody>
													<?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
													<tr>
														<td class="text-center"><?php echo e($r->room_id); ?></td>
														<td class="text-justify"><?php echo e($r->content); ?></td>
														<td><?php echo e(date('d-m-Y H:i:s', strtotime($r->created_at))); ?></td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
														<p><?php echo e($user->name); ?> không có đánh giá phòng nào cả.</p>
													<?php endif; ?>
												</tbody>
											</table>
										</div>	
									</div>
								</div>
								<div class="tab-pane fade" id="none" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
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