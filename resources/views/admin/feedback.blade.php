@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Phản hồi của khách hàng</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Danh sách</h5>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-head-fixed">
								<thead>
									<tr>
										<th width="10%">Họ tên</th>
										<th width="10%">Email</th>
										<th>Tiêu dề</th>
										<th>Nội dung</th>
										<th width="10%">Thời gian</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($feedbacks as $f)                  
									<tr @if($f->status == 0) class="font-weight-bold" @endif>
										<td>{{ $f->name }}</td>
										<td>{{ $f->email }}</td>
										<td>
											{{ $f->subject }}
										</td>
										<td>{{ $f->content }}</td>
										<td>{{ date("d-m-Y", strtotime($f->created_at)) }}</td>
										<td>
											<a href="mailto:{{ $f->email }}?subject=Re: {{ $f->subject }}" class="feedback" id="{{ $f->id }}">
												<span class="badge badge-info">Phản hồi</span>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<label id="aaa"></label>
						</div>
					</div>
					<div class="callout callout-danger">
						<h5>Xóa phản hồi!</h5>

						<p>Hành động này sẽ xóa hết tất cả dữ liệu của khách hàng phản hồi trong hệ thống. Hành động này không thể hoàn tác, bạn hãy thật chắc chắn trước khi xóa</p>
						<form action="{{ route('admin.feedback.truncate') }}" method="post" accept-charset="utf-8">
							@csrf
							<input type="submit" name="truncateFeedback" value="Xóa tất cả phản hồi" class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chưa?') ">
						</form>
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
<script>
    $(document).ready(function(){
        $(".feedback").click(function(){
            var id = $(this).attr("id");
            $.ajax({
                url:"{{ route('admin.feedback.update') }}", 
                method:"GET", // phương thức gửi dữ liệu.
                data:{
                    id
                },
                //dataType: "json",
                success:function(data){ //dữ liệu nhận về 
                	//$('#aaa').html(data);
                    window.location.reload();
                    //window.location.href = data
                },
                error: function(req, err){ console.log('my message' + err); }
            });
        });
    });
</script>
@endsection