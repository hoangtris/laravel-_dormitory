
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Danh sách thông báo</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-4 col-lg-6 col-sm-12 col-12">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Đơn đặt phòng</h5>
							<p class="card-text p-0">
								<ul class="list-group list-group-flush">
									<?php $__currentLoopData = $notifyBooking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<a id="<?php echo e($n->id); ?>" class="text-dark notify" href="#">
											<li class="list-group-item
											<?php if($n->status != 1): ?>
												text-secondary
											<?php endif; ?>">
												<b><?php echo e($n->user->name); ?></b> vừa <?php echo e(strtolower($n->content)); ?>

											</li>
										</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Đơn trả phòng sớm</h5>

							<p class="card-text">
								<ul class="list-group list-group-flush">
									<?php $__currentLoopData = $notifyCancel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<a id="<?php echo e($n->id); ?>" class="text-dark notify" href="#">
											<li class="list-group-item
											<?php if($n->status != 1): ?>
												text-secondary
											<?php endif; ?>">
												<b><?php echo e($n->user->name); ?></b> vừa <?php echo e(strtolower($n->content)); ?>

											</li>
										</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Đơn yêu cầu</h5>

							<p class="card-text">
								<ul class="list-group list-group-flush">
									<?php $__currentLoopData = $notifyRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<a id="<?php echo e($n->id); ?>" class="text-dark notify" href="#">
											<li class="list-group-item
											<?php if($n->status != 1): ?>
												text-secondary
											<?php endif; ?>">
												<b><?php echo e($n->user->name); ?></b> vừa <?php echo e(strtolower($n->content)); ?>

											</li>
										</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</p>
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
<script>
    $(document).ready(function(){
        $(".notify").click(function(){
            var idNotify = $(this).attr("id");
            //alert(idNotify);
            $.ajax({
                url:"<?php echo e(route('admin.notification.update')); ?>", 
                method:"GET", // phương thức gửi dữ liệu.
                data:{
                    idNotify:idNotify
                },
                //dataType: "json",
                success:function(data){ //dữ liệu nhận về 
                	//$('#haha').html(data.content);
                    //window.location.reload();
                    window.location.href = data
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/notification/index.blade.php ENDPATH**/ ?>