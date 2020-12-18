@extends('layouts.client')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Sửa thông tin cá nhân</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<form action="{{ route('client.information.update', $user->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				@csrf
				<div class="row">

					<div class="col-lg-8">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h5 class="m-0">Thông tin chung</h5>
							</div>
							<div class="card-body">
								<div class="row mb-4">
									<div class="col-6">
										<label>Họ tên</label>
										<input type="text" name="name" value="{{ $user->name }}" class="form-control">
									</div>
									<div class="col-3">
										<label>Giới tính</label>
										<select name="gender" class="form-control">
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
									<div class="col-3">
										<label>Ngày sinh</label>
										<input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-6">
										<label>Email</label>
										<input type="email" name="email" value="{{ $user->email }}" class="form-control">
									</div>
									<div class="col-3">
										<label>Số điện thoại</label>
										<input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
									</div>
									<div class="col-3">
										<label>Nơi sinh</label>
										<input type="text" name="place_of_birth" value="{{ $user->place_of_birth }}" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-3">
										<label>CMND</label>
										<input type="text" name="identity_card_number" value="{{ $user->identity_card_number }}" class="form-control">
									</div>
									<div class="col-3">
										<label>Ngày cấp</label>
										<input type="date" name="issued_on" value="{{ $user->issued_on }}" class="form-control">
									</div>
									<div class="col-3">
										<label>Nơi cấp</label>
										<select name="issued_at" class="form-control">
											@foreach($provinces as $issuedAt)
												<option value="{{ $issuedAt->id }}"
													@if($issuedAt->id == $user->issued_at)
														selected="" 
													@endif>{{ $issuedAt->name }}</option>
											@endforeach	
										</select>
										
									</div>
									<div class="col-3">
										<label>Quốc tịch</label>
										<select name="nationality_id" class="form-control">
											<option value="0">- Chọn quốc tịch -</option>
											@foreach($nationalities as $nation)
												<option value="{{ $nation->id }}"
													@if($nation->id == $user->nationality_id)
														selected="" 
													@endif>{{ $nation->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-3">
										<label>Dân tộc</label>
										<select name="nation_id" class="form-control">
											<option value="0">- Chọn dân tộc -</option>
											@foreach($nations as $nation)
												<option value="{{ $nation->id }}"
													@if($nation->id == $user->nation_id)
														selected="" 
													@endif
													>{{ $nation->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-3">
										<label>Tôn giáo</label>
										<select name="religious_id" class="form-control">
											<option value="0">- Chọn tôn giáo -</option>
											@foreach($religiouses as $nation)
												<option value="{{ $nation->id }}"
													@if($nation->id == $user->religious_id)
														selected="" 
													@endif>{{ $nation->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col">
										<label>Username</label>
										<input type="text" name="username" value="{{ $user->username }}" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="card card-warning card-outline">
							<div class="card-header">
								<h5 class="m-0">Địa chỉ</h5>
							</div>
							<div class="card-body">
								<div class="row mb-4">
									<div class="col-6">
										<label>Tỉnh thành</label>
										<select name="province_id" id="province_id" class="form-control">
											@foreach($provinces as $province)
											<option value="{{ $province->id }}">{{ $province->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-3">
										<label>Quận huyện</label>
										<select name="district_id" id="district_id" class="form-control">
											{{-- option quan huyen --}}
										</select>
									</div>
									<div class="col-3">
										<label>Phường xã</label>
										<select name="ward_id" id="ward_id" class="form-control">
											{{-- option phuong xa --}}
										</select>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-12">
										<label>Địa chỉ</label>
										<input class="form-control" type="text" name="address" value="{{ $user->address }}">									
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.col-md-6 -->
					<div class="col-lg">
						<div class="card card-danger card-outline">
							<div class="card-header">
								<h5 class="m-0">Hành động</h5>
							</div>
							<div class="card-body">
								<div class="card-text">
									<input type="submit" name="editInfor" value="Sửa thông tin" class="btn btn-primary btn-block">
									<input type="submit" name="cancel" value="Hủy" class="btn btn-outline-secondary btn-block">
								</div>
							</div>
						</div>
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h5 class="m-0">Ảnh đại diện</h5>
							</div>
							<div class="card-body">
								<div class="card-text">
									<div class="image-upload">
										<label for="file-input">
											<img src="
											@if(strstr($user->avatar,'http'))
											{{ $user->avatar }}
											@else
											{{ asset('upload/avatar/'.$user->avatar) }}
											@endif
											" width="100%" />
										</label>
										<input style="display: none" id="file-input" name="avatar" type="file" />
										<input type="hidden" name="oldAvatar" value="{{ $user->avatar }}">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.col-md-6 -->

				</div>
				<!-- /.row -->
			</form>  
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function(){
        $("#province_id").change(function(){
            var province = $(this).val();
            var _token = $('input[name="_token"]').val();
            //alert(province);
            $.ajax({
                url:"{{ route('province') }}", 
                method:"POST", // phương thức gửi dữ liệu.
                dataType: 'json',
			    cache: false,
                data:{
                    province:province,
                     _token:_token
                },
                success:function(obj){ //dữ liệu nhận về 
                	var listItems = '<option selected="selected" value="0">- Chọn Quận/Huyện -</option>';

                    obj.forEach(function(obj) { 
                    	listItems += "<option value='" + obj.id + "'>" + obj.prefix + " " +obj.name + "</option>";
                    });
                    $("#district_id").html(listItems);
                },
                error: function(req, err){ console.log('my message ' + err); }

            });
        });

        $("#district_id").change(function(){
            var district = $(this).val();
            var _token = $('input[name="_token"]').val();
            //alert(district);
            $.ajax({
                url:"{{ route('district') }}", 
                method:"POST", // phương thức gửi dữ liệu.
                dataType: 'json',
			    cache: false,
                data:{
                    district:district,
                     _token:_token
                },
                success:function(obj){ //dữ liệu nhận về 
                	var listItems = '<option selected="selected" value="0">- Chọn Phường/Xã -</option>';

                    obj.forEach(function(obj) { 
                    	listItems += "<option value='" + obj.id + "'>" + obj.prefix + " " +obj.name + "</option>";
                    });
                    $("#ward_id").html(listItems);
                },
                error: function(req, err){ console.log('my message ' + err); }
            });
        });
    });
</script>
@endsection