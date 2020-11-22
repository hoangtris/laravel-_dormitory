

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
			<form action="<?php echo e(route('register')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
				<div class="form-row mb-4">
                	<div class="col-6">
                        <!-- name -->
                        <label for="">Họ tên</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Hoàng Trí">
                    </div>
                    <div class="col-3">
                        <!-- gender -->
                        <label for="">Giới tính</label>
                        <select class="form-control" name="gender" id="gender">
							<option value="null">Giới tính</option>
							<option value="Nam" selected>Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
                    </div>
                    <div class="col-3">
                        <label for="">Ngày sinh</label>
                        <input type="date" name="date_of_birth" required="" class="form-control">
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
                        <input type="text" required="" class="form-control mb-1" placeholder="0868-111-222" name="phone" id="phone">
                        <label class="text-danger" id="label_phone"></label>
                    </div>
                </div>

                <!-- CMND -->
                <div class="form-row mb-3">
                    <div class="col-4">
                        <label>Số CMND</label>
                        <input type="text" required="" class="form-control mb-1" placeholder="Tối thiểu 9 số" name="identity_card_number" id="identity_card_number" minlength="9" maxlength="12">
                        <label class="text-danger" id="label_identity_card_number"></label>
                    </div>
                    <div class="col-4">
                        <label for="">Ngày cấp</label>
                        <input type="date" required="" name="issued_on" placeholder="15/12/2000" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="">Nơi cấp</label>
                        <select class="form-control" id="issued_at" name="issued_at">
                            <option value="">Chọn Tỉnh/ Thành phố</option>
                            <option value="1">Thành phố Hà Nội</option>
                            <option value="3">Thành phố Hải Phòng</option>
                            <option value="4">Thành phố Đà Nẵng</option>
                            <option value="5">Tỉnh Hà Giang</option>
                            <option value="6">Tỉnh Cao Bằng</option>
                            <option value="7">Tỉnh Lai Châu</option>
                            <option value="8">Tỉnh Lào Cai</option>
                            <option value="9">Tỉnh Tuyên Quang</option>
                            <option value="10">Tỉnh Lạng Sơn</option>
                            <option value="11">Tỉnh Bắc Kạn</option>
                            <option value="12">Tỉnh Thái Nguyên</option>
                            <option value="14">Tỉnh Sơn La</option>
                            <option value="15">Tỉnh Phú Thọ</option>
                            <option value="16">Tỉnh Vĩnh Phúc</option>
                            <option value="20">Hà Tây</option>
                            <option value="21">Tỉnh Hải Dương</option>
                            <option value="23">Tỉnh Hòa Bình</option>
                            <option value="27">Tỉnh Ninh Bình</option>
                            <option value="30">Tỉnh Hà Tĩnh</option>
                            <option value="31">Tỉnh Quảng Bình</option>
                            <option value="32">Tỉnh Quảng Trị</option>
                            <option value="38">Tỉnh Gia Lai</option>
                            <option value="39">Tỉnh Phú Yên</option>
                            <option value="45">Tỉnh Ninh Thuận</option>
                            <option value="50">Tỉnh Đồng Tháp</option>
                            <option value="51">Tỉnh An Giang</option>
                            <option value="58">Tỉnh Trà Vinh</option>
                            <option value="61">Tỉnh Cà Mau</option>
                            <option value="69">Tỉnh Bắc Giang</option>
                            <option value="77">Tỉnh Bình Dương</option>
                            <option value="88">Tỉnh Hà Nam</option>
                            <option value="89">Tỉnh Kon Tum</option>
                            <option value="96">Tỉnh Đồng Nai</option>
                            <option value="102">Tỉnh Bắc Ninh</option>
                            <option value="103">Tỉnh Nam Định</option>
                            <option value="104">Tỉnh Thừa Thiên Huế</option>
                            <option value="112">Tỉnh Bình Phước</option>
                            <option value="114">Tỉnh Quảng Ninh</option>
                            <option value="115">Tỉnh Lâm Đồng</option>
                            <option value="116">Tỉnh Long An</option>
                            <option value="117">Tỉnh Bà Rịa - Vũng Tàu</option>
                            <option value="119">Tỉnh Nghệ An</option>
                            <option value="120">Tỉnh Quảng Ngãi</option>
                            <option value="121">Tỉnh Bình Định</option>
                            <option value="122">Tỉnh Kiên Giang</option>
                            <option value="123">Tỉnh Hưng Yên</option>
                            <option value="124">Tỉnh Quảng Nam</option>
                            <option value="125">Tỉnh Bình Thuận</option>
                            <option value="126">Tỉnh Thái Bình</option>
                            <option value="127">Tỉnh Thanh Hóa</option>
                            <option value="128">Tỉnh Khánh Hòa</option>
                            <option value="129">Tỉnh Tây Ninh</option>
                            <option value="131">Thành phố Cần Thơ</option>
                            <option value="132">Tỉnh Bến Tre</option>
                            <option value="133">Tỉnh Bạc Liêu</option>
                            <option value="134">Tỉnh Yên Bái</option>
                            <option value="135">Tỉnh Tiền Giang</option>
                            <option value="137">Tỉnh Vĩnh Long</option>
                            <option value="138">Tỉnh Đắk Lắk</option>
                            <option value="139">Tỉnh Sóc Trăng</option>
                            <option value="140" selected="">Thành phố Hồ Chí Minh</option>
                            <option value="141">Tỉnh Điện Biên</option>
                            <option value="142">Tỉnh Đắk Nông</option>
                            <option value="143">Tỉnh Hậu Giang</option>
                            <option value="144">Hà Nội cũ</option>
                            <option value="145">Hà Tây cũ</option>
                            <option value="146">Hải Hưng</option>
                            <option value="147">Hà Bắc</option>
                            <option value="148">Sông Bé</option>
                            <option value="149">Nam Hà</option>
                            <option value="150">Hồng Kông</option>
                            <option value="151">Liên bang Nga</option>
                            <option value="152">Hà Nam Ninh</option>
                            <option value="153">Thái Lan</option>
                            <option value="154">Bộ quốc phòng</option>
                            <option value="155">Malaysia</option>
                            <option value="156">Tỉnh Hải Hưng</option>
                        </select>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="form-row">
                    <div class="col-7">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="hoangtri@ktxcaptain.com" required="">
                        <label class="text-danger" id="label_email"></label>
                    </div>
                    <div class="col mb-3">
                        <label>Username:</label>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" minlength="6" maxlength="32" required="" name="username" id="username">
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
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required="">
                </div>

                <div class="form-row custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="check_Term" required="">
                    <label class="custom-control-label" for="customCheck">Tôi đồng ý với Điều khoản và Dịch vụ của kí túc xá Captain Hoàng Trí</label>
                </div>
                <!-- Điều khoản -->
                

                <!-- Sign up button -->
                <button class="btn btn-outline-primary my-4 btn-block" name="btn_Register" type="submit">Đăng kí tài khoản</button>
				
				<small id="#" class="form-text text-muted mb-4 text-center">
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/pages/register.blade.php ENDPATH**/ ?>