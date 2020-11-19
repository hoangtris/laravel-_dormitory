@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý phòng</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- /.col-md- -->
				<div class="col-lg-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="card-title">Danh sách phòng
								&nbsp 
								<a href="{{ route('rooms.create') }}">
									<span class="badge badge-success">Thêm phòng</span>
								</a>
							</h5>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
						</div>

						<div class="card-body py-0 px-0">
							<table class="table table-hover table-head-fixed text-nowrap">
								<thead>
									<tr>
										<th>#</th>
										<th>ID</th>
										<th>Khu Vực</th>
										<th>Loại</th>
										<th>Sức chứa</th>
										<th>Giá</th>
										<th>Tình trạng</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($rooms as $room)
									<tr>
										<td width="50px"><img src="
											@if(strstr($room->image,'http'))
											{{ $room->image }}
											@else
											{{ asset('upload/room/'.$room->image) }}
											@endif
											" alt="" width="50px" height="50px">
										</td>
										<td>
											<a href="{{ route('rooms.edit', $room->id) }}">#{{ $room->id }}
											</a>
										</td>
										<td>
											@foreach($areas as $area)
											@if($area->id == $room->id_area)
											{{ $area->name }}
											@endif
											@endforeach
										</td>
										<td>
											@foreach($types as $area)
											@if($area->id == $room->id_type)
											{{ $area->name }}
											@endif
											@endforeach
										</td>
										<td>{{ $room->capacity }}</td>
										<td>{{ number_format($room->price) }} VND</td>
										<td class="text-left">
											@if($room->status == 0)
											<span class="badge badge-secondary">Ẩn</span>
											@elseif($room->status == 1)
											<span class="badge badge-success">Hiện</span>
											@else
											<span class="badge badge-warning">Phòng đầy</span>
											@endif
										</td>
										<td>
											<a href="{{ route('rooms.detail', $room->id) }}"><span class="badge badge-info">Xem</span></a>
											<a href="{{ route('rooms.edit', $room->id) }}"><span class="badge badge-danger">Sửa</span></a>
										</td>
									</tr>
									@endforeach
									</tbody>
							</table>
							{{ $rooms->links() }}
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