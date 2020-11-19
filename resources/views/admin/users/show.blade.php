@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý tài khoản 
						<a href="{{ route('users.index') }}"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="callout callout-info">
            	<h5 class="text-info">Tính năng này vẫn còn đang trong quá trình xây dựng</h5>
            	<p>Một vài chức năng sẽ bị vô hiệu quá do chưa hoàn thiện.</p>
            </div>
			<div class="row">
				<div class="col-xl-3 col-12">
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle"
								src="
								@if(strstr($user->avatar,'https'))
								{{ $user->avatar }}
								@else
								{{ asset('upload/avatar/'.$user->avatar) }}
								@endif
								"
								alt="User profile picture">
							</div>

							<h3 class="profile-username text-center">{{ $user->name }}</h3>

							<p class="text-muted text-center">
								@foreach($roles as $role)
								@if($role->id == $user->id_role)
								<p class="text-muted text-center">{{ $role->name }}</p>
								@endif
								@endforeach
							</p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Giới tính</b> <a class="float-right">{{ $user->gender }}</a>
								</li>
								<li class="list-group-item">
									<b>Ngày sinh</b> <a class="float-right">{{ date('d-m-Y',strtotime($user->date_of_birth)) }}</a>
								</li>
								<li class="list-group-item">
									<b>CMND</b> <a class="float-right">{{ $user->identity_card_number }}</a>
								</li>
								<li class="list-group-item">
									<b>Email</b> <a class="float-right">{{ $user->email }}</a>
								</li>
								<li class="list-group-item">
									<b>Điện thoại</b> <a class="float-right">{{ $user->phone }}</a>
								</li>
							</ul>

							<form action="{{ route('users.destroy', $user->id) }}" method="post" accept-charset="utf-8">
								@csrf
								<input type="submit" name="deleteUser" value="Xóa tài khoản" class="btn btn-outline-danger btn-block" onclick="return confirmDestroy()" disabled="">
							</form>
							
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl-9 col-12">
					<div class="card card-primary card-outline card-outline-tabs">
						<div class="card-header p-0 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#information" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Thông tin chung</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#address" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Địa chỉ</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#room" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Thông tin phòng</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#review" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Đánh giá</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#none" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Khác</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-four-tabContent">
								<div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
									<div class="row" style="line-height: 35px">
										<div class="col-xl-6">
											<b>Họ tên</b>
											<a class="float-right">
												{{ $user->name }}
											</a>
											<br>
											<b>Mã khách hàng</b>
											<a class="float-right">
												{{ $user->id }}
											</a>
											<br>
											<b>Giới tính</b>
											<a class="float-right">
												{{ $user->gender }}
											</a>
											<br>
											<b>Ngày sinh</b>
											<a class="float-right">
												{{ date('d-m-Y',strtotime($user->date_of_birth)) }}
											</a>
											<br>
											<b>Nơi sinh</b>
											<a class="float-right">
												{{ $user->place_of_birth }}
											</a>
											<br>
											<b>Username</b>
											<a class="float-right">
												{{ $user->username }}
											</a>
											<br>
										</div>
										<div class="col-xl-6">
											<b>CMND</b>
											<a class="float-right">
												{{ $user->identity_card_number }}
											</a>
											<br>
											<b>Ngày cấp</b>
											<a class="float-right">
												{{ date('d-m-Y',strtotime($user->issued_on)) }}
											</a>
											<br>
											<b>Nơi cấp</b>
											<a class="float-right">
												{{ $user->issued_at }}
											</a>
											<br>
											<b>Dân tộc</b>
											<a class="float-right">
												{{ $user->nation }}
											</a>
											<br>
											<b>Tôn giáo</b>
											<a class="float-right">
												{{ $user->religious }}
											</a>
											<br>
											<b>Quốc tịch</b>
											<a class="float-right">
												{{ $user->nationality }}
											</a>
											<br>
										</div>										
									</div>

								</div>
								<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
									<div class="row" style="line-height: 35px">
										<div class="col-xl-6">
											<b>Địa chỉ</b>
											<br>
											<a class="">
												{{ $user->address }}
											</a>
											<br>
											<b>Tỉnh thành</b>
											<a class="float-right">
												{{ $user->province }}
											</a>
											<br>
											<b>Quận huyện</b>
											<a class="float-right">
												{{ $user->district }}
											</a>
											<br>
											<b>Phường xã</b>
											<a class="float-right">
												{{ $user->ward }}
											</a>
											<br>
										</div>									
									</div>
								</div>
								<div class="tab-pane fade" id="room" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<div class="row">
										<div class="col-xl-12">
											Phong
										</div>	
									</div>
								</div>
								<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<div class="row">
										<div class="col-xl-12">
											Danh gia
										</div>	
									</div>
								</div>
								<div class="tab-pane fade" id="none" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<div class="row">
										<div class="col-xl-12">
											<b>Ngày tạo</b>
											<a class="float-right">
												{{ $user->created_at }}
											</a>
											<br>
											<b>Ngày kích hoạt tài khoản</b>
											<a class="float-right">
												{{ $user->email_verified_at }}
											</a>
											<br>
										</div>	
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection