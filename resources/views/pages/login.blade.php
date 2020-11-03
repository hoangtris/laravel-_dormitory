@extends('master')

@section('content')

	<div class="row container-fluid my-5">
		<div class="col-4"></div>
		<div class="col-4">
                    @can('Admin')
                        <div class="btn btn-success btn-lg">
                          You have Admin Access
                        </div>
                    @elsecan('QuanLiPhong')
                        <div class="btn btn-info btn-lg">
                          You have QuanLi Access
                        </div>
                    @elsecan('ThuNgab')
                        <div class="btn btn-info btn-lg">
                          You have ThuNgan Access
                        </div>
                    @elsecan('KhachHang')
                        <div class="btn btn-info btn-lg">
                          You have User Access
                        </div>
                    @else
                        Chua dang nhap
                    @endcan
            {{-- Câu thông báo đăng kí thành công --}}
            @if (Session::has('flash_message'))
              <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif

            {{-- Câu thông báo đăng nhập thành công/thất bại --}}
			@if(session()->get('flag'))
				<div class="alert alert-{{ session()->get('flag') }}">
                    {{ session()->get('message') }}
                </div>
			@endif

			<p class="h1 text-center text-primary text-uppercase mb-4">Đăng nhập</p>
			<form action="login" method="post" accept-charset="utf-8">
				@csrf
                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

                <input type="password" class="form-control mb-4" placeholder="Mật khẩu" name="password">
                
                <small id="#" class="form-text text-muted mb-4">
                Quên mật khẩu? <a href="#">Yêu cầu khôi phục mật khẩu</a>
                </small>

                <button class="btn btn-outline-primary my-4 btn-block" name="btn_DangNhap" type="submit">Đăng nhập</button>
                
                <small id="#" class="form-text text-muted mb-4 text-center">
                Chưa có tài khoản, <a href="{{ route('register') }}">ấn vào đây để đăng kí</a>
                </small>
			</form>
		</div>
		<div class="col-4"></div>
	</div>

@endsection