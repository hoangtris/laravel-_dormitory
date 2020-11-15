	@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đánh giá</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-8 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0">Danh sách đánh giá</h5>
						</div>
						<div class="px-2">
							<table class="table header table-hover table-responsive-xl table-head-fixed text-nowrap">
								<thead>
									<tr>
										<th>#</th>
										<th>Người đánh giá</th>
										<th>Mã phòng</th>
										<th>Nội dung</th>
										<th>Thời gian</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($reviews as $review)
									<tr>
										<td>{{ $review->id }}</td>
										<td>
											@foreach($users as $user)
												@if($user->id == $review->user_id)
													#{{ $user->id }} - {{ $user->name }}
												@endif
											@endforeach
										</td>
										<td><a href="{{ route('rooms.detail', $review->room_id) }}">{{ $review->room_id }}</a></td>
										<td>{{ $review->content }}</td>
										<td>{{ date('d-m-Y H:i:s',strtotime($review->created_at)) }}</td>
										<td>
											<a onclick="return confirm('Bạn chắc chưa?')" href="{{ route('admin.review.destroy', $review->id) }}"><span class="badge badge-danger">Xoa</span></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $reviews->links() }}
						</div>
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl-4 col-12">
					<div class="card card-outline card-warning">
						<div class="card-header">
							<h3 class="card-title">Mô tả</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							Losjsjsjjsjs
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
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