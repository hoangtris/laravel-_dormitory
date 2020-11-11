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
{{-- 				<div class="col-xl-3 col-md-4 col-sm-6 col-12">
					1
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 col-12">
					2
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 col-12">
					3
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 col-12">
					4
				</div> --}}

				<div class="col-xl-8 col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0">Danh sách tài khoản</h5>
						</div>
						<div class="px-2">
							<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Tên</th>
										<th>Email</th>
										<th>CMND</th>
										<th>Điện thoại</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>
											<img src="
											@if(strstr($user->avatar,'https'))
												{{ $user->avatar }}
											@else
												{{ asset('upload/avatar/'.$user->avatar) }}
											@endif
											" alt="" width="50px">
										</td>
										<td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->identity_card_number }}</td>
										<td>{{ $user->phone }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $users->links() }}

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
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras finibus, turpis eget hendrerit semper, eros nunc gravida sapien, nec feugiat diam arcu eu massa.
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