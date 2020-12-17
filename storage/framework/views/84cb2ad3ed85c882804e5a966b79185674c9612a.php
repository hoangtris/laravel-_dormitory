

<?php $__env->startSection('content'); ?>

	<div class="row container-fluid my-5">
		<div class="col-3"></div>
		<div class="col-6">

            
            <?php if(session()->get('flag')): ?>
                <div class="alert alert-<?php echo e(session()->get('flag')); ?>">
                    <?php echo e(session()->get('message')); ?>

                </div>
            <?php endif; ?>

            <?php if(!Auth::check()): ?>
			<p class="h1 text-center text-primary text-uppercase mb-4">Đăng kí thành viên</p>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

			<form action="<?php echo e(route('register')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
				<div class="form-row mb-4">
                	<div class="col-6">
                        <!-- name -->
                        <label for="">Họ tên</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Hoàng Trí" required value="<?php echo e(old('name')); ?>">
                    </div>
                    <div class="col-3">
                        <!-- gender -->
                        <label for="">Giới tính</label>
                        <select class="form-control" name="gender" id="gender">
							<option value="Nam" selected>Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
                    </div>
                    <div class="col-3">
                        <label for="">Ngày sinh</label>
                        <input type="date" value="<?php echo e(old('date_of_birth')); ?>" name="date_of_birth" required="" class="form-control">
                    </div>
                </div>

                <!-- Password -->
                <div class="form-row mb-4">
                    <div class="col-4">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Tối thiểu 8 kí tự" name="password" required="" minlength="8">
                    </div>

                    <div class="col-4">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Phải trùng với mật khẩu" name="password_confirm" required="" minlength="8">
                    </div>
                    <div class="col-4">
                        <label>Số điện thoại</label>
                        <input type="text" required="" class="form-control mb-1" placeholder="0868-111-222" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
                        <label class="text-danger" id="label_phone"></label>
                    </div>
                </div>

                <!-- CMND -->
                <div class="form-row mb-3">
                    <div class="col-4">
                        <label>Số CMND</label>
                        <input type="text" required="" class="form-control mb-1" name="identity_card_number" id="identity_card_number" minlength="9" maxlength="12" value="<?php echo e(old('identity_card_number')); ?>">
                        <label class="text-danger" id="label_identity_card_number"></label>
                    </div>
                    <div class="col-4">
                        <label for="">Ngày cấp</label>
                        <input type="date" required="" name="issued_on" class="form-control" value="<?php echo e(old('issued_on')); ?>">
                    </div>
                    <div class="col-4">
                        <label for="">Nơi cấp</label>
                        <select class="form-control" id="issued_at" name="issued_at">
                            <option value="">Chọn Tỉnh/ Thành phố</option>
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="form-row">
                    <div class="col-7">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="hoangtri@ktxcaptain.com" required="" value="<?php echo e(old('email')); ?>">
                        <label class="text-danger" id="label_email"></label>
                    </div>
                    <div class="col mb-3">
                        <label>Username:</label>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" minlength="6" maxlength="32" required="" name="username" id="username" value="<?php echo e(old('username')); ?>">
                        </div>
                        <label class="text-danger" id="label_username"></label>
                    </div>
                </div>

                <div class="form-row mb-4">
                    <label>Ảnh đại diện:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="avatar" name="avatar" required="">
                      <label class="custom-file-label" for="">Hãy chọn ảnh thật rõ khuôn mặt để chúng tôi dễ dàng kiểm duyệt bạn nhé.</label>
                    </div>
                </div>
                <!-- Ảnh đại diện -->

                <div class="form-row mb-4">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required="" value="<?php echo e(old('address')); ?>">
                </div>

                <div class="form-row custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="check_Term" required="">
                    <label class="custom-control-label" for="customCheck">Tôi đồng ý với Điều khoản và Dịch vụ của KTX Captain Hoàng Trí</label>
                </div>
                <!-- Điều khoản -->
                

                <!-- Sign up button -->
                <button class="btn btn-outline-primary my-4 btn-block" name="btn_Register" type="submit">Đăng kí tài khoản</button>
				
				<small class="form-text text-muted mb-4 text-center">
 				Đã có tài khoản, <a href="<?php echo e(route('login')); ?>">ấn vào đây để đăng nhập</a>
					</small>
			</form>
            <?php else: ?>
                <p class="h1 text-center text-primary text-uppercase mb-4">Bạn đã đăng nhập</p>
            <?php endif; ?>
		</div>
		<div class="col-3"></div>
	</div>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // AJAX kiểm tra thông tin
    $(document).ready(function(){
        $("#identity_card_number").keyup(function(){
            var identity_card_number = $(this).val(); //lấy gía trị ng dùng gõ
            //alert(query);
            if(identity_card_number != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"<?php echo e(route('ajax.register')); ?>", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        identity_card_number:identity_card_number,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#label_identity_card_number').html(data);
                    }
                });
            }
        });

        $("#phone").keyup(function(){
            var phone = $(this).val(); //lấy gía trị ng dùng gõ
            //alert(query);
            if(phone != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"<?php echo e(route('ajax.register')); ?>", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        phone:phone,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#label_phone').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là labelcmnd
                    }
                });
            }
        });

        $("#email").keyup(function(){
            var email = $(this).val(); //lấy gía trị ng dùng gõ
            //alert(query);
            if(email != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"<?php echo e(route('ajax.register')); ?>", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        email:email,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#label_email').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là labelcmnd
                    }
                });
            }
        });

        $("#username").keyup(function(){
            var username = $(this).val(); //lấy gía trị ng dùng gõ
            //alert(query);
            if(username != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"<?php echo e(route('ajax.register')); ?>", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        username:username,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#label_username').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là labelcmnd
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/pages/register.blade.php ENDPATH**/ ?>