
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đơn / Hoá đơn</h1>
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
						<p>Danh sách tổng hợp hóa đơn của khách hàng</p>
						<p>Hóa đơn quá hạn 3 ngày chưa thanh toán có thể xóa được</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="card card-danger card-outline">
						<div class="card-header">
							<h5 class="card-title">Danh hóa hóa đơn chưa thanh toán</h5>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body p-2 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mã hóa đơn</th>
										<th>Mã khách hàng</th>
										<th>Tổng tiền</th>
										<th>Thời gian</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<?php if($od->status == 1): ?>
									<tr class="align">
										<td class="align-middle">
											<?php echo e($od->id); ?>

										</td>
										<td class="align-middle">
											<?php echo e($od->user->id); ?> - <?php echo e($od->user->name); ?>

										</td>
										<td class="align-middle">
											<?php echo e(number_format($od->total)); ?>

										</td>
										<td class="align-middle">
											<?php echo e(date('d-m-Y H:i:s',strtotime($od->created_at))); ?>

										</td>
										<td>
											<a href="" class="badge badge-secondary">Xem</a>
											<?php if($od->status == 1): ?>
											<a href="" class="badge badge-danger updateOrder" id="<?php echo e($od->id); ?>" onclick="return confirm('Bạn có muốn chuyển sang trạng thái Đã thanh toán')">Chưa thanh toán</a>
												<?php if( (strtotime("now") - strtotime($od->created_at))/86400 > 3 ): ?>
													<a href="" class="badge badge-warning deleteOrder" id="<?php echo e($od->id); ?>" onclick="return confirmDestroy()">Xóa</a>
												<?php endif; ?>
											<?php endif; ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="5" class="text-center">Ohhhh! Không có đơn đặt phòng nào cả.</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-xl-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="card-title py-2">Danh hóa đơn đã thanh toán</h5>
							<div class="card-tools">
								<form action="" method="get" accept-charset="utf-8" class="form-inline float-right">
									<select name="slStatus" class="custom-select mr-2">
										<option value="0">Tất cả</option>
										<option value="2">Đã thanh toán</option>
										<option value="3">Đã thanh toán qua NL</option>
									</select>
									<input type="submit" name="" value="Lọc" class="btn btn-outline-primary" >
								</form>											
							</div>
						</div>
						<div class="card-body p-2 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mã hóa đơn</th>
										<th>Mã khách hàng</th>
										<th>Tổng tiền</th>
										<th>Thời gian</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<?php if($od->status !=1): ?>
									<tr class="align">
										<td class="align-middle">
											<?php echo e($od->id); ?>

										</td>
										<td class="align-middle">
											<?php echo e($od->user->id); ?> - <?php echo e($od->user->name); ?>

										</td>
										<td class="align-middle">
											<?php echo e(number_format($od->total)); ?>

										</td>
										<td class="align-middle">
											<?php echo e(date('d-m-Y H:i:s',strtotime($od->created_at))); ?>

										</td>
										<td>
											<?php if($od->status == 2): ?>
											<span class="badge badge-success">Đã thanh toán</span>
											<?php else: ?>
											<span class="badge badge-info">Đã thanh toán qua NL</span>
											<?php endif; ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="5" class="text-center">Ohhhh! Không có đơn đặt phòng nào cả.</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/order.blade.php ENDPATH**/ ?>