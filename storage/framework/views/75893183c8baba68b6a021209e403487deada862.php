
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

			<?php if(Gate::any(['Admin', 'RoomManager'])): ?>
			<div class="row">
				<div class="col-xl-4 col-md-6 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0"><i class="far fa-map mr-2"></i>Khu vực mới<a href="#" class="badge badge-success ml-2" data-toggle="modal" data-target="#modal-lg-area">Thêm</a></h5>
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
										<td><a class="text-gray-dark" href="<?php echo e(route('areas.edit', $a->id)); ?>"><?php echo e($a->id); ?></a></td>
										<td><?php echo e($a->name); ?></td>
										<td><a class="text-gray-dark" href="<?php echo e(route('rooms.area', $a->slug)); ?>"><?php echo e($a->slug); ?></a></td>
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
							<h5 class="m-0"><i class="fas fa-layer-group mr-2"></i>Loại phòng mới<a href="<?php echo e(route('typesroom.index')); ?>" class="badge badge-success ml-2" data-toggle="modal" data-target="#modal-lg-type">Thêm</a></h5>
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
										<td><a class="text-gray-dark" href="<?php echo e(route('typesroom.edit', $a->id)); ?>"><?php echo e($a->id); ?></a></td>
										<td><a class="text-gray-dark" href="<?php echo e(route('rooms.type', $a->slug)); ?>"><?php echo e($a->name); ?></a></td>
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
										<td><a href="<?php echo e(route('rooms.detail', $a->id)); ?>"></a><?php echo e($a->id); ?></td>
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
			<?php endif; ?>

			<?php if(Gate::any(['Admin', 'Cashier'])): ?>
			<div class="row">
				<div class="col-xl-6 col-md-12 col-12">
					<div class="card card-outline card-danger">
						<div class="card-header">
							<h5 class="m-0"><i class="fas fa-file-invoice mr-2"></i>Hóa đơn mới</h5>
						</div>
						<div class="card-body pt-0 px-0">
							<table class="table table-hover mb-2">
								<thead>
									<tr>
										<th>#</th>
										<th>Mã KH</th>
										<th>Tổng tiền</th>
										<th>Tình trạng</th>
										<th>Ngày tạo</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $orderInDay->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><a class="text-gray-dark" href="<?php echo e(route('order.show', $a->id)); ?>"><?php echo e($a->id); ?></a></td>
										<td><?php echo e($a->user_id); ?></td>
										<td><?php echo e(number_format($a->total)); ?></td>
										<td>
											<?php if( $a->status == 1 ): ?>
												<span class="badge badge-danger">Chưa thanh toán</span>
											<?php elseif( $a->status == 2 ): ?>
												<span class="badge badge-success">Đã thanh toán</span>
											<?php else: ?>
												<span class="badge badge-info">Đã thanh toán qua NL</span>
											<?php endif; ?>
										</td>
										<td><?php echo e(date("d-m-Y",strtotime($a->created_at))); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
							<a href="<?php echo e(route('order.index')); ?>" class="btn btn-primary float-right mr-2">Xem thêm <i class="fas fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<!-- /col -->
				<div class="col-xl-6 col-md-12 col-12">
					<div class="card card-outline card-danger">
						<div class="card-header">
							<h5 class="m-0"><i class="far fa-comment mr-2"></i>Đánh giá mới</h5>
						</div>
						<div class="card-body pt-0 px-0">
							<table class="table table-hover mb-2">
								<thead>
									<tr>
										<th>Mã KH</th>
										<th>Mã phòng</th>
										<th>Nội dung</th>
										<th>Ngày tạo</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $reviews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($a->user_id); ?></td>
										<td><a class="text-gray-dark" href=""><?php echo e($a->room_id); ?></a></td>
										<td>
											<span class="badge badge-primary showComment" data-toggle="modal" data-target="#modal-lg-review" id="<?php echo e($a->id); ?>">Xem</span>
										</td>
										<td><?php echo e(date("d-m-Y",strtotime($a->created_at))); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							
							<a href="<?php echo e(route('admin.review.index')); ?>" class="btn btn-primary float-right mr-2">Xem thêm <i class="fas fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
				<!-- /col -->
			</div>
			<?php endif; ?>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
	<!-- page script -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-lg-area">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="far fa-map mr-2"></i>Thêm khu vực</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-title">Vui lòng nhập đầy đủ.</h6>
				<br>

				<form action="<?php echo e(route('areas.store')); ?>" method="post" accept-charset="utf-8" class="px-2 py-2">
					<?php echo csrf_field(); ?>
					<div class="row mb-3">
						<label for="">Tên khu vực</label>
						<input type="text" name="name" required="" placeholder="Củ Chi" class="form-control">
					</div>
					<div class="row mb-3">
						<label for="">Mô tả</label>
						<textarea class="textarea" placeholder="Place some text here"
						style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description" required=""></textarea>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<input type="submit" class="btn btn-success" value="Thêm">
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-lg-type">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="far fa-map mr-2"></i>Thêm khu vực</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-title">Vui lòng nhập đầy đủ.</h6>
				<br>

				<form action="<?php echo e(route('typesroom.store')); ?>" method="post" accept-charset="utf-8" class="px-2 py-2">
					<?php echo csrf_field(); ?>
					<div class="row mb-3">
						<label for="">Tên loại phòng</label>
						<input type="text" name="name" placeholder="Phòng trọ 32m vuông" class="form-control">
					</div>
					<div class="row mb-3">
						<label for="">Mô tả</label>
						<textarea class="textarea" placeholder="Place some text here"
						style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"></textarea>
					</div>					
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<input type="submit" class="btn btn-success" value="Thêm">
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-lg-review">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="far fa-comment mr-2"></i>Nội dung đánh giá</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">	
				<p id="contentComment"></p>		
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
    $(document).ready(function(){
        $(".showComment").click(function(){
            var id = $(this).attr("id");
            //alert(id);
            $.ajax({
                url:"<?php echo e(route('admin.review.show')); ?>", 
                method:"GET", // phương thức gửi dữ liệu.
                dataType: 'json',
			    cache: false,
                data:{
                    id
                },
                success:function(obj){ //dữ liệu nhận về 
                	$('#contentComment').html(obj.content);
                    console.log(obj);
                },
                error: function(req, err){ console.log('my message ' + err); }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>