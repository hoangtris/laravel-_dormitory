@extends('master')

@section('content')

	<div class="row container-fluid my-5">
		<div class="col-4"></div>
		<div class="col-4">
            {{-- Câu thông báo đăng kí thành công --}}
            @if (Session::has('flash_message'))
              <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif

            @if(!Auth::check())
			<p class="h1 text-center text-primary text-uppercase mb-4">Đăng nhập</p>
			<form action="login" method="post" accept-charset="utf-8">
				@csrf
                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

                <input type="password" class="form-control mb-4" placeholder="Mật khẩu" name="password">

                <input type="hidden" name="url_ref" value="{{ url()->previous() }}">
                
                <small id="#" class="form-text text-muted mb-4">
                Quên mật khẩu? <a href="#">Yêu cầu khôi phục mật khẩu</a>
                </small>

                <button class="btn btn-outline-primary my-4 btn-block" name="btn_DangNhap" type="submit">Đăng nhập</button>
                
                <small id="#" class="form-text text-muted mb-4 text-center">
                Chưa có tài khoản, <a href="{{ route('register') }}">ấn vào đây để đăng kí</a>
                </small>
			</form>
            @else
                <p class="h1 text-center text-primary text-uppercase mb-4">Bạn đã đăng nhập</p>
                <p class="text-center">Vai trò của bạn là 
                    @can('Admin')
                        <label class="text-danger">Admin</label>
                    @elsecan('RoomManager')
                        <label class="text-danger">Quản lí phòng</label>
                    @elsecan('Cashier')
                        <label class="text-danger">Thu ngân</label>
                    @elsecan('Customer')
                        <label class="text-danger">Khách hàng</label>
                    @else
                        Chua phan quyen
                    @endcan
                </p>
            @endif
		</div>
		<div class="col-4"></div>
	</div>

@endsection