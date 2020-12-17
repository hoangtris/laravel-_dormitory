
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Cảnh báo!</h5>
				Đừng quậy phá lung tung.
			</div>
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo e(count($booking)); ?></h3>

							<p>Đơn đặt phòng</p>
						</div>
						<div class="icon">
							<i class="far fa-calendar-check"></i>
						</div>
						<a href="<?php echo e(route('booking.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo e(count($request)); ?></h3>

							<p>Đơn yêu cầu</p>
						</div>
						<div class="icon">
							<i class="far fa-handshake"></i>
						</div>
						<a href="<?php echo e(route('request.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php echo e(count($cancel)); ?></h3>

							<p>Đơn trả phòng sớm</p>
						</div>
						<div class="icon">
							<i class="fas fa-calendar-times nav-icon"></i>
						</div>
						<a href="<?php echo e(route('cancel.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php echo e(count($feedback)); ?></h3>

							<p>Phản hồi</p>
						</div>
						<div class="icon">
							<i class="fas fa-headset"></i>
						</div>
						<a href="<?php echo e(route('admin.feedback.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<?php elseif(Gate::any(['Admin','Cashier'])): ?>
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php echo e($countOrderExpired); ?></h3>

							<p>Hóa đơn quá hạn</p>
						</div>
						<div class="icon">
							<i class="far fa-angry"></i>
						</div>
						<a href="<?php echo e(route('order.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo e(count($orderInDay)); ?></h3>

							<p>Hóa đơn trong ngày</p>
						</div>
						<div class="icon">
							<i class="far fa-grin-hearts"></i>
						</div>
						<a href="<?php echo e(route('order.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-12">
					<!-- small box -->
					<div class="small-box bg-secondary">
						<div class="inner">
							<h3><?php echo e(count($review)); ?></h3>

							<p>Đánh giá phòng</p>
						</div>
						<div class="icon">
							<i class="far fa-comment"></i>
						</div>
						<a href="<?php echo e(route('admin.review.index')); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<?php endif; ?>


			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-xl-4 col-md-6 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0"><i class="far fa-map mr-2"></i>Khu vực mới<a href="<?php echo e(route('areas.index')); ?>" class="badge badge-success ml-2">Thêm</a></h5>
						</div>
						<div class="card-body pt-0 px-0">
							<table class="table table-hover mb-2">
								<thead>
									<tr>
										<th>#</th>
										<th>Tên</th>
										<th>Slug</th>
										<th>Ngày tạo</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($a->id); ?></td>
										<td><?php echo e($a->name); ?></td>
										<td><?php echo e($a->slug); ?></td>
										<td><?php echo e(date("d-m-Y",strtotime($a->created_at))); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
							<a href="<?php echo e(route('areas.index')); ?>" class="btn btn-primary float-right mr-2">Xem thêm <i class="fas fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<!-- /col -->
				<div class="col-xl-4 col-md-6 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0"><i class="fas fa-layer-group mr-2"></i>Loại phòng mới<a href="<?php echo e(route('typesroom.index')); ?>" class="badge badge-success ml-2">Thêm</a></h5>
						</div>
						<div class="card-body pt-0 px-0">
							<table class="table table-hover mb-2">
								<thead>
									<tr>
										<th>#</th>
										<th>Tên</th>
										<th>Ngày tạo</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($a->id); ?></td>
										<td><?php echo e($a->name); ?></td>
										<td><?php echo e(date("d-m-Y",strtotime($a->created_at))); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
							<a href="<?php echo e(route('typesroom.index')); ?>" class="btn btn-primary float-right mr-2">Xem thêm <i class="fas fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<!-- /col -->
				<div class="col-xl-4 col-md-12 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0"><i class="fas fa-door-open mr-2"></i>Phòng mới
								<a href="<?php echo e(route('rooms.create')); ?>" class="badge badge-success ml-2">Thêm</a>
							</h5>
						</div>
						<div class="card-body pt-0 px-0">
							<table class="table table-hover mb-2">
								<thead>
									<tr>
										<th>#</th>
										<th>Khu vực</th>
										<th>Loại</th>
										<th>Giá</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($a->id); ?></td>
										<td><?php echo e($a->area->name); ?></td>
										<td><?php echo e($a->typeRoom->name); ?></td>
										<td><?php echo e(number_format($a->price)); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
							<a href="<?php echo e(route('rooms.index')); ?>" class="btn btn-primary float-right mr-2">Xem thêm <i class="fas fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<!-- /col -->
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
	<!-- page script -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>