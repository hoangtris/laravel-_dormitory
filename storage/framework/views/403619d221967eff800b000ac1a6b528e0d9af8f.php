
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý phòng / Sửa phòng #<?php echo e($room->id); ?>

						<a href="<?php echo e(route('rooms.index')); ?>"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a></h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<form action="<?php echo e(route('rooms.update', $room->id)); ?>" method="post" enctype='multipart/form-data'>           
					<div class="row">
						<?php echo csrf_field(); ?>
						<!-- /.col-md-6 -->
						<div class="col-lg-8">
							<div class="card card-outline card-info">
								<div class="card-header">
									<h3 class="card-title">Thông tin chung</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
										</button>
									</div>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="row mb-3">
										<div class="col-lg-3 mb-4">
											<label for="">Sức chứa</label>
											<input type="number" class="form-control" name="capacity" value="<?php echo e($room->capacity); ?>">
										</div>
										<div class="col-lg-3 mb-4">
											<label for="">Giá phòng</label>
											<input type="text" class="form-control" name="price"  value="<?php echo e($room->price); ?>">
										</div>
										<div class="col-lg-3 mb-4">
											<label for="">Thời hạn</label>
											<input type="number" class="form-control" name="duration" placeholder="30"  value="<?php echo e($room->duration); ?>">
										</div>
										<div class="col-lg-3 mb-4">
											<label for="">Tình trạng</label>
											<select name="status" class="form-control" <?php if($room->status == 2): ?> disabled <?php endif; ?>>
												<option value="0" <?php if($room->status == 0): ?> selected <?php endif; ?>>Ẩn</option>
												<option value="1" <?php if($room->status == 1): ?> selected <?php endif; ?>>Hiện</option>
												<option value="2" <?php if($room->status == 2): ?> selected <?php endif; ?>>Đầy</option>
											</select>
										</div>
										<div class="col-lg-12 mb-4">
											<label for="">Mô tả ngắn</label>
											<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="short_description"><?php echo e($room->short_description); ?></textarea>
										</div>
										<div class="col-lg-12 mb-4">
											<label for="">Mô tả dài</label>
											<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="long_description"><?php echo e($room->long_description); ?></textarea>
										</div>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card card-outline card-dark collapsed-card">
								<div class="card-header">
									<h3 class="card-title">Ghi chú</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
										</button>
									</div>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="col-lg-12 mb-4">
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="note"><?php echo e($room->note); ?></textarea>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>

						<div class="col-lg">
							<div class="card card-outline card-warning">
								<div class="card-header">
									<h3 class="card-title">Hành động</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
										</button>
									</div>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<input type="submit" name="addRoomTemp" value="Lưu bản nháp" class="btn btn-outline-secondary" disabled="">
									<input type="submit" name="addRoom" value="Sửa phòng" class="btn btn-primary float-right">
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card card-outline card-success">
								<div class="card-header">
									<h3 class="card-title">Loại phòng</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
										</button>
									</div>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<select name="id_type" class="form-control">
										<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($type->id == $room->id_type): ?>
										<option value="<?php echo e($type->id); ?>" selected><?php echo e($type->name); ?></option>
										<?php else: ?>
										<option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card card-outline card-primary">
								<div class="card-header">
									<h3 class="card-title">Khu vực</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
										</button>
									</div>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<select name="id_area" class="form-control">
										<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($type->id == $room->id_area): ?>
										<option value="<?php echo e($type->id); ?>" selected><?php echo e($type->name); ?></option>
										<?php else: ?>
										<option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<div class="card card-outline card-danger">
								<div class="card-header">
									<h3 class="card-title">Hình ảnh</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
										</button>
									</div>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<img src="
									<?php if(strstr($room->image,'http')): ?>
									<?php echo e($room->image); ?>

									<?php else: ?>
									<?php echo e(asset('upload/room/'.$room->image)); ?>

									<?php endif; ?>
									" alt="" width="250px">
									<input type="file" name="image" class="mt-4"><br><br>
									<input type="hidden" name="oldImage" value="<?php echo e($room->image); ?>">
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
				</form>
				<!-- /.row -->

				<form action="<?php echo e(route('rooms.destroy', $room->id)); ?>" method="post" accept-charset="utf-8">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="callout callout-danger">
								<h4><i class="fas fa-house-damage"></i>&nbsp  Xóa phòng</h4>

								<p>Bạn có thể xóa phòng này nếu không còn sử dụng nữa. Bạn hãy thật chắn chắn trước khi xóa, vì sau khi xóa sẽ không thể hoàn tác.</p>

								<?php if($room->status != 2): ?>
								<input type="submit" name="deleteRoom" value="Xóa phòng" class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chưa?')" disabled>
								<?php else: ?>
								<button type="button" class="btn btn-warning swalDefaultWarning">
									Không thể xóa phòng
								</button>
								<?php endif; ?>
							</div>
						</div>
					</div>		
				</form>
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/rooms/edit.blade.php ENDPATH**/ ?>