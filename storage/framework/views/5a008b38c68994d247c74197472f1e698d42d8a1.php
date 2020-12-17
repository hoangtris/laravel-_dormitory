
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1 class="m-0 text-dark">Chi tiết đơn yêu cầu #<?php echo e($request->id); ?>

						<a href="<?php echo e(route('request.index')); ?>"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a>
					</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Nội dung</h3>

							<div class="card-tools">
								Ngày giờ: <?php echo e(date("d-m-Y H:i:s", strtotime($request->created_at))); ?>

							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-3 col-3 font-weight-bold">
									<p>Trạng thái</p>	
									<p>Mã khách hàng</p>		
									<p>Mã phòng</p>	
									<p>Loại đơn</p>
									<p>Nội dung</p>				

								</div>
								<div class="col-xl-9 col-9">
										<?php if($request->status == 1): ?>
										<form action="<?php echo e(route('request.update', $request->id)); ?>" method="post">
											<?php echo csrf_field(); ?>
											<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ CHẤP NHẬN')">Chờ chấp nhận</button>
										</form>
										<?php else: ?>
										<button type="button" class="btn btn-success" disabled="">&nbsp&nbsp&nbspĐã chấp nhận</button>
										<?php endif; ?>	
									<p>#<?php echo e($request->user->id); ?> - <?php echo e($request->user->name); ?></p>		
									<p><a href="<?php echo e(route('rooms.detail', $request->room_id)); ?>"><kbd><?php echo e($request->room_id); ?></kbd></a></p>	
									<p><?php echo e($request->type); ?></p>		
									<p class="text-justify"><?php echo $request->content; ?></p>	

								</div>
							</div>
						</div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/booking/showrequest.blade.php ENDPATH**/ ?>