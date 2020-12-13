@extends('master')
@section('content')
	<div id="demo" class="carousel slide" data-ride="carousel">
  
	    <div class="carousel-inner">
	    	<div class="carousel-item active">
				<img src="{{ asset('image/02072020_8-8.jpg') }}" width="100%" height="400px" style="object-fit: cover;">
				<div class="carousel-caption">
					<h3>Ký túc xá</h3>
					<p>Cung cấp nơi ở tập thể với giá rẻ vô cùng hợp lý và đầy đủ tiện nghi</p>
				</div>   
			</div>
			<div class="carousel-item">
				<img src="{{ asset('image/30062020_5-loai-chi-phi-khi-du-hoc-Singapore-du-hoc-sinh-phai-biet-2.jpg') }}" width="100%" height="400px" style="object-fit: cover;">
				<div class="carousel-caption">
					<h3>Phòng Homestay</h3>
					<p>Nơi ở đẹp, thân thiên với môi trường</p>
				</div>   
			</div>
			<div class="carousel-item">
				<img src="{{ asset('image/02072020_kinh-nghiem-tim-phong-tro-gia-re-top-xx-website-t-4.jpg') }}" width="100%" height="400px" style="object-fit: cover;">
				<div class="carousel-caption">
					<h3>Phòng 4 người</h3>
					<p>Phòng nhóm rộng rãi, thoáng mát, sạch sẽ</p>
				</div>   
			</div>
	    </div>

	    <a class="carousel-control-prev" href="#demo" data-slide="prev">
	      <span class="carousel-control-prev-icon"></span>
	    </a>

	    <a class="carousel-control-next" href="#demo" data-slide="next">
	      <span class="carousel-control-next-icon"></span>
	    </a>
	</div>  {{-- slider --}}

	<div class="mt-4 text-center">
		<div class="container">
			<p class="display-4 text-uppercase">BẠN ĐANG TÌM KIẾM MỘT NƠI LƯU TRÚ?</p>
			<p class="font-italic py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. Vestibulum non cursus ipsum. Suspendisse sagittis convallis cursus. Etiam odio mauris, accumsan ut lorem ac, fringilla ullamcorper augue. Aliquam erat volutpat. Vestibulum mollis, tellus non elementum consequat, lectus lorem maximus sapien, vitae dapibus orci felis id lorem. Integer vitae nunc eros. Donec vehicula id quam sit amet viverra. Fusce et eros magna. Duis consectetur quis ante sit amet hendrerit. Suspendisse interdum interdum aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vel vehicula justo. Aenean enim tellus, semper id tincidunt id, tempus vel odio. Ut vel vehicula justo. Aenean enim tellus, semper id tincidunt id, tempus vel odio.</p>
			<hr class="">
			<img src="{{ asset('image/logoKTX.jpg') }}" alt="" width="400px">
			<p class="display-4 text-uppercase pt-3">BẠN đừng lo</p>
			<p class="font-italic pb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. </p>

			
		</div>
		<div style="background-color: rgb(224, 224, 224);">
			<div class="container py-3">
				<p class="display-4 text-uppercase text-success pt-3">Kí túc xá Captain Hoàng Trí sẽ lo tất cả</p>
				<p class="py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. Vestibulum non cursus ipsum. Suspendisse sagittis convallis cursus. Etiam odio mauris, accumsan ut lorem ac, fringilla ullamcorper augue. Aliquam erat volutpat. Vestibulum mollis, tellus non elementum consequat, lectus lorem maximus sapien, vitae dapibus orci felis id lorem. Integer vitae nunc eros. Donec vehicula id quam sit amet viverra. Fusce et eros magna. Duis consectetur quis ante sit amet hendrerit. Suspendisse interdum interdum aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vel vehicula justo. Aenean enim tellus, semper id tincidunt id, tempus vel odio. Ut vel vehicula justo. Aenean enim tellus, semper id tincidunt id, tempus vel odio.
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. Vestibulum non cursus ipsum. Suspendisse sagittis convallis cursus. Etiam odio mauris, accumsan ut lorem ac, fringilla ullamcorper augue. Aliquam erat volutpat. Vestibulum mollis, tellus non elementum consequat, lectus lorem maximus sapien, vitae dapibus orci felis id lorem. Integer vitae nunc eros. Donec vehicula id quam sit amet viverra. Fusce et eros magna. Duis consectetur quis ante sit amet hendrerit. Suspendisse interdum interdum aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vel vehicula justo. Aenean enim tellus, semper id tincidunt id, tempus vel odio. Ut vel vehicula justo. Aenean enim tellus, semper id tincidunt id, tempus vel odio.</p>
			</div>				
		</div>

		<div class="container pt-0 my-4 z-depth-1"> <!--slogan của KTX-->
		  <section class="p-md-3 mx-md-5">
			<div class="row d-flex justify-content-between align-items-center">
			  <div class="col-md-6 mb-4">
				<h2 class="font-weight-bold mb-3">Slogan nổi bật KTX</h2>
				<p class="text-muted pt-3">
				  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
				  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
				  enim ad minim veniam, quis nostrud exercitation ullamco laboris
				  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
				  in reprehenderit in voluptate velit esse cillum dolore eu fugiat
				  nulla pariatur. Excepteur sint occaecat cupidatat non proident,
				  sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			  </div>
			  <div class="col-md-6 col-lg-6 d-flex justify-content-center mb-md-0 mb-5">
				<img src="{{ asset('image/logoKTX.jpg') }}" width="100%"/> <!--logo (avatar/icon) tính năng-->
			  </div>
			</div>

			<div class="row pt-4">
			  <div class="col-lg-3 col-md-6 mb-1">
				<h4 class="font-weight-bold mb-3">
				  <i class="fa fa-shield indigo-text pr-2"></i> An toàn
				</h4>
				<p class="text-muted mb-lg-0">
				  Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				</p>
			  </div>
			  <div class="col-lg-3 col-md-6 mb-1">
				<h4 class="font-weight-bold mb-3">
				  <i class="fa fa-users green-text pr-2"></i> Thân thiện
				</h4>
				<p class="text-muted mb-lg-0">
				  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
			  </div>
			  <div class="col-lg-3 col-md-6 mb-1">
				<h4 class="font-weight-bold mb-3">
				  <i class="fa fa-check-square-o amber-text pr-2"></i> Tiện nghi
				</h4>
				<p class="text-muted mb-md-0">
				  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
			  </div>
			  <div class="col-lg-3 col-md-6 mb-1">
				<h4 class="font-weight-bold mb-3">
				  <i class="fa fa-money red-text pr-2"></i> Giá rẻ
				</h4>
				<p class="text-muted mb-md-0">
				  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
			  </div>
			</div>
		  </section><!--end row-->
		</div> <!--end container-->

		<div class="container-fluid" style="background-color: #f7f7c9"> 
		  <div class="container py-5 z-depth-1"> 
			<!--Section: Content-->
			<section class="px-md-1 mx-md-1 light-grey-text text-center text-lg-left">
			  <!--Grid row-->
			  <div class="row">
				<!--Grid column-->
				<div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
				  <img src="{{ asset('image/01072020_display-pic.jpg') }}" width="400px" alt="mota">
				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-6 mb-4 mb-lg-0">
				  <h3 class="font-weight-bold">Gọi ngay cho chúng tôi</h3>
				  <p class="font-weight-bold">Bạn sẽ thấy kì diệu</p>
				  <p class="text-black-50">Nếu bạn cảm thấy thích thì hãy đặt ngay một phòng cho riêng mình, nếu bạn vẫn chưa ưng ý thì có thể liên hệ hoặc xem thêm các phòng khác.</p>
				  <a class="btn btn-primary" href="{{ route('rooms.all') }}" >Xem phòng<i class="fa fa-angle-right ml-2"></i></a>
				</div>
				<!--Grid column-->
			  </div>
			  <!--Grid row-->
			</section>
			<!--Section: Content-->


		  </div>
		</div> <!--xem phòng-->	

	</div>


@endsection