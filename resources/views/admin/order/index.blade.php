@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đơn / Hoá đơn</h1>
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
						<p>Danh sách tổng hợp hóa đơn của khách hàng</p>
						<p>Hóa đơn quá hạn 3 ngày chưa thanh toán có thể xóa được</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="card card-danger card-outline">
						<div class="card-header">
							<h5 class="card-title">Danh hóa hóa đơn chưa thanh toán</h5>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body p-2 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mã hóa đơn</th>
										<th>Mã khách hàng</th>
										<th>Tổng tiền</th>
										<th>Thời gian</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									@forelse($order as $od)
									@if($od->status == 1)
									<tr class="align">
										<td class="align-middle">
											{{ $od->id }}
										</td>
										<td class="align-middle">
											{{ $od->user->id }} - {{ $od->user->name }}
										</td>
										<td class="align-middle">
											{{ number_format($od->total) }}
										</td>
										<td class="align-middle">
											{{ date('d-m-Y H:i:s',strtotime($od->created_at)) }}
										</td>
										<td>
											<a href="{{ route('order.show', $od->id) }}" class="btn btn-outline-secondary float-left mr-1">Xem</a>
											@if($od->status == 1)
												@if( (strtotime("now") - strtotime($od->created_at))/86400 > 3 )
												<form action="{{ route('order.destroy', $od->id) }}" method="post" class="form-inline">
													@csrf
													<input type="submit" class="btn btn-warning" value="Xóa" onclick="return confirmDestroy()">
												</form>
												@endif
											@endif
										</td>
									</tr>
									@endif
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
				<div class="col-xl-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="card-title py-2">Danh hóa đơn đã thanh toán</h5>
						</div>
						<div class="card-body p-2 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mã hóa đơn</th>
										<th>Mã khách hàng</th>
										<th>Tổng tiền</th>
										<th>Thời gian</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									@forelse($order as $od)
									@if($od->status !=1)
									<tr class="align">
										<td class="align-middle">
											{{ $od->id }}
										</td>
										<td class="align-middle">
											{{ $od->user->id }} - {{ $od->user->name }}
										</td>
										<td class="align-middle">
											{{ number_format($od->total) }}
										</td>
										<td class="align-middle">
											{{ date('d-m-Y H:i:s',strtotime($od->created_at)) }}
										</td>
										<td>
											<a href="{{ route('order.show', $od->id) }}" class="badge badge-secondary">Xem</a>
											@if($od->status == 2)
											<span class="badge badge-success">Đã thanh toán</span>
											@else
											<span class="badge badge-info">Đã thanh toán qua NL</span>
											@endif
										</td>
									</tr>
									@endif
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
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection