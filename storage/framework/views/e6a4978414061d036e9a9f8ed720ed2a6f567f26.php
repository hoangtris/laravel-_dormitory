
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Phản hồi của khách hàng</h1>
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
					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Danh sách</h5>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-head-fixed">
								<thead>
									<tr>
										<th width="10%">Họ tên</th>
										<th width="10%">Email</th>
										<th>Tiêu dề</th>
										<th>Nội dung</th>
										<th width="10%">Thời gian</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                  
									<tr <?php if($f->status == 0): ?> class="font-weight-bold" <?php endif; ?>>
										<td><?php echo e($f->name); ?></td>
										<td><?php echo e($f->email); ?></td>
										<td>
											<?php echo e($f->subject); ?>

										</td>
										<td><?php echo e($f->content); ?></td>
										<td><?php echo e(date("d-m-Y", strtotime($f->created_at))); ?></td>
										<td>
											<a href="mailto:<?php echo e($f->email); ?>?subject=Re: <?php echo e($f->subject); ?>" class="feedback" id="<?php echo e($f->id); ?>">
												<span class="badge badge-info">Phản hồi</span>
											</a>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
							<label id="aaa"></label>
						</div>
					</div>
					<div class="callout callout-danger">
						<h5>Xóa phản hồi!</h5>

						<p>Hành động này sẽ xóa hết tất cả dữ liệu của khách hàng phản hồi trong hệ thống. Hành động này không thể hoàn tác, bạn hãy thật chắc chắn trước khi xóa</p>
						<form action="<?php echo e(route('admin.feedback.truncate')); ?>" method="post" accept-charset="utf-8">
							<?php echo csrf_field(); ?>
							<input type="submit" name="truncateFeedback" value="Xóa tất cả phản hồi" class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chưa?') ">
						</form>
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
<script>
    $(document).ready(function(){
        $(".feedback").click(function(){
            var id = $(this).attr("id");
            $.ajax({
                url:"<?php echo e(route('admin.feedback.update')); ?>", 
                method:"GET", // phương thức gửi dữ liệu.
                data:{
                    id
                },
                //dataType: "json",
                success:function(data){ //dữ liệu nhận về 
                	//$('#aaa').html(data);
                    window.location.reload();
                    //window.location.href = data
                },
                error: function(req, err){ console.log('my message' + err); }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/feedback.blade.php ENDPATH**/ ?>