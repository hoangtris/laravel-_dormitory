
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Sửa thông tin cá nhân</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<form action="<?php echo e(route('client.information.update', $user->id)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="row">

					<div class="col-lg-8">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h5 class="m-0">Thông tin chung</h5>
							</div>
							<div class="card-body">
								<div class="row mb-4">
									<div class="col-6">
										<label>Họ tên</label>
										<input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control">
									</div>
									<div class="col-3">
										<label>Giới tính</label>
										<select name="gender" class="form-control">
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
									<div class="col-3">
										<label>Ngày sinh</label>
										<input type="date" name="date_of_birth" value="<?php echo e($user->date_of_birth); ?>" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-6">
										<label>Email</label>
										<input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control">
									</div>
									<div class="col-3">
										<label>Số điện thoại</label>
										<input type="text" name="phone" value="<?php echo e($user->phone); ?>" class="form-control">
									</div>
									<div class="col-3">
										<label>Nơi sinh</label>
										<input type="text" name="place_of_birth" value="<?php echo e($user->place_of_birth); ?>" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-3">
										<label>CMND</label>
										<input type="text" name="identity_card_number" value="<?php echo e($user->identity_card_number); ?>" class="form-control">
									</div>
									<div class="col-3">
										<label>Ngày cấp</label>
										<input type="date" name="issued_on" value="<?php echo e($user->issued_on); ?>" class="form-control">
									</div>
									<div class="col-3">
										<label>Nơi cấp</label>
										<select name="issued_at" class="form-control">
											<?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issuedAt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($issuedAt->id); ?>"
													<?php if($issuedAt->id == $user->issued_at): ?>
														selected="" 
													<?php endif; ?>><?php echo e($issuedAt->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
										</select>
										
									</div>
									<div class="col-3">
										<label>Quốc tịch</label>
										<select name="nationality_id" class="form-control">
											<option value="0">- Chọn quốc tịch -</option>
											<?php $__currentLoopData = $nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($nation->id); ?>"
													<?php if($nation->id == $user->nationality_id): ?>
														selected="" 
													<?php endif; ?>><?php echo e($nation->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-3">
										<label>Dân tộc</label>
										<select name="nation_id" class="form-control">
											<option value="0">- Chọn dân tộc -</option>
											<?php $__currentLoopData = $nations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($nation->id); ?>"
													<?php if($nation->id == $user->nation_id): ?>
														selected="" 
													<?php endif; ?>
													><?php echo e($nation->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
									<div class="col-3">
										<label>Tôn giáo</label>
										<select name="religious_id" class="form-control">
											<option value="0">- Chọn tôn giáo -</option>
											<?php $__currentLoopData = $religiouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($nation->id); ?>"
													<?php if($nation->id == $user->religious_id): ?>
														selected="" 
													<?php endif; ?>><?php echo e($nation->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
									<div class="col">
										<label>Username</label>
										<input type="text" name="username" value="<?php echo e($user->username); ?>" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="card card-warning card-outline">
							<div class="card-header">
								<h5 class="m-0">Địa chỉ</h5>
							</div>
							<div class="card-body">
								<div class="row mb-4">
									<div class="col-6">
										<label>Tỉnh thành</label>
										<select name="province_id" id="province_id" class="form-control">
											<?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
									<div class="col-3">
										<label>Quận huyện</label>
										<select name="district_id" id="district_id" class="form-control">
											
										</select>
									</div>
									<div class="col-3">
										<label>Phường xã</label>
										<select name="ward_id" id="ward_id" class="form-control">
											
										</select>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-12">
										<label>Địa chỉ</label>
										<input class="form-control" type="text" name="address" value="<?php echo e($user->address); ?>">									
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.col-md-6 -->
					<div class="col-lg">
						<div class="card card-danger card-outline">
							<div class="card-header">
								<h5 class="m-0">Hành động</h5>
							</div>
							<div class="card-body">
								<div class="card-text">
									<input type="submit" name="editInfor" value="Sửa thông tin" class="btn btn-primary btn-block">
									<input type="submit" name="cancel" value="Hủy" class="btn btn-outline-secondary btn-block">
								</div>
							</div>
						</div>
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h5 class="m-0">Ảnh đại diện</h5>
							</div>
							<div class="card-body">
								<div class="card-text">
									<div class="image-upload">
										<label for="file-input">
											<img src="
											<?php if(strstr($user->avatar,'http')): ?>
											<?php echo e($user->avatar); ?>

											<?php else: ?>
											<?php echo e(asset('upload/avatar/'.$user->avatar)); ?>

											<?php endif; ?>
											" width="100%" />
										</label>
										<input style="display: none" id="file-input" name="avatar" type="file" />
										<input type="hidden" name="oldAvatar" value="<?php echo e($user->avatar); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.col-md-6 -->

				</div>
				<!-- /.row -->
			</form>  
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function(){
        $("#province").change(function(){
            var province = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(route('province')); ?>", 
                method:"POST", // phương thức gửi dữ liệu.
                dataType: 'json',
			    cache: false,
                data:{
                    province:province,
                     _token:_token
                },
                success:function(obj){ //dữ liệu nhận về 
                	var listItems = '<option selected="selected" value="0">- Chọn Quận/Huyện -</option>';

                    obj.forEach(function(obj) { 
                    	listItems += "<option value='" + obj.id + "'>" + obj.prefix + " " +obj.name + "</option>";
                    });
                    $("#district").html(listItems);
                }
            });
        });

        $("#district").change(function(){
            var district = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(route('district')); ?>", 
                method:"POST", // phương thức gửi dữ liệu.
                dataType: 'json',
			    cache: false,
                data:{
                    district:district,
                     _token:_token
                },
                success:function(obj){ //dữ liệu nhận về 
                	var listItems = '<option selected="selected" value="0">- Chọn Phường/Xã -</option>';

                    obj.forEach(function(obj) { 
                    	listItems += "<option value='" + obj.id + "'>" + obj.prefix + " " +obj.name + "</option>";
                    });
                    $("#ward").html(listItems);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/client/editInformation.blade.php ENDPATH**/ ?>