
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Thông tin phòng</h1>
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
							<h5 class="card-title">Tóm tắt</h5>

							<p class="card-text">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Phòng số</td>
											<td>
												<?php if($od==null): ?>
												null
												<?php else: ?>
												#<?php echo e($od->room->id); ?>

												<?php endif; ?>
											</td>
										</tr>
										<tr>
											<td>Khu vực</td>
											<td>
												<?php if($od==null): ?>
												null
												<?php else: ?>
												<?php echo e($od->room->area->name); ?>

												<?php endif; ?>
											</td>
										</tr>
										<tr>
											<td>Loại phòng</td>
											<td>
												<?php if($od==null): ?>
												null
												<?php else: ?>
												<?php echo e($od->room->typeRoom->name); ?>

												<?php endif; ?>
											</td>
										</tr>
										<tr>
											<td>Sức chứa</td>
											<td>
												<?php if($od==null): ?>
												null
												<?php else: ?>
												<?php echo e($od->room->capacity); ?>

												<?php endif; ?>
											</td>
										</tr>
										<tr>
											<td>Giá</td>
											<td>
												<?php if($od==null): ?>
												null
												<?php else: ?>
												<?php echo e(number_format($od->room->price)); ?> VNĐ
												<?php endif; ?>
											</td>
										</tr>
									</tbody>
								</table>
							</p>
							<?php if($od != null): ?>
							<a href="<?php echo e(route('rooms.detail', $od->room_id)); ?>" class="card-link ml-2">Xem chi tiết</a>
							<?php if($od->status != 3): ?>
							<a href="#" class="btn btn-outline-danger ml-3" data-toggle="modal" data-target="#modal-lg">Hủy phòng</a>
							<?php endif; ?>

							<?php if($od->status == 3): ?>
							<div class="callout callout-warning mt-2">
								<h5>Bạn vừa hủy phòng!</h5>
								<p>Vui lòng chờ quản lý phòng xác nhận, nút hủy phòng tạm thời bị ẩn đi để tránh spam đơn hủy phòng.</p>
							</div>
							<?php endif; ?>
							<?php endif; ?>
						</div>
					</div><!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-6">
					<div class="card card-info card-outline">
						<div class="card-header">
							<h3 class="card-title">Yêu cầu</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
							<!-- /.card-tools -->
						</div>
						<div class="card-body">
							<div class="card-text">
								<form action="<?php echo e(route('client.request')); ?>" method="post" class="px-2">
									<?php echo csrf_field(); ?>
									<div class="mb-4">
										<div class="form-group">
											<label>Loại yêu cầu</label>
											<select name="type" class="custom-select">
												<option value="Sửa chữa">Sửa chữa</option>
												<option value="Lắp đặt">Lắp đặt</option>
												<option value="Khác">Khác</option>
											</select>    
										</div>
									</div>
									<div class="mb-4">
										<div class="form-group">
											<label>Nội dung</label>
											<textarea class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content" required=""></textarea> 
										</div>
									</div>
									<div class="mb-4">
										<div class="form-group">
											<input type="submit" name="addRequest" value="Gửi yêu cầu" class="btn btn-outline-success btn-block" onclick="return confirm('Bạn có muốn gửi yêu cầu này không?')"
											<?php if($od == null || $od->status == 3): ?> disabled="" <?php endif; ?>>
										</div>

										<?php if($od == null || $od->status == 3): ?>
										<div class="callout callout-info mt-2">
											<h5>Tính năng gửi yêu cầu tạm khóa!</h5>
											<p>Khách hàng chưa có phòng hoặc trả phòng đang ở trạng thái chờ duyệt sẽ bị khóa tính năng này.</p>
										</div>
										<?php endif; ?>
									</div>
								</form>
							</div>
						</div>
					</div><!-- /.card -->

					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Đơn yêu cầu đã gửi</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
								</button>
							</div>
							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-hover table-responsive-lg">
								<thead>
									<tr>
										<th>Ngày gửi</th>
										<th>Loại đơn</th>
										<th>Nội dung</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $listRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listReq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td class="align-middle"><?php echo e(date("d-m-Y H:i:s", strtotime($listReq->created_at))); ?></td>
										<td class="align-middle"><?php echo e($listReq->type); ?></td>
										<td class="align-middle"><a href="">Xem...</a></td>
										<td class="align-middle">
											<?php if($listReq->status == 1): ?>
											<label class="px-2 bg-danger color-palette">Chưa chấp nhận</label>
											<?php else: ?>
											<label class="px-2 bg-success color-palette">Đã chấp nhận</label>
											<?php endif; ?>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="4" class="text-center">Không có dữ liệu</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
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

<?php if($od != null): ?>
<div class="modal fade" id="modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Xác nhận hủy phòng</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo e(route('client.room.cancel', $od->id)); ?>" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="modal-body">
					<p>Lý do hủy phòng</p>

					<textarea name="note" class="form-control mb-4" rows="10" required=""></textarea>
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="customSwitch1" required="">
						<label class="custom-control-label" for="customSwitch1">Tôi đã đọc và đồng ý với Điều khoản và Dịch vụ của KTX Hoàng Trí</label>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" onclick="return confirm('Bạn chắc chứ?')">Xác nhận hủy phòng</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/client/room.blade.php ENDPATH**/ ?>