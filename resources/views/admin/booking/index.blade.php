@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đơn / Đơn đặt phòng</h1>
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
						<p>Hiển thị danh sách các đơn đặt phòng từ phía khách hàng.</p> 
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
									<h5 class="m-0 float-left py-2">Danh sách đơn đặt phòng</h5>
								</div>
								<div class="col-xl-4 col-md-6 col-12">
									<form action="{{ route('booking.index') }}" method="get" accept-charset="utf-8" class="form-inline float-right">
										<select name="slStatus" class="custom-select mr-2">
											<option value="0">Tất cả</option>
											<option value="1">Chưa chấp nhận</option>
											<option value="2">Đã chấp nhận</option>
										</select>
										<input type="submit" name="" value="Lọc" class="btn btn-outline-primary" >
									</form>								
								</div>	
							</div>
							

						</div>
						<div class="card-body p-2">
							<table class="table">
								<thead>
									<tr>
										<th>Mã phòng</th>
										<th>Mã khách hàng</th>
										<th>Ngày đặt</th>
										<th>Ngày dọn vào</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									@forelse($orderDetail as $od)
									<tr class="align">
										<td class="align-middle">
											<a href="{{ route('booking.show', $od->id) }}">#{{ $od->room_id }}</a>
										</td>
										<td class="align-middle">
											@foreach($orders as $o)
												@foreach($users as $user)
													@if($od->order_id == $o->id && $o->user_id == $user->id)
													#{{ $user->id }} - {{ $user->name }}
													@endif
												@endforeach
											@endforeach
										</td>
										<td class="align-middle">
											@foreach($orders as $o)
												@if($od->order_id == $o->id)
													{{ date('d-m-Y H:i:s',strtotime($o->created_at)) }}
												@endif
											@endforeach
										</td>
										<td class="align-middle">
											{{ date('d-m-Y',strtotime($od->date_move_in)) }}
										</td>
										<td>
											@if($od->status == 1)
												@if($od->order->status == 1)
													<button class="btn btn-block btn-warning">Chưa thanh toán</button>
												@else
												<form action="{{ route('booking.update', $od->id) }}" method="post" accept-charset="utf-8">
													@csrf
													<button type="" class="btn btn-block btn-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ CHẤP NHẬN')">Chờ chấp nhận</button>
												</form>
												@endif
											@else
												<button type="button" class="btn btn-block btn-success" disabled="">Đã chấp nhận</button>
											@endif
										</td>
									</tr>
									@empty
										<tr>
											<td colspan="5" class="text-center">Ohhhh! Không có đơn đặt phòng nào cả.</td>
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
								<a href="{{ route('booking.index') }}" class="list-group-item list-group-item-action list-group-item-info">Đơn đặt phòng</a>
								<a href="{{ route('cancel.index') }}" class="list-group-item list-group-item-action">Đơn hủy phòng</a>
								<a href="{{ route('request.index') }}" class="list-group-item list-group-item-action">Đơn yêu cầu khác</a>
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