@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đơn / Đơn yêu cầu</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="callout callout-info">
						<h5 class="text-info"><i class="fas fa-info-circle"></i>&nbsp Giới thiệu</h5>
						<p>Hiển thị danh sách các đơn yêu cầu từ phía khách hàng.</p> 
						<p>Muốn chuyển sang trạng thái 'ĐÃ CHẤP NHẬN', bạn chỉ cần nhấn vào nút màu đỏ, và xác nhận.</p>
						<p>Những đơn ở trạng thái 'ĐÃ CHẤP NHẬN' thì không thể chuyển về 'CHỜ CHẤP NHẬN'.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-9">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<div class="row">
								<div class="col-xl-8 col-md-6 col-12">
									<h5 class="m-0 float-left py-2">Danh sách đơn yêu cầu từ khách hàng
										<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
										</button>
									</h5>
								</div>
								<div class="col-xl-4 col-md-6 col-12">
									<form action="{{ route('request.index') }}" method="get" accept-charset="utf-8" class="form-inline float-right">
										<select name="slStatus" class="custom-select mr-2">
											<option value="0">Tất cả</option>
											<option value="1">Chưa chấp nhận</option>
											<option value="2">Đã chấp nhận</option>
										</select>
										<input type="submit" name="" value="Lọc" class="btn btn-primary" >
									</form>	
								</div>	
							</div>
						</div>
						<div class="card-body p-2">
							<table class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Mã khách hàng</th>
										<th>Mã phòng</th>
										<th>Loại</th>
										<th>Thời gian</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									@forelse($requests as $req)
									<tr class="align">
										<td class="align-middle">
											#{{ $req->id }}
										</td>
										<td class="align-middle">
											{{ $req->user->name }}
										</td>
										<td class="align-middle">
											{{ $req->room_id }}
										</td>
										<td class="align-middle">
											{{ $req->type }}
										</td>
										<td class="align-middle">
											{{ date('d-m-Y H:i:s',strtotime($req->created_at)) }}
										</td>
										<td>
												<a href="{{ route('request.show', $req->id) }}" class="btn btn-outline-secondary mr-2 float-left">Xem</a>
												@if($req->status == 1)
												<form action="{{ route('request.update', $req->id) }}" method="post">
													@csrf
													<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ CHẤP NHẬN')">Chờ chấp nhận</button>
												</form>
												@else
												<button type="button" class="btn btn-success" disabled="">&nbsp&nbsp&nbspĐã chấp nhận</button>
												@endif		
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="5" class="text-center">Ohhhh! Không có đơn yêu cầu nào cả.</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl-3">
					<div class="card card-info card-outline">
						<div class="card-header">
							<h5 class="m-0 text-info">Loại đơn</h5>
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">
								<a href="{{ route('booking.index') }}" class="list-group-item list-group-item-action">Đơn đặt phòng</a>
								<a href="{{ route('cancel.index') }}" class="list-group-item list-group-item-action">Đơn hủy phòng</a>
								<a href="{{ route('request.index') }}" class="list-group-item list-group-item-action list-group-item-info">Đơn yêu cầu khác</a>
							</ul>
						</div>
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