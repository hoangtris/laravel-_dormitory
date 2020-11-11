

<?php $__env->startSection('content'); ?>
<div class="container my-5 py-5 z-depth-1">
	<!--Section: Content-->
	<section class="">
		<!-- Section heading -->
		<h3 class="font-weight-bold mb-5 text-center">Chi tiết phòng #<?php echo e($room->id); ?>

			<?php if($room->status == 2): ?>
			<span class="badge badge-danger">Phòng này đã được thuê</span>
			<?php endif; ?>
		</h3>
		<div class="row">
			<div class="col-lg-6 mr-3">
				<!--Carousel Wrapper-->
				<div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">
					<!--Slides-->
					<div class="carousel-inner text-center text-md-left" role="listbox">
						<div class="carousel-item active">
							<img src="
							<?php if(strstr($room->image,'http')): ?>
								<?php echo e($room->image); ?>

							<?php else: ?>
								<?php echo e(asset('upload/room/'.$room->image)); ?>

							<?php endif; ?>
							" alt="" height="550px">
						</div>
					</div>
					<!--/.Slides-->
				</div>
				<!--/.Carousel Wrapper-->
			</div>

			<div class="col-lg-5 text-center text-md-left">

				<h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">Phòng số #<?php echo e($room->id); ?>    
				</h2>

				<h4 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
					<span class="red-text font-weight-bold">
						<strong><?php echo e(number_format($room->price)); ?></strong>
					</span>
				</h4>

				<div class="font-weight-normal">
					<p><?php echo $room->short_description; ?></p>
					<p><strong>Sức chứa: </strong><?php echo e($room->capacity); ?> người</p>
					<p><strong>Khu vực: </strong>
						<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($room->id_area == $kv->id): ?>
						<?php echo e($kv->name); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</p>
					<p><strong>Loại phòng: </strong>
						<?php $__currentLoopData = $typesRoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($room->id_type == $kv->id): ?>
						<?php echo e($kv->name); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</p>
					<p><strong>Thời hạn: </strong><?php echo e($room->duration); ?> ngày</p>

					<div class="mt-5">
						<p class="grey-text"><strong>Thời hạn muốn thuê</strong></p>
						<form action="<?php echo e(route('checkout', $room->id)); ?>" method="post" class="ml-3">  
							<?php echo csrf_field(); ?>
							<div class="row text-center text-md-left">
								<div class="col-md-4 ">
									<div class="form-group">
										<input class="form-check-input" name="duration" type="radio" checked="checked" value="1">
										<label for="radio100" class="form-check-label dark-grey-text">1 tháng</label>
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="form-group">
										<input class="form-check-input" name="duration" type="radio" value="3">
										<label for="radio100" class="form-check-label dark-grey-text">3 tháng</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-check-input" name="duration" type="radio" value="6">
										<label for="radio101" class="form-check-label dark-grey-text">6 tháng</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-check-input" name="duration" type="radio" value="12">
										<label for="radio102" class="form-check-label dark-grey-text">1 năm</label>
									</div>
								</div>
							</div>

							<div class="row mt-3 mb-4">
								<div class="col-md-12 text-center text-md-left text-md-right">
									<?php if(Auth::check()): ?>
									<?php if($roomOfCustomer != null): ?>
									<a class="btn btn-warning btn-rounded mb-2"> Bạn đã có phòng</a>
									<br>
									<small>Nếu bạn thích phòng này, vui lòng hủy phòng để tiếp tục</small>
									<?php elseif($room->status == 2): ?>
									<a class="btn btn-danger btn-rounded"> Phòng này đã được thuê</a>
									<?php else: ?>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
									<a class="btn btn-warning btn-rounded"> Admin không được đặt phòng</a>
									<?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('RoomManager')): ?>
									<a class="btn btn-warning btn-rounded"> Quản lí phòng không được đặt phòng</a>
									<?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Cashier')): ?>
									<a class="btn btn-warning btn-rounded"> Thu ngân không được đặt phòng</a>
									<?php else: ?>
									<input type="hidden" name="id_phong" value="<?php echo e($room->id); ?>">
									<input type="submit" name="book" value=" Đặt phòng" class="btn btn-outline-primary">
									<?php endif; ?>
									<?php endif; ?>
									<?php elseif($room->status == 2): ?>
									<a class="btn btn-danger btn-rounded"> Phòng này đã được thuê</a>
									<?php else: ?>
									<a href="<?php echo e(route('login')); ?>" class="btn btn-secondary btn-rounded">Vui lòng đăng nhập để đặt phòng</a>
									<?php endif; ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home">Mô tả chi tiết</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu1">Tiện nghi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu2">Ghi chú</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu3">Đánh giá</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
						<p><?php echo $room->long_description; ?></p>
					</div>
					<div id="menu1" class="container tab-pane fade"><br>
						<?php $__currentLoopData = $typesRoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($room->id_type == $kv->id): ?>
						<p><?php echo $kv->description; ?></p>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div id="menu2" class="container tab-pane fade"><br>
						<?php echo $room->note; ?>

					</div>
					<div id="menu3" class="container tab-pane fade"><br>
						<div class="card-body">
							<?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="media p-3">
								<img src="
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($dg->user_id == $tk->id): ?>
								<?php echo e($tk->avatar); ?>

								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								" alt="avatar" class="mr-3 mt-3 rounded-circle" width="70px" height="70px">
								<div class="media-body">
									<h5>
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($dg->user_id == $tk->id): ?>
										<?php echo e($tk->name); ?>

										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <small><i>Đánh giá vào <?php echo e(date_format(date_create($dg->created_at),'d-m-Y H:i:s')); ?></i></small></h5>
										<p class="text-break"><?php echo e($dg->content); ?></p>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<p>Chưa có đánh giá cho căn phòng này</p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Section: Content-->
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/pages/room.blade.php ENDPATH**/ ?>