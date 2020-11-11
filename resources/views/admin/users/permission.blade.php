@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý tài khoản</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0">Danh sách tài khoản</h5>
						</div>
						<div class="px-2">
							<table class="table table-hover table-responsive-xl" >
								<thead>
										<th>#</th>
										<th>Username</th>
										<th>Email</th>
										<th>Tên quyền</th>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->username }}</td>
										<td>{{ $user->email }}</td>
										<td>
											@foreach($roles as $role)
												@if($role->id == $user->id_role)
													{{ $role->name }}
												@endif
											@endforeach
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $users->links() }}

						</div>
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-xl col-12">
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
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras finibus, turpis eget hendrerit semper, eros nunc gravida sapien, nec feugiat diam arcu eu massa.
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

					<div class="card card-outline card-success">
						<div class="card-header">
							<h3 class="card-title">Thêm quyền</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
							</div>
							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form action="" method="get" accept-charset="utf-8" class="px-2">
								<div class="row mb-4">
									<label for="">Tên vai trò</label>
									<input type="text" name="name" placeholder="Quản lý tài khoản" class="form-control">
								</div>
								<div class="row">
									<input type="submit" name="addPermission" class="btn btn-outline-success" value="Thêm vai trò">
								</div>
							</form>	
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