@extends('master')

@section('content')
<div class="container-fluid mb-4">
	<form action="{{ route('payment') }}" method="post" accept-charset="utf-8">
		@csrf
		<div class="text-center">
			{{-- Câu thông báo đăng kí phòng thành công --}}
		    @if (Session::has('flash_message'))
	          <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
	        @endif
	        <br>
			<p class=" col-12 h1 text-center text-primary text-uppercase mb-4 ml-2">Đơn xác nhận đặt phòng</p>
		</div>

		<div class="row">
			<div class="col-lg-8 col-sm-8">
				<div class="card mb-4" id="sectionInforRoom">
					<div class="card-header">
						<div class="row">
					    	<div class="col-7">
					    		<label>Sản phẩm</label>
					    	</div>
					    	<div class="col-3">
					    		<label>Thời hạn</label>
					    	</div>
				    	</div>
					</div>
					<div class="card-body">
				    	<div class="row">
					    	<div class="col-7">
					    		<input type="hidden" name="idRoom" value="{{ $room->id }}">
					    		<h5><a href="{{ route('rooms.detail', $room->id) }}">Phòng số #{{ $room->id }}</a></h5>
					    		<label>Giá: {{ number_format($room->price) }} VNĐ</label><br>
					    		<label>Khu vực: 
		        					@foreach($areas as $kv)
		        						@if($room->id_area == $kv->id)
		        							{{ $kv->name }}
		        						@endif
		        					@endforeach
					    		</label><br>	
					    		<label>Loại phòng:
		        					@foreach($typesRoom as $lp)
		        						@if($room->id_type == $lp->id)
		        							{{ $lp->name }}
		        						@endif
		        					@endforeach
					    		</label>
					    	</div>
					    	<div class="col-3">
					    		<select name="duration" id="duration" class="form-control" required>
					    			<option value="" selected disabled>Thời gian thuê</option>
					    			<option value="1">1 tháng</option>
					    			<option value="3">3 tháng</option>
					    			<option value="6">6 tháng</option>
					    			<option value="9">9 tháng</option>
					    			<option value="12">12 tháng</option>
					    		</select>
					    	</div>
				    	</div>
					</div>
				</div>

				<div class="card mb-4" id="sectionInforCus">
					<div class="card-header">
						Thông tin người đặt
					</div>

					<div class="card-body">
							<div class="form-row mb-4">
								<div class="col">
									<span>Họ tên</span>
									<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">						
								</div>
								
								<div class="col">
									<span>Giới tính</span>
									<select name="gender" class="form-control">
										<option value="Nam"
										@if(Auth::user()->gender == 'Nam')
											selected
										@endif
										>Nam</option>
										<option value="Nữ"
										@if(Auth::user()->gender == 'Nữ')
											selected
										@endif
										>Nữ</option>
									</select>					
								</div>
							</div>
							
							<div class="form-row mb-4">
								<div class="col">
									<span>Số điện thoại</span>
									<input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">						
								</div>
								
								<div class="col">
									<span>CMND</span>
									<input type="text" class="form-control" name="identity_card_number" value="{{ Auth::user()->identity_card_number }}">
								</div>
							</div> 
							
							<div class="form-row mb-4">
								<div class="col">
									<span>Email</span>
									<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">						
								</div>
							</div>
							
							<div class="form-row mb-4">
								<div class="col">
									<span>Địa chỉ</span>
									<input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required>						
								</div>
							</div>
							
							<div class="form-row mb-4">							
								<div class="col">
									<span>Ngày vào ở</span>
									<input type="date" class="form-control" name="date_move_in" required min="{{ date_format(now(),'Y-m-d') }}"
									max="{{ date_format(date_modify(date_create(date('Y-m-d')),'+3 days'),'Y-m-d') }}">						
								</div>							
								
								<div class="col">
									<span>Mã giảm giá</span>
									<input type="text" class="form-control" disabled value="Đang xây dựng">		
								</div>
							</div> 
							<div class="form-row mb-4">
				                <div class="custom-control custom-checkbox">
				                    <input type="checkbox" class="custom-control-input" id="customCheck" name="checkThongTin" required="">
				                    <label class="custom-control-label" for="customCheck">Tôi xin cam đoan những thông tin trên là chính xác</label>
				                </div>
				                <!-- Xác nhận thông tin -->
							</div>
					</div>
				</div>

				<div class="card mb-4" id="sectionPayment">
					<div class="card-header">
						Hình thức thanh toán
					</div>
					<div class="card-body">
						<input type="radio" class="mb-4" name="radioPayment" value="COD" data-toggle="collapse" href="#collapseExample" checked> Thanh toán tại quầy<br>

						<div class="collapse mb-4 show" id="collapseExample">
						  <div class="card card-body">
						    Địa chỉ quầy thanh toán: Trường Đại học Công nghiệp TP. Hồ Chí Minh<br>
						    Tòa nhà E, tầng trệt, quầy số 1-2-3<br>
						    Điện thoại: 0123-456-789, nhấn phím 9<br>
						    Email giải đáp thắc mắc: thungan@ktxhoangtri.com
						  </div>
						</div>

						<input type="radio" name="radioPayment" value="VNPAY" placeholder="" data-toggle="collapse" href="#vnpay"> Thanh toán qua VNPay
						</form>	
					</div>
				</div>
			</div>

			<div class="col-lg col-sm">
				<div class="card bg-success text-white">
					<div class="card-header">
						Tổng tiền
					</div>
					<div class="card-body">
						<div class="row my-3">
							<div class="col-7">
								Tạm tính
							</div>
							<div class="col text-right">
								<label for="" id="labelProvisionalMoney" class="h5">0 VNĐ</label>
							</div>
						</div>
						
						<div class="row my-3">
							<div class="col-7">
								VAT 5%
							</div>
							<div class="col text-right">
								<label for="" id="labelVAT" class="h5">0 VNĐ</label>
							</div>
						</div>
						<hr style="background-color: white">
						<div class="row my-3">
							<div class="col-7">
								Tổng tiền
							</div>
							<div class="col text-right">
								<label for="" id="labelTotal" class="h5">0 VNĐ</label>
								<input type="hidden" name="inputTotal" id="inputTotal" value="">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" name="checkout" class="btn btn-warning btn-block" value="Đặt phòng">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


<script>
	$(document).ready(function(){
		$("#duration").change(function(){
            var duration = $(this).val(); //lấy gía trị ng dùng gõ
            var idRoom = {{ $room->id }};

            ///alert(idRoom);
            
                $.ajax({
                    url:"{{ route('total') }}", 
                    method:"get", // phương thức gửi dữ liệu.
				    dataType: 'json',
				    cache: false,
                    data:{
                        duration:duration,
                        idRoom:idRoom,
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#labelProvisionalMoney').html(data.ProvisionalMoney);
                        $('#labelVAT').html(data.VAT);
                        $('#labelTotal').html(data.Total);
                        $('#inputTotal').val(data.Total);
                    }
                });
            
        });
	});
</script>
@endsection