
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				  <div class="col-sm-6">
				    	<h1 class="m-0 text-dark">Quản lý loại phòng / Sửa loại phòng
				    		<a href="<?php echo e(route('typesroom.index')); ?>"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a>
				    	</h1>
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
		        <div class="card-header">
		          <h5 class="m-0">Sửa loại phòng <?php echo e($type->name); ?></h5>
		        </div>
		        <div class="card-body">
		        	<h6 class="card-title">Vui lòng nhập đầy đủ.</h6>
					<br>

					<form action="<?php echo e(route('typesroom.update', $type->id)); ?>" method="post" accept-charset="utf-8" class="px-2 py-2">
						<?php echo csrf_field(); ?>
						<?php echo method_field('PUT'); ?>
						<div class="row mb-3">
							<label for="">Tên loại phòng</label>
							<input type="text" name="name" value="<?php echo e($type->name); ?>" class="form-control">
						</div>
						<div class="row mb-3">
							<label for="">Mô tả</label>
							<textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"><?php echo e($type->description); ?></textarea>
						</div>
						<div class="row">
							<input type="submit" name="editArea" value="Sửa loại phòng" class="btn btn-success">
						</div>
					</form>
		        </div>
		      </div>
		    </div>
		    <!-- /.col-md-6 -->
		    <div class="col-lg-6">
	            <div class="card card-outline card-warning">
	              <div class="card-header">
	                <h3 class="card-title">Mô tả</h3>

	                <div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
	                  </button>
	                </div>
	                <!-- /.card-tools -->
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body">
	            	<?php echo $type->description; ?>

	              </div>
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	        </div>
		    <!-- /.col-md-6 -->
		  </div>
		  <!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/typesroom/edit.blade.php ENDPATH**/ ?>