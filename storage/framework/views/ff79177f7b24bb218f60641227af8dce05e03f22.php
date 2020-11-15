
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Vai trò</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0 float-left">Danh sách tài khoản - vai trò</h5>

							<form action="<?php echo e(route('admin.role')); ?>" method="get" accept-charset="utf-8" class="form-inline float-right">
								<select name="slRole" class="custom-select mr-2">
									<option value="0">Tất cả</option>
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<input type="submit" name="" value="Lọc" class="btn btn-outline-primary" >
							</form>
						</div>
						<div class="px-2">
							<table class="table table-hover table-responsive-xl table-head-fixed text-nowrap">
								<thead>
									<th>#</th>
									<th>Username</th>
									<th>Email</th>
									<th>Vai trò</th>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($user->id); ?></td>
										<td><?php echo e($user->username); ?></td>
										<td><?php echo e($user->email); ?></td>
										<td>
											<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($role->id == $user->id_role): ?>
													<?php echo e($role->name); ?>

												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="4" class="text-center">Không có dữ liệu</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
							<?php echo e($users->links()); ?>


						</div>
					</div>

					<div class="callout callout-danger">
						<h5 class="text-danger"><i class="fas fa-trash"></i>&nbsp Xóa vai trò</h5>

						<p>Hành động <span class="text-danger">xóa một vai trò rất nguy hiểm đến hệ thống</span> , nên chúng tôi chỉ cho phép bạn xóa những vai trò có số lượng người dùng bằng 0 (không)</p>
						<p>Coming soon!</p>

						
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl col-12">
					<div class="card card-outline card-success">
						<div class="card-header">
							<h3 class="card-title">Thêm vai trò</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form action="<?php echo e(route('admin.role.store')); ?>" method="post" accept-charset="utf-8" class="px-2">
								<?php echo csrf_field(); ?>
								<div class="row mb-4">
									<label for="">Tên vai trò</label>
									<input type="text" name="name" placeholder="Quản lý tài khoản" class="form-control" required>
								</div>
								<div class="row mb-4">
									<label for="">Mô tả vai trò</label>
									<textarea rows="3" class="form-control" name="description" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras finibus, turpis eget hendrerit semper, eros nunc gravida sapien, nec feugiat diam arcu eu massa." required></textarea>
								</div>
								<div class="row">
									<input type="submit" name="addRole" class="btn btn-outline-success" value="Thêm vai trò">
								</div>
							</form>	
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

					<div class="card card-outline card-info">
						<div class="card-header">
							<h3 class="card-title">Thay đổi vai trò người dùng</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form action="<?php echo e(route('changeRoleUser')); ?>" method="post" accept-charset="utf-8" class="px-2">
								<?php echo csrf_field(); ?>
								<div class="row mb-4">
									<label for="">ID - Tên người dùng</label>
									<select id="selectUser" name="selectUser" class="custom-select">
										<?php $__currentLoopData = $userAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($user->id); ?>">#<?php echo e($user->id); ?> - <?php echo e($user->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>

									<label id="labelcmnd"></label>
								</div>
								<div class="row mb-4">
									<label for="">Vai trò</label>
									<select id="selectRole" name="selectRole" class="custom-select">
										<option value=""></option>
									</select>
								</div>
								<div class="row">
									<input type="submit" name="editRoleForUser" class="btn btn-outline-info" value="Thay đổi vai trò" onclick="return confirm('Bạn chắc chưa?')">
								</div>
							</form>	
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

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
						<div class="card-body" style="line-height: 30px">
							Trang này mô tả các vai trò của người dùng trong hệ thống. Hiện tại có <?php echo e(count($roles)); ?> vai trò trong hệ thống:
							<ul class="list-group list-group-flush">
								<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $count_user_of_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($role->id == $count->id_role): ?>
								<li class="list-group-item d-flex justify-content-between align-items-center">
									#<?php echo e($role->id); ?> - <?php echo e($role->name); ?>

									<span class="badge badge-primary badge-pill"><?php echo e($count->total); ?></span>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
								<br>
								<ul>
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo e($role->name); ?>: <?php echo e($role->description); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
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
<script>
    $(document).ready(function(){
        $("#selectUser").change(function(){
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            //alert(query);
            if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"<?php echo e(route('changeRole')); ?>", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        query:query,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#selectRole').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là labelcmnd
                    }
                });
            }
        });
    });
</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/users/permission.blade.php ENDPATH**/ ?>