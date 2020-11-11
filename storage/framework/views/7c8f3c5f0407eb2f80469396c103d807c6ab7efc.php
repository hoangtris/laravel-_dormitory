

<?php $__env->startSection('content'); ?>

	<div class="row container-fluid my-5">
		<div class="col-4"></div>
		<div class="col-4">
            
            <?php if(Session::has('flash_message')): ?>
              <div class="alert alert-success"><?php echo e(Session::get('flash_message')); ?></div>
            <?php endif; ?>

            
			<?php if(session()->get('flag')): ?>
				<div class="alert alert-<?php echo e(session()->get('flag')); ?>">
                    <?php echo e(session()->get('message')); ?>

                </div>
			<?php endif; ?>

            <?php if(!Auth::check()): ?>
			<p class="h1 text-center text-primary text-uppercase mb-4">Đăng nhập</p>
			<form action="login" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

                <input type="password" class="form-control mb-4" placeholder="Mật khẩu" name="password">

                <input type="hidden" name="url_ref" value="<?php echo e(url()->previous()); ?>">
                
                <small id="#" class="form-text text-muted mb-4">
                Quên mật khẩu? <a href="#">Yêu cầu khôi phục mật khẩu</a>
                </small>

                <button class="btn btn-outline-primary my-4 btn-block" name="btn_DangNhap" type="submit">Đăng nhập</button>
                
                <small id="#" class="form-text text-muted mb-4 text-center">
                Chưa có tài khoản, <a href="<?php echo e(route('register')); ?>">ấn vào đây để đăng kí</a>
                </small>
			</form>
            <?php else: ?>
                <p class="h1 text-center text-primary text-uppercase mb-4">Bạn đã đăng nhập</p>
                <p class="text-center">Vai trò của bạn là 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Admin')): ?>
                        <label class="text-danger">Admin</label>
                    <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('RoomManager')): ?>
                        <label class="text-danger">Quản lí phòng</label>
                    <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Cashier')): ?>
                        <label class="text-danger">Thu ngân</label>
                    <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Customer')): ?>
                        <label class="text-danger">Khách hàng</label>
                    <?php else: ?>
                        Chua phan quyen
                    <?php endif; ?>
                </p>
            <?php endif; ?>
		</div>
		<div class="col-4"></div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/pages/login.blade.php ENDPATH**/ ?>