
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				  <div class="col-sm-6">
				    	<h1 class="m-0 text-dark">Quản lý khu vực</h1>
				  </div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
		  <div class="row">
		    <div class="col-xl-6 col-12">

		      <div class="card card-primary card-outline">
		        <div class="card-header">
		          <h5 class="m-0">Danh sách khu vực</h5>
		        </div>
		        <div class="px-2">
		        	<table class="table table-hover table-responsive-xl">
		        		<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        		<tr>
		        			<td>
		        				<?php echo e($kv->name); ?>	        				
		        			</td>
		        			<td>
		        				<?php echo e($kv->slug); ?>	 
		        			</td>
		        			<td>
		        				<form action="<?php echo e(route('areas.edit', $kv->id)); ?>" method="get">
									<button type="submit" class="btn btn-outline-success float-left mr-1">
										<i class="fas fa-pen"></i>
									</button>            
								</form>

		        				<form action="<?php echo e(route('areas.destroy', $kv->id)); ?>" method="post">
		        					<?php echo method_field('DELETE'); ?>
									<?php echo csrf_field(); ?>
									<button type="submit" class="btn btn-outline-danger">
										<i class="fas fa-trash-alt"></i>
									</button>            
								</form>
		        			</td>
		        		</tr>
		        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        	</table>

		        </div>
		      </div>
		    </div>
		    <!-- /.col-md-6 -->
		    <div class="col-xl-6 col-12">
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
	            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras finibus, turpis eget hendrerit semper, eros nunc gravida sapien, nec feugiat diam arcu eu massa.
	              </div>
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->

		      <div class="card card-success card-outline collapsed-card">
		        <div class="card-header">
		          <h5 class="card-title m-0">Thêm khu vực</h5>
		          <div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
	                  </button>
	              </div>
	                <!-- /.card-tools -->
		        </div>
		        <div class="card-body">
		          <h6 class="card-title">Vui lòng nhập đầy đủ.</h6>
		          <br>

		          <form action="<?php echo e(route('areas.store')); ?>" method="post" accept-charset="utf-8" class="px-2 py-2">
		          	<?php echo csrf_field(); ?>
		          	<div class="row mb-3">
		          		<label for="">Tên khu vực</label>
		          		<input type="text" name="name" placeholder="Cu Chi district" class="form-control">
		          	</div>
		          	<div class="row mb-3">
		          		<label for="">Mô tả</label>
		          		<textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"></textarea>
		          	</div>
		          	<div class="row">
		          		<input type="submit" name="addArea" value="Thêm khu vực" class="btn btn-success">
		          	</div>
		          </form>

		        </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_dormitory\resources\views/admin/areas/index.blade.php ENDPATH**/ ?>