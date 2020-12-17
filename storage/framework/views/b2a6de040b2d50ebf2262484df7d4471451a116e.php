
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
				<div class="col-12">
					<p class="text-right"><a href="" class="read-all-notify">Đánh dấu tất cả là đã đọc</a></p>

					<div class="card">
						<div class="card-body">
							<ul class="list-group list-group-flush">
								<?php $__empty_1 = true; $__currentLoopData = $notify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<li class="list-group-item">
										<a id="<?php echo e($n->id); ?>" href="" class="notify 
											<?php if($n->status != 3): ?>
												text-secondary
											<?php else: ?>
												text-dark  
											<?php endif; ?>">
											<b>Đơn <?php echo e($n->content); ?></b> của bạn đã được chấp nhận
										</a>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									Không có thông báo
								<?php endif; ?>
							</ul>
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
					url:"<?php echo e(route('client.notification.update')); ?>", 
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
		$(".read-all-notify").click(function(){
			//alert('hi');
			$.ajax({
				url: "<?php echo e(route('client.notification.update.all')); ?>",
				method: "GET",
				success:function(data){
					
				}
			});
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/client/notification.blade.php ENDPATH**/ ?>