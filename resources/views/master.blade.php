<!DOCTYPE html>
<html lang="en">
<head>	
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KTX Hoàng Trí</title>

  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  	<!-- Popper JS -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  	<!-- Font awesome --> 
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- CSS custom --}}
    <link href="{{ asset('css/css_custom.css') }}" rel="stylesheet" type="text/css" />
  
</head>
<body>

  <nav class="navbar navbar-expand-sm navbar-dark" style="background: #2A4B7C ;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style="font-size:25px" href="{{ route('index') }}">KÍ TÚC XÁ CAPTAIN HOÀNG TRÍ</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
          <li class="active nav-item"><a href="{{ route('index') }}" class="nav-link">Trang chủ</a></li>
          <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">Giới thiệu</a></li>
          <li class="dropdown nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Tài khoản</a>
            <ul class="dropdown-menu text-center">      
                @if(Auth::check())
                  <li class="dropdown-item disabled">Xin chào {{ Auth::user()->name }} </li>
                  <li><a href="{{ route('client.dashboard') }}" class="dropdown-item">Trang cá nhân</a></li>
                  <li><a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a></li>
                @else
                  <li><a href="{{ route('register') }}" class="dropdown-item">Đăng kí</a></li>
                  <li><a href="{{ route('login') }}" class="dropdown-item">Đăng nhập</a></li>
                @endif
            </ul>
          </li>        
          <li class="nav-item"><a href="{{ route('term') }}" class="nav-link">Điều khoản - Dịch vụ</a></li>
          <li class="nav-item" style="margin-right:10px;"><a href="{{ route('contact') }}" class="nav-link">Liên hệ</a></li>
          <a href="{{ route('rooms.all') }}" class="btn btn-success">ĐĂNG KÍ PHÒNG</a>
      </ul>
   </div>
  </nav> {{-- navbar --}}

	<div class="container-fluid">
		<div class="row bg-dark">
			<div class="col-12 text-white h5 p-2 text-center">
				TRANG WEB CHỈ PHỤC VỤ NHU CẦU HỌC TẬP.
			</div>
		</div>	
	</div> {{-- Thông báo của website --}}

  @if(session()->get('flag'))
    <div class="alert alert-{{ session()->get('flag') }} text-center">
        {{ session()->get('message') }}
    </div>
  @endif {{-- Thông báo của website 2 --}}

  @yield('content')

  <!-- Footer -->
  <footer class="py-5" style="background: #2A4B7C ;">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-7 ml-5">
          <h4 class="text-white">Bản đồ trụ sở chính</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8754.56486912465!2d106.68247415210037!3d10.828686347278618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1593444051491!5m2!1svi!2s" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>


        <div class="col text-white ml-5">
          <h4>Thông tin liên hệ</h5>
            <div class="row m-3">
              <div class="col-2" style="text-align: center">
                <i class="fa fa-phone" style="font-size:24px;" aria-hidden="true"></i>
              </div>
              <div>
                <a href="tel:0868509849"><h4 class="text-white">0868-509-xxx</h4></a>
              </div>
            </div>
            <div class="row m-3">
              <div class="col-2" style="text-align: center">
                <i class="fa fa-comments-o" style="font-size:24px;" aria-hidden="true"></i>
              </div>
              <div>
                <a href="http://zalo.me/0868509849"><h4 class="text-white">Chat qua Zalo</h4></a>
              </div>
            </div>
            <div class="row m-3">
              <div class="col-2" style="text-align: center">
                <i class="fa fa-envelope" style="font-size:24px;" aria-hidden="true"></i>
              </div>
              <div>
                <a href="mailto:hoangtri.ngo.117@gmail.com"><h4 class="text-white">hoangtri.ngo.117@gmail.com</h4></a>
              </div>
            </div>
            <div class="row m-3">
              <div class="col-2" style="text-align: center">
                <i class="fa fa-map-marker" style="font-size:24px;" aria-hidden="true"></i>
              </div>
              <div>
                <a href="javascript:alert('Vui lòng xem bản đồ bên tay trái.');"><h4 class="text-white">Trường ĐH Công Nghiệp TP.HCM</h4></a>
              </div>
              
            </div>
        </div>
      </div>
      <h4 class="mt-5 text-center text-white">Copyright &copy; 2020 - Kí túc xá Captain Hoàng Trí</h4>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v9.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
    attribution=setup_tool
    page_id="110223287416081"
    theme_color="#6699cc"
    logged_in_greeting="Chào! Làm thế nào chúng tôi có thể giúp bạn?"
    logged_out_greeting="Chào! Làm thế nào chúng tôi có thể giúp bạn?">
  </div>
  
</body>
</html>
	