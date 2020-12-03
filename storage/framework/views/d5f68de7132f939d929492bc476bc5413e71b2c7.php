
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý phòng</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- /.col-md- -->
				<div class="col-lg-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="card-title">Danh sách phòng
								&nbsp 
								<a href="<?php echo e(route('rooms.create')); ?>">
									<span class="badge badge-success">Thêm phòng</span>
								</a>
							</h5>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
						</div>

						<div class="card-body py-0 px-0">
							<table class="table table-responsive-xl table-hover table-head-fixed text-nowrap mb-2">
								<thead>
									<tr>
										<th>#</th>
										<th>ID</th>
										<th>Khu Vực</th>
										<th>Loại</th>
										<th>Sức chứa</th>
										<th>Giá</th>
										<th>Tình trạng</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td width="50px" class="align-middle"><img src="
											<?php if(strstr($room->image,'http')): ?>
											<?php echo e($room->image); ?>

											<?php else: ?>
											<?php echo e(asset('upload/room/'.$room->image)); ?>

											<?php endif; ?>
											" alt="" width="50px" height="50px">
										</td>
										<td class="align-middle">
											<a href="<?php echo e(route('rooms.edit', $room->id)); ?>">#<?php echo e($room->id); ?>

											</a>
										</td>
										<td class="align-middle">
											<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($area->id == $room->id_area): ?>
											<?php echo e($area->name); ?>

											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td class="align-middle">
											<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($area->id == $room->id_type): ?>
											<?php echo e($area->name); ?>

											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td class="align-middle"><?php echo e($room->capacity); ?></td>
										<td class="align-middle"><?php echo e(number_format($room->price)); ?> VND</td>
										<td class="text-left align-middle">
											<?php if($room->status == 0): ?>
											<span class="badge badge-secondary">Ẩn</span>
											<?php elseif($room->status == 1): ?>
											<span class="badge badge-success">Hiện</span>
											<?php else: ?>
											<span class="badge badge-warning">Phòng đầy</span>
											<?php endif; ?>
										</td>
										<td class="align-middle">
											<a href="<?php echo e(route('rooms.detail', $room->id)); ?>"><span class="badge badge-info">Xem</span></a>
											<a href="<?php echo e(route('rooms.edit', $room->id)); ?>"><span class="badge badge-danger">Sửa</span></a>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
							</table>
							<?php echo e($rooms->links()); ?>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/rooms/index.blade.php ENDPATH**/ ?>