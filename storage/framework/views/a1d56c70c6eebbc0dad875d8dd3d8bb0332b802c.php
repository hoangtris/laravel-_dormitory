

<?php $__env->startSection('content'); ?>
<div class="container my-2 py-5 z-depth-1">
	<!--Section: Content-->
	<section class="">
		<!-- Section heading -->
		<h3 class="font-weight-bold mb-5 text-center">Chi tiết phòng #<?php echo e($room->id); ?>

			<?php if($room->status == 2): ?>
			<span class="badge badge-danger">Phòng này đã được thuê</span>
			<?php endif; ?>
		</h3>
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-12">
				<!--Carousel Wrapper-->
				<div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">
					<!--Slides-->
					<div class="carousel-inner text-center" role="listbox">
						<div class="carousel-item active">
							<img src="
							<?php if(strstr($room->image,'http')): ?>
								<?php echo e($room->image); ?>

							<?php else: ?>
								<?php echo e(asset('upload/room/'.$room->image)); ?>

							<?php endif; ?>
							" alt="" height="350px">
						</div>
					</div>
					<!--/.Slides-->
				</div>
				<!--/.Carousel Wrapper-->
			</div>

			<div class="col-xl-6 col-sm-6 col-12">

				<h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ">Phòng số #<?php echo e($room->id); ?>    
				</h2>

				<h4 class="h3-responsive text-xl-left text-sm-left text-center mb-5 ">
					<span class="red-text font-weight-bold">
						<strong><?php echo e(number_format($room->price)); ?></strong>
					</span>
				</h4>

				<div class="font-weight-normal">
					<p><?php echo $room->short_description; ?></p>
					<p><strong>Sức chứa: </strong><?php echo e($room->capacity); ?> người</p>
					<p><strong>Khu vực: </strong> <?php echo e($room->area->name); ?> </p>
					<p><strong>Loại phòng: </strong> <?php echo e($room->typeRoom->name); ?> </p>
					<p><strong>Thời hạn: </strong><?php echo e($room->duration); ?> ngày</p>

					<div class="mt-5">
						<form action="<?php echo e(route('checkout', $room->id)); ?>" method="post" class="ml-3">  
							<?php echo csrf_field(); ?>
							<div class="row mt-3 mb-4">
								<div class="col-md-12 text-center text-md-left text-md-right">
									<?php if(Auth::check()): ?>
										<input type="hidden" name="id_phong" value="<?php echo e($room->id); ?>">
										<input type="submit" name="book" value=" Đặt phòng" class="btn btn-outline-primary">
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
						<p><?php echo $room->typeRoom->description; ?></p>
					</div>
					<div id="menu2" class="container tab-pane fade"><br>
						<?php echo $room->note; ?>

					</div>
					<div id="menu3" class="container tab-pane fade"><br>
						<?php if(Auth::check()): ?>
						<form action="<?php echo e(route('review.store')); ?>" method="post">
							<?php echo csrf_field(); ?>
							<label for="addReview">Nhập đánh giá</label>
							<textarea class="form-control" rows="5" name="content" required=""></textarea>
							<input type="hidden" name="room_id" value="<?php echo e($room->id); ?>">
							<input type="submit" name="addReview" value="Gửi đánh giá" class="btn btn-success mt-2">
						</form>
						<?php else: ?>
							<p class="alert alert-warning">Vui lòng <a href="<?php echo e(route('login')); ?>" class="font-weight-bold alert-warning">đăng nhập</a> để đánh giá căn phòng này</p>
						<?php endif; ?>

						<?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<div class="media my-2">
							<img src="
							<?php if(strstr($dg->user->avatar,'https')): ?>
								<?php echo e($dg->user->avatar); ?>

							<?php else: ?>
								<?php echo e(asset('upload/avatar/'.$dg->user->avatar)); ?>

							<?php endif; ?>
							" alt="avatar" class="mr-3 mt-3 rounded-circle" width="70px" height="70px">
							<div class="media-body">
								<h5>
									<?php echo e($dg->user->name); ?>

									<small>
										<i>Đánh giá vào <?php echo e(date_format(date_create($dg->created_at),'d-m-Y H:i:s')); ?></i>
									</small>
								</h5>
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
	</section>
	<!--Section: Content-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/pages/room.blade.php ENDPATH**/ ?>