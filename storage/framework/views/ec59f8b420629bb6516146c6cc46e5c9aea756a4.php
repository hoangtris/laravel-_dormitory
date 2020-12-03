
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đơn / Đơn hủy phòng</h1>
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
					<div class="callout callout-info">
						<h5 class="text-info"><i class="fas fa-info-circle"></i>&nbsp Giới thiệu</h5>
						<p>Hiển thị danh sách các đơn hủy phòng từ phía khách hàng.</p> 
						<p>Muốn chuyển sang trạng thái 'ĐÃ CHẤP NHẬN', bạn chỉ cần nhấn vào nút màu đỏ, và xác nhận.</p>
						<p>Những đơn ở trạng thái 'ĐÃ CHẤP NHẬN' thì không thể chuyển về 'CHỜ CHẤP NHẬN'.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-9">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<div class="row">
								<div class="col-xl-8 col-md-6 col-12">
									<h5 class="m-0 float-left py-2">Danh sách đơn hủy phòng
										<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
										</button>
									</h5>
								</div>
								<div class="col-xl-4 col-md-6 col-12">
									<form action="<?php echo e(route('cancel.index')); ?>" method="get" accept-charset="utf-8" class="form-inline float-right">
										<select name="slStatus" class="custom-select mr-2">
											<option value="0">Tất cả</option>
											<option value="3">Chưa chấp nhận</option>
											<option value="4">Đã chấp nhận</option>
										</select>
										<input type="submit" name="" value="Lọc" class="btn btn-outline-primary" >
									</form>	
								</div>	
							</div>
						</div>
						<div class="card-body p-2">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mã phòng</th>
										<th>Mã khách hàng</th>
										<th>Ngày đặt</th>
										<th>Ngày trả sớm</th>
										<th>Lý do</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $orderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr class="align">
										<td class="align-middle" width="11%">
											#<?php echo e($od->room_id); ?>

										</td>
										<td class="align-middle" width="20%">
											<?php echo e($od->order->user->id); ?> - <?php echo e($od->order->user->name); ?>

										</td>
										<td class="align-middle" width="15%">
											<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($od->order_id == $o->id): ?>
											<?php echo e(date('d-m-Y',strtotime($o->created_at))); ?>

											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td class="align-middle" width="15%">
											<?php echo e(date('d-m-Y',strtotime($od->early_checkout_date))); ?>

										</td>
										<td class="align-middle">
											<?php echo e($od->note); ?>

										</td>
										<td>
											<?php if($od->status == 3): ?>
											<form action="<?php echo e(route('cancel.update', $od->id)); ?>" method="post" accept-charset="utf-8">
												<?php echo csrf_field(); ?>
												<button type="" class="btn btn-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ CHẤP NHẬN')">Chờ chấp nhận</button>
											</form>
											<?php else: ?>
											<button type="button" class="btn btn-block btn-success" disabled="">Đã chấp nhận</button>
											<?php endif; ?>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="6" class="text-center">Ohhhh! Không có đơn hủy phòng nào cả.</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl-3">
					<div class="card card-info card-outline">
						<div class="card-header">
							<h5 class="m-0 text-info">Loại đơn</h5>
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">
								<a href="<?php echo e(route('booking.index')); ?>" class="list-group-item list-group-item-action">Đơn đặt phòng</a>
								<a href="<?php echo e(route('cancel.index')); ?>" class="list-group-item list-group-item-action list-group-item-info">Đơn hủy phòng</a>
								<a href="<?php echo e(route('request.index')); ?>" class="list-group-item list-group-item-action">Đơn yêu cầu khác</a>
							</ul>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/booking/cancelroom.blade.php ENDPATH**/ ?>