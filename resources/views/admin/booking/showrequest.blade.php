@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1 class="m-0 text-dark">Chi tiết đơn yêu cầu #{{ $request->id }}
						<a href="{{ route('request.index') }}"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a>
					</h1>
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
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Nội dung</h3>

							<div class="card-tools">
								Ngày giờ: {{ date("d-m-Y H:i:s", strtotime($request->created_at)) }}
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-3 col-3 font-weight-bold">
									<p>Trạng thái</p>	
									<p>Mã khách hàng</p>		
									<p>Mã phòng</p>	
									<p>Loại đơn</p>
									<p>Nội dung</p>				

								</div>
								<div class="col-xl-9 col-9">
										@if($request->status == 1)
										<form action="{{ route('request.update', $request->id) }}" method="post">
											@csrf
											<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ CHẤP NHẬN')">Chờ chấp nhận</button>
										</form>
										@else
										<button type="button" class="btn btn-success" disabled="">&nbsp&nbsp&nbspĐã chấp nhận</button>
										@endif	
									<p>#{{ $request->user->id }} - {{ $request->user->name }}</p>		
									<p><a href="{{ route('rooms.detail', $request->room_id) }}"><kbd>{{ $request->room_id }}</kbd></a></p>	
									<p>{{ $request->type }}</p>		
									<p class="text-justify">{!! $request->content !!}</p>	

								</div>
							</div>
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