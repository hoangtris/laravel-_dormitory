@extends('master')

@section('content')

<div class="container mt-5">


	<!--Section: Content-->
	<section class="dark-grey-text mb-5">

		<style>
			.map-container-section {
				overflow:hidden;
				padding-bottom:56.25%;
				position:relative;
				height:0;
			}
			.map-container-section iframe {
				left:0;
				top:0;
				height:100%;
				width:100%;
				position:absolute;
			}
		</style>

		<!-- Section heading -->
		<h3 class="font-weight-bold text-center mb-4">Liên hệ với chúng tôi</h3>
		<!-- Section description -->
		<p class="text-center w-responsive mx-auto pb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
		eum porro a pariatur veniam.</p>

		<!-- Grid row -->
		<div class="row">

			<!-- Grid column -->
			<div class="col-lg-5 mb-lg-0 pb-lg-3 mb-4">

				<!-- Form with header -->
				<div class="card">
					<div class="card-body">
						<form action="{{ route('contact.store') }}" method="post" accept-charset="utf-8">
							@csrf
							<!-- Header -->
							<div class="form-header accent-1">
								<h3 class="mt-2"><i class="fa fa-envelope"></i> Để lại lời nhắn:</h3>
							</div>
							<p class="dark-grey-text">Chúng tôi sẵn sàng và tiếp nhận lời nhắn từ bạn.</p>
							<!-- Body -->
							<div class="md-form mb-3">
								<i class="fa fa-user prefix grey-text"></i> <label for="form-name">Họ tên</label>
								<input type="text" id="form-name" class="form-control" name="name" required>
							</div>
							<div class="md-form mb-3">
								<i class="fa fa-envelope prefix grey-text"></i> <label for="form-email">Email</label>
								<input type="email" id="form-email" class="form-control" name="email" required>
							</div>
							<div class="md-form mb-3">
								<i class="fa fa-tag prefix grey-text"></i> <label for="form-Subject">Tiêu đề</label>
								<input type="text" id="form-Subject" class="form-control" name="subject" required>
							</div>
							<div class="md-form mb-3">
								<i class="fa fa-pencil prefix grey-text"></i> <label for="form-text">Nội dung phản hồi</label>
								<textarea id="form-text" class="form-control md-textarea" rows="5" name="content" required></textarea>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-outline-primary btn-block">Gửi</button>
							</div>
						</form>
					</div>
				</div>
				<!-- Form with header -->

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-lg-7">

				<!--Google map-->
				<div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8754.56486912465!2d106.68247415210037!3d10.828686347278618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1593444051491!5m2!1svi!2s" frameborder="0"
					style="border:0" allowfullscreen></iframe>
				</div>
				<!-- Buttons-->
				<div class="row text-center">
					<div class="col-md-4">
						<a class="btn-floating blue accent-1">
							<i class="fa fa-map-marker"></i>
						</a>
						<p>Trường ĐH Công Nghiệp</p>
						<p class="mb-md-0">Tp. Hồ Chí Minh</p>
					</div>
					<div class="col-md-4">
						<a class="btn-floating blue accent-1">
							<i class="fa fa-phone"></i>
						</a>
						<p><a class="text-dark" href="tel:0327330377">0xxxx-HOÀNG</a></p>
						<p><a class="text-dark" href="tel:0868509849">0xxx-xxx-TRÍ</a></p>
						<p class="mb-md-0">T2 - T6, 7:00-17:00</p>
					</div>
					<div class="col-md-4">
						<a class="btn-floating blue accent-1">
							<i class="fa fa-envelope"></i>
						</a>
						<p>
							<a class="text-dark" href="mailto:lvh10102000@gmail.com">lvh10102000@gmail.com</a>
						</p>
						<p>
							<a class="text-dark" href="mailto:hoangtri.ngo.117@gmail.com">hoangtri.ngo.117@gmail.com</a>
						</p>
					</div>
				</div>

			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

	</section>
	<!--Section: Content-->


</div>

@endsection