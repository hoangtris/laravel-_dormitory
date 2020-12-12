@extends('layouts.client')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-map-signs"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Phòng</span>
							<span class="info-box-number">
								@if($od == null)
								Trước đây bạn chưa đặt phòng nào cả
								@else
								@if($od->status == 1)
								{{ $od->room_id }}
								@elseif($od->status == 2)
								{{ $od->room_id }}
								@elseif($od->status == 3)
								{{ $od->room_id }}
								@else
								Bạn chưa có phòng
								@endif
								@endif
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Tổng tiền bạn đã chi tiêu</span>
							<span class="info-box-number">{{ number_format($total->total) }} VNĐ</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-bell"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Thông báo</span>
							<span class="info-box-number">{{ count($notify) }}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Đơn yêu cầu</span>
							<span class="info-box-number">{{ count($req) }}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@endsection