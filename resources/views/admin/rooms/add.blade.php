@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý phòng / Thêm phòng
						<a href="{{ route('rooms.index') }}"><button type="button" class="btn btn-outline-info ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</button></a></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<form action="{{ route('rooms.store') }}" method="post" enctype='multipart/form-data'> 
				<div class="row">
					@csrf
					<!-- /.col-md-6 -->
					<div class="col-lg-8">
						<div class="card card-outline card-info">
							<div class="card-header">
								<h3 class="card-title">Thông tin chung</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="row mb-3">
									<div class="col-lg-3 mb-4">
										<label for="">Sức chứa</label>
										<input type="number" class="form-control" name="capacity">
									</div>
									<div class="col-lg-3 mb-4">
										<label for="">Giá phòng</label>
										<input type="text" class="form-control" name="price">
									</div>
									<div class="col-lg-3 mb-4">
										<label for="">Thời hạn</label>
										<input type="number" class="form-control" name="duration" placeholder="30">
									</div>
									<div class="col-lg-3 mb-4">
										<label for="">Tình trạng</label>
										<select name="status" class="form-control">
											<option value="0">Ẩn</option>
											<option value="1">Hiện</option>
											<option value="2">Đầy</option>
										</select>
									</div>
									<div class="col-lg-12 mb-4">
										<label for="">Mô tả ngắn</label>
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="short_description"></textarea>
									</div>
									<div class="col-lg-12 mb-4">
										<label for="">Mô tả dài</label>
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="long_description"></textarea>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card card-outline card-dark collapsed-card">
							<div class="card-header">
								<h3 class="card-title">Ghi chú</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="col-lg-12 mb-4">
									<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="note"></textarea>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>

					<div class="col-lg">
						<div class="card card-outline card-warning">
							<div class="card-header">
								<h3 class="card-title">Hành động</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<input type="submit" name="addRoomTemp" value="Lưu bản nháp" class="btn btn-outline-secondary">
								<input type="submit" name="addRoom" value="Thêm phòng" class="btn btn-primary float-right">
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card card-outline card-success">
							<div class="card-header">
								<h3 class="card-title">Loại phòng</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<select name="id_type" class="form-control">
									@foreach($types as $type)
										<option value="{{ $type->id }}">{{ $type->name }}</option>
									@endforeach
								</select>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card card-outline card-primary">
							<div class="card-header">
								<h3 class="card-title">Khu vực</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<select name="id_area" class="form-control">
									@foreach($areas as $type)
										<option value="{{ $type->id }}">{{ $type->name }}</option>
									@endforeach
								</select>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card card-outline card-danger">
							<div class="card-header">
								<h3 class="card-title">Hình ảnh</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<input type="file" name="image">
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</form>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection