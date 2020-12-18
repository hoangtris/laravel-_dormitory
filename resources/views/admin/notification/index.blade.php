@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Danh sách thông báo</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-4 col-lg-6 col-sm-12 col-12">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Đơn đặt phòng</h5>
							<p class="card-text p-0">
								<ul class="list-group list-group-flush">
									@foreach($notifyBooking as $n)
										<a id="{{ $n->id }}" class="text-dark notify" href="#">
											<li class="list-group-item
											@if($n->status != 1)
												text-secondary
											@endif">
												<b>{{ $n->user->name }}</b> vừa {{ strtolower($n->content) }}
											</li>
										</a>
									@endforeach
								</ul>
							</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Đơn trả phòng sớm</h5>

							<p class="card-text">
								<ul class="list-group list-group-flush">
									@foreach($notifyCancel as $n)
										<a id="{{ $n->id }}" class="text-dark notify" href="#">
											<li class="list-group-item
											@if($n->status != 1)
												text-secondary
											@endif">
												<b>{{ $n->user->name }}</b> vừa {{ strtolower($n->content) }}
											</li>
										</a>
									@endforeach
								</ul>
							</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Đơn yêu cầu</h5>

							<p class="card-text">
								<ul class="list-group list-group-flush">
									@foreach($notifyRequest as $n)
										<a id="{{ $n->id }}" class="text-dark notify" href="#">
											<li class="list-group-item
											@if($n->status != 1)
												text-secondary
											@endif">
												<b>{{ $n->user->name }}</b> vừa {{ strtolower($n->content) }}
											</li>
										</a>
									@endforeach
								</ul>
							</p>
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
<script>
    $(document).ready(function(){
        $(".notify").click(function(){
            var idNotify = $(this).attr("id");
            //alert(idNotify);
            $.ajax({
                url:"{{ route('admin.notification.update') }}", 
                method:"GET", // phương thức gửi dữ liệu.
                data:{
                    idNotify:idNotify
                },
                //dataType: "json",
                success:function(data){ //dữ liệu nhận về 
                	//$('#haha').html(data.content);
                    //window.location.reload();
                    window.location.href = data
                }
            });
        });
    });
</script>
@endsection